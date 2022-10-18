<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Language;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Template;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact(['menus']));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $templates = Template::where('show', 1)->where('type', 'menu')->get();

        return view('admin.menus.create', compact(['templates']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreMenuRequest $request
     */
    public function store(StoreMenuRequest $request)
    {
        if($request->menusNumber) {
//           dd($request->menu_id);

            $insertArray = [];

            for($i = 0; $i < $request->menusNumber; $i++) {
                $insertArray[$i]['menu_id'] =  $request->menu_id;
                $insertArray[$i]['template_id'] =  $request->template_id;
                $insertArray[$i]['name'] =  'submenu';
                $insertArray[$i]['number'] =  $i;
            }
//             dd(array_values($insertArray));

            Menu::insert($insertArray);
            return back();
        } else {
            $menu = Menu::create([
                'name' => '',
                'type' => $request->type,
                'template_id' => $request->template_id
            ]);

        }
        return to_route('admin.menus.edit', compact(['menu']));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Menu $menu
     */
    public function edit(Menu $menu)
    {
        $languages = Language::all();
        $menu = Menu::where('id', $menu->id)->with('template', 'menus.menus')->first();
        $menu->options = json_decode($menu->options);
 //       dd($menu);
        return view ('admin.menus.edit', compact(['menu', 'languages']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMenuRequest $request
     * @param \App\Models\Menu $menu
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
//        dd($request);
        $menu->update([
            'name' => $request->name
        ]);

        $array = [];
        foreach ($request->blocks as $id => $block) {
            $array[$id]['id'] = $id;

            if(array_key_exists('options', $block)) {
                $array[$id]['options'] = ($block['options']);
            } else {
                $array[$id]['options'] = [];
            }
        }

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

        \Batch::update(new Menu(), $array, 'id');
 //       Menu::upsert($array, ['id'], ['options']);

 //      dd($array);

        return to_route('admin.menus.edit', compact(['menu']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Menu $menu
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return to_route('admin.menus.index');
    }
}
