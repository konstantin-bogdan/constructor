<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index', compact(['languages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLanguageRequest  $request

     */
    public function store(StoreLanguageRequest $request)
    {
        Language::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'show' => 0,
            'number' => 500
        ]);

        Log::info('lang is created!!!');

        return to_route('admin.languages.index')
        ->with(['success' => 'Language was created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language

     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact(['language']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguageRequest  $request
     * @param  \App\Models\Language  $language
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language->update([
            'title' => $request->title,
            'slug' => $request->slug,
        ]);

        return to_route('admin.languages.edit', compact(['language']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return to_route('admin.languages.index')
            ->with(['success' => 'Language was deleted successfully']);
    }
}
