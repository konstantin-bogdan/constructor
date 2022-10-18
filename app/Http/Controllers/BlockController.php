<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use App\Models\Page;
use App\Models\Template;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        $templates = Template::orderBy('number')->get();
        $pageId = $request->page;
        return view('admin.blocks.create', compact(['pageId', 'templates']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlockRequest  $request
     */
    public function store(StoreBlockRequest $request)
    {

        if($request->blocksNumber) {
            $insertArray = [];
//            dd($request);

            for($i = 0; $i < $request->blocksNumber; $i++) {
                $insertArray[$i]['page_id'] =  $request->page_id;
                $insertArray[$i]['template_id'] =  $request->template_id;
                $insertArray[$i]['block_id'] =  $request->block_id;
                $insertArray[$i]['number'] =  $i;
            }
//             dd(array_values($insertArray));

            Block::insert($insertArray);
        } else {

            Block::create([
                'page_id' => $request->page_id,
                'template_id' => $request->template_id,
                'number' => 1000

            ]);

        }

        $page = Page::find($request->page_id);

        return to_route('admin.pages.edit', compact(['page']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlockRequest  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlockRequest $request, Block $block)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        //
    }
}
