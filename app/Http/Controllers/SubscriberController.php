<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
       $subscribers = Subscriber::orderBy('created_at', 'desc')->get();
       return view('admin.subscribers.index', compact(['subscribers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     */
    public function edit(Subscriber $subscriber)
    {
        return view('admin.subscribers.edit', compact(['subscriber']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriberRequest  $request
     * @param  \App\Models\Subscriber  $subscriber
     */
    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update($request->validated());
        return to_route('admin.subscribers.edit', compact(['subscriber']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return to_route('admin.subscribers.index');
    }
}
