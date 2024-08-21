<?php

namespace App\Http\Controllers;

use App\Enums\AskTypeEnum;
use App\Models\Answer;
use App\Models\Ask;
use App\Models\Group;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
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

        $group = Group::create([
            'code' => \Str::random(12),
            'email' => $request->email,
            'name' => $request->name,
            'job_id' => $request->job_id,
        ]);
        foreach ($request->except(['_token', 'method', 'email', 'name', 'job_id']) as $key => $value) {

            $ask = Ask::find($key);
            if (!$ask && $key !== 'options') {
                continue;
            }
            if ($value instanceof UploadedFile && $ask->type === AskTypeEnum::FILE->value) {
                $path = $request->file($key)?->store('job/' . $ask->job_id, 'public');
                Answer::create([
                    'answer' => $path,
                    'group_id' => $group->id,
                    'ask_id' => $key,
                ]);
            } elseif ($key === 'options') {
                foreach ($request->options as $subKey => $subVal) {
                   // $ask = Ask::find($subKey);
                    Answer::create([
                        'answer' => is_array($subVal) ? implode(' - ', $subVal) : $subVal,
                        'group_id' => $group->id,
                        'ask_id' => $subKey,
                    ]);
                }
            } else {
                Answer::create([
                    'answer' => $value,
                    'group_id' => $group->id,
                    'ask_id' => $key,
                ]);
            }
        }
        return to_route('home.index')->with(['success'=>'تم حفظ طلبك بنجاح']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::find($id);
        return view('show', compact('job'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
