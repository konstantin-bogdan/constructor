<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TemplateController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/admin');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth' ], function (){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/show', [AdminController::class, 'onOff'])->name('on-off');
    Route::put('/order', [AdminController::class, 'order'])->name('save-order');
    Route::delete('/delete', [AdminController::class, 'delete'])->name('delete');

    Route::resource('pages', PageController::class)->middleware('role:pages');
    Route::resource('languages', LanguageController::class)->middleware('role:lang');
    Route::resource('blocks', BlockController::class);
    Route::resource('menus', MenuController::class)->middleware('role:menu');
    Route::resource('subscribers', SubscriberController::class)->middleware('role:subscribers');
    Route::resource('users', UserController::class)->middleware('role:admins');


    Route::post('backupsRestore', [BackupController::class, 'restore'])->name('backups.restore');
    Route::post('backupsDownload', [BackupController::class, 'download'])->name('backups.download');
    Route::get('backups/createFromFile', [BackupController::class, 'createFromFile'])->name('backups.createFromFile');
    Route::post('backups/storeFromFile', [BackupController::class, 'storeFromFile'])->name('backups.storeFromFile');
    Route::resource('backups', BackupController::class);

    Route::get('templates/menu', [TemplateController::class, 'menu'])
        ->name('templates.menu')->middleware('role:menu-templates');
    Route::get('templates/page', [TemplateController::class, 'page'])
        ->name('templates.page')->middleware('role:page-templates');

 Route::resource('templates', TemplateController::class);
});


require __DIR__.'/auth.php';
