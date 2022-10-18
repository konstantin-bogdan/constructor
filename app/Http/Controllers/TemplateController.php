<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $templates = Template::all();
        return view('admin.templates.index', compact(['templates']));
    }

    public function menu()
    {
        $type = 'menu';
        $templates = Template::where('type', 'menu')->orderBy('number')->get();
        return view('admin.templates.index', compact(['templates', 'type']));
    }

    public function page()
    {
        $type = 'page';
        $templates = Template::where('type', 'page')->orderBy('number')->get();
        return view('admin.templates.index', compact(['templates', 'type']));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create(Request $request)
    {
        $type = $request->type;
        return view('admin.templates.create', compact(['type']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTemplateRequest $request
     */
    public function store(StoreTemplateRequest $request)
    {
        // dd($request);
        $fields = [
            'type' => $request->type,
            'title' => $request->title,
            'slug' => $request->slug,
            'first_fields' => json_encode(array_values($request->first_fields ?? [])),
            'second_fields' => json_encode(array_values($request->second_fields ?? [])),
            'third_fields' => json_encode(array_values($request->third_fields ?? [])),
            'show' => 0,
            'number' => 5000
        ];

        if ($request->file('cover')) {
            $image = $request->file('cover');
            $fileName = $request->slug . '.' . $image->getClientOriginalName();
            Storage::disk('public')->putFileAs('templates', $image, $fileName);
            $fields['cover'] = asset('storage/templates/' . $fileName);
        }

        Template::create($fields);

        if ($request->type == 'menu') {
            return to_route('admin.templates.menu');
        }

        if ($request->type == 'page') {
            return to_route('admin.templates.page');
        }


        return to_route('admin.templates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Template $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Template $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        $template->first_fields = json_decode($template->first_fields);
        $template->second_fields = json_decode($template->second_fields);
        $template->third_fields = json_decode($template->third_fields);
        // dd($template);
        return view('admin.templates.edit', compact(['template']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTemplateRequest $request
     * @param \App\Models\Template $template
     */
    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $fields = [
            'type' => $request->type,
            'title' => $request->title,
            'first_fields' => json_encode(array_values($request->first_fields ?? [])),
            'second_fields' => json_encode(array_values($request->second_fields ?? [])),
            'third_fields' => json_encode(array_values($request->third_fields ?? [])),
            'show' => 0,
            'number' => 5000
        ];

        if ($request->file('cover')) {
            $image = $request->file('cover');
            $fileName = $request->slug . '.' . $image->getClientOriginalName();
            Storage::disk('public')->putFileAs('templates', $image, $fileName);
            $fields['cover'] = asset('storage/templates/' . $fileName);
        }

        $template->update($fields);

        return to_route('admin.templates.edit', compact(['template']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Template $template
     */
    public function destroy(Template $template)
    {
        $type = $template->type;
        $template->delete();

        if ($type=='menu') {
            return to_route('admin.templates.menu');
        }

        if ($type=='page') {
            return to_route('admin.templates.page');
        }
        return to_route('admin.templates.index');
    }
}
