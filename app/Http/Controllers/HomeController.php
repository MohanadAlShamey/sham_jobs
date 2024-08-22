<?php

namespace App\Http\Controllers;

use App\Enums\AskTypeEnum;
use App\Models\Answer;
use App\Models\Ask;
use App\Models\Group;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Response;

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
        \DB::beginTransaction();
        try {
            $group = Group::create([
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'father_name' => $request->father_name,
                'job_name' => $request->job_name,
                'birth_date' => $request->birth_date,
                'job_id' => $request->job_id,
            ]);
            foreach ($request->except(['_token', 'method', 'email', 'name', 'job_id']) as $key => $value) {

                $ask = Ask::find($key);
                if (!$ask && $key !== 'options') {
                    continue;
                }
                if ($value instanceof UploadedFile && $ask->type === AskTypeEnum::FILE->value) {
                    // التحقق من نوع الملف
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf']; // قائمة الامتدادات المسموح بها
                    $extension = $value->getClientOriginalExtension();

                    if (in_array($extension, $allowedExtensions)) {
                        $path = $value->store('job/' . $ask->job_id, 'public');
                        Answer::create([
                            'answer' => $path,
                            'group_id' => $group->id,
                            'ask_id' => $key,
                        ]);
                    } else {
                        \DB::rollBack();
                        // الملف غير مسموح به، يمكنك إضافة رسالة خطأ أو معالجة أخرى هنا
                        return back()->withErrors([$key => 'نوع الملف غير مسموح به.'])->withInput();
                    }
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
            \DB::commit();
            return to_route('home.index')->with(['success' => 'تم حفظ طلبك بنجاح']);
        } catch (\Exception | \Error $e) {
            \DB::rollBack();
            return to_route('home.index')->with(['success' => 'تم حفظ طلبك بنجاح']);
        }

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


    public function downloadResumes($id)
    {
        // تحديد مسار المجلد الذي يحتوي على ملفات PDF

        $directory = storage_path('app/public/job/' . $id);

        // التحقق من وجود المجلد
        if (!file_exists($directory)) {
            return response()->json(['error' => 'Directory not found'], Response::HTTP_NOT_FOUND);
        }

        // إنشاء ملف مؤقت لتضمين جميع ملفات PDF في ملف واحد
        $zipFileName = 'resumes' . $id . '.zip';
        $zipFilePath = storage_path("app/public/{$zipFileName}");

        // إنشاء ملف ZIP
        $zip = new \ZipArchive();
        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
            foreach ($files as $name => $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($directory) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
        } else {
            return response()->json(['error' => 'Failed to create zip file'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // تحميل ملف ZIP
        return response()->download($zipFilePath, $zipFileName)->deleteFileAfterSend(true);
    }
}
