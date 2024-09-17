<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::where('active', true)->get();
        return response()->json(['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job=Job::findOrFail($id);
        return response()->json(['presents'=>GroupResource::collection($job->groups)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator=\Validator::make($request->all(),[
            'excel_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['status'=>'error','msg'=>$validator->getMessageBag()->first(),]);
        }
        $job=Job::findOrFail($id);
        $job->update(['excel_id'=>$request->excel_id]);
        return response()->json(['status'=>'success','msg'=>'تم تعديل رقم الملف بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
