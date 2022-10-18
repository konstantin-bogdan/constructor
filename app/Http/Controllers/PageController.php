<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Language;
use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $pages = Page::all();
        //dd($pages);
        return view('admin.pages.index', compact(['pages']));

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePageRequest $request
     */
    public function store(StorePageRequest $request)
    {
        Page::create($request->validated());
        return to_route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Page $page
     */
    public function edit(Page $page)
    {
        $languages = Language::all();
        $page = Page::where('id', $page->id)->with('blocks')->first();
        $page->blocks->each(function ($block) {
            $block->options = json_decode($block->options);
            $block->blocks->each(function ($subBlock) {
                $subBlock->options = json_decode($subBlock->options);
                $subBlock->blocks->each(function ($lastBlock) {
                    $lastBlock->options = json_decode($lastBlock->options);

                });
            });
        });

//        $page->blocks->each(function($block) {
//            $block->template->first_fields = json_decode($block->template->first_fields);
//        });


//        dd($page);
        return view('admin.pages.edit', compact(['page', 'languages']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePageRequest $request
     * @param \App\Models\Page $page
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
//        dd($request->files);
//        dd($request->sort);
//        dd($request);
        $pageId = $page->id;


        $array = [];
        foreach ($request->blocks as $id => $block) {
            $array[$id]['id'] = $id;

            if(array_key_exists('options', $block)) {
                $array[$id]['options'] = ($block['options']);
            } else {
                $array[$id]['options'] = [];
            }
            $array[$id]['page_id'] = $pageId;
            $array[$id]['template_id'] = $block['template_id'];
        }
        $i = 1;
        foreach ($request->sort as $id => $value ) {
            $array[$id]['number'] = $i;
            $i++;
        }
//            dd($array);

        if($request->file('blocks')) {
        foreach ($request->file('blocks') as $blockId => $block) {
            foreach ($block['options'] as $lang => $fields) {
                foreach ($fields as $key => $image) {
                    $filename = $image->getClientOriginalName();
                    $folder = "blocks/$blockId/$lang/$key";
                    Storage::disk('public')->putFileas($folder, $image, $filename);
                    $array[$blockId]['options'][$lang][$key] = asset("storege/$folder/ $filename");
                }
            }
        }
    }

        foreach ($array as $id => $item) {
            $array[$id]['options'] = json_encode($item['options']);
        }

        //dd($array);
        //dd($request->blocks);

        $page->update([
            'name' => $request->name,
            'path' => $request->path
        ]);
//        dd($array);
        Block::upsert($array, ['id'], ['options', 'number']);


        return to_route('admin.pages.edit', compact(['page']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Page $page
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return to_route('admin.pages.index');
    }
}
