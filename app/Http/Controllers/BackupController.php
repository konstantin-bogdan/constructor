<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use App\Http\Requests\StoreBackupRequest;
use App\Http\Requests\UpdateBackupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\DbDumper\Databases\MySql;

class BackupController extends Controller
{
    protected $tables = ['blocks', 'languages', 'menus', 'pages', 'role_user', 'templates', 'users'];

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $backups = Backup::orderBy('created_at', 'Desc')->get();
        return  view('admin.backups.index', compact(['backups']));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.backups.create');
    }
    public function createFromFile()
    {
        return view('admin.backups.createFromFile ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBackupRequest  $request
     */
    public function store(StoreBackupRequest $request)
    {
        $backup = Backup::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        try {
            \File::copyDirectory(public_path('storage'), public_path("backups/$backup->id"));
        } catch(\Exception $e) {
            $backup->delete();
            return to_route('admin.backups.index')->with(['danger' => $e->getMessage()]);
        }

        $dbConfig = Config::get('database.connections')['mysql'];

        try {
            MySql::create()
                ->setDbName($dbConfig['database'])
                ->setUserName($dbConfig['username'])
                ->setPassword($dbConfig['password'])
                ->includeTables($this->tables)
                ->dumpToFile("sql/dump$backup->id.sql");
        } catch(\Exception $e) {
            $backup->delete();
            return to_route('admin.backups.index')->with(['danger' => $e->getMessage()]);
        }

        return to_route('admin.backups.index')->with(['success' => 'Backup created successfully']);;
    }

    public function storeFromFile(Request $request) {
        $backup = Backup::create([
            'title' => $request->title,
            'description' => $request->description,
            'from_file' => 1
        ]);

        $id = $backup->id;

        $zip = new \ZipArchive();
        $status = $zip->open($request->file("backup")->getRealPath());
        if ($status !== true) {
            return to_route('admin.backups.index')->with(['warning' => 'Something not work']);
        } else{
            $storageDestinationPath= public_path('temp');

            if (!\File::exists( $storageDestinationPath)) {
                \File::makeDirectory($storageDestinationPath, 0755, true);
            }
            $zip->extractTo($storageDestinationPath);
            $zip->close();

            $backupStorageName = scandir(public_path('temp/backups'));
            $folderName = end($backupStorageName);

            rename(public_path("temp/backups/$folderName"),
                public_path("backups/$id"));
            rename(public_path("temp/sql/dump$folderName.sql"),
                public_path("sql/dump$id.sql"));

            \File::deleteDirectory(public_path('temp'));


            return to_route('admin.backups.index')->with(['success'=>'You have successfully created backup']);
        }
    }

    public function restore(Request $request) {
        $id = $request->id;

        if(is_dir(public_path("backups/$id"))) {
            if(file_exists(public_path("sql/dump$id.sql"))) {

                \File::copyDirectory(public_path("backups/$id"), public_path('storage'));
                foreach ($this->tables as $table) {
                    Schema::dropIfExists($table);
                }

                DB::unprepared(file_get_contents(public_path("sql/dump$id.sql")));

            } else {
                return to_route('admin.backups.index')->with(['warning' => "SQL dump doesn`t exists"]);
            }
        } else {
            return to_route('admin.backups.index')->with(['warning' => "Image folder doesn`t exists"]);
        }

        return to_route('admin.backups.index')->with(['success' => 'Backup restored successfully']);
    }

    public function download(Request $request) {
        $id = $request->id;

        $zip_file = 'backup.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = public_path("backups/$id");

        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = "backups/$id/" . substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->addFile(public_path("sql/dump$id.sql"), "sql/dump$id.sql");
        $zip->close();

        return response()->download($zip_file);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backup  $backup
     * @return \Illuminate\Http\Response
     */
    public function show(Backup $backup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backup  $backup
     */
    public function edit(Backup $backup)
    {
        return view('admin.backups.edit', compact(['backup']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBackupRequest  $request
     * @param  \App\Models\Backup  $backup
     */
    public function update(UpdateBackupRequest $request, Backup $backup)
    {
        $backup->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return to_route('admin.backups.edit', compact(['backup']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backup  $backup
     */
    public function destroy(Backup $backup)
    {
        \File::delete(public_path("sql/dump$backup->id.sql"));
        \File::deleteDirectory(public_path("backups/$backup->id"));

        $backup->delete();

        return to_route('admin.backups.index');
    }
}
