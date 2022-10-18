<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function onOff(Request $request) {
        $modelClass = 'App\\Models\\'.$request->model;
        $model = new $modelClass();
        $model = $model->where('id', $request->id)->first();
        $oldShow = $model->show;
        if($oldShow==1) {
            $newShow = 0;
        }else{
            $newShow = 1;
        }

        $model->update(['show' => $newShow]);

        return response()->json(['id' => $request->id, 'model' => $request->model,
                                'old' => $oldShow, 'new' => $newShow]);
    }
    public function delete(Request $request) {
        $modelClass = 'App\\Models\\'.$request->model;
        $model = new $modelClass();
        $model = $model->where('id', $request->id)->first();
        $model?->delete();
        return back();

        //dd($request);
    }

    public function order(Request $request) {
        $modelClass = 'App\\Models\\'.$request->model;
        $model = new $modelClass();

        $i = 1;
        $sortArray = [];
        foreach ($request->sort as $id => $value) {
            $sortArray[] = ['id' => $id, 'number' => $i];
            $i++;
        }

        \Batch::update($model, $sortArray, 'id');

        return back();
  //      dd($sortArray);
//        dd($request);
    }
}
