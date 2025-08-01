<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
// use App\Models\ExamPrep\Classes;
use App\Models\ExamPrep\Exams;
use App\Models\ExamPrep\Subjects;
use App\Models\ExamPrep\user_exam;
use App\Models\ExamPrep\Oex_result;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adsubjects');
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
        // dd($request);
        $data = $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . Subjects::class],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'exam_duration' => ['sometimes', 'nullable', 'max:255'],
            'exam_id' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $avatar = $request->file('avatar')->store('upload');

        $done = Subjects::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'description' => $request->description,
            'exam_duration' => $request->exam_duration,
            'exam_unique_id' => $request->exam_id,
            'avatar' => $avatar
        ]);

        if ($done) {
            return redirect('/adsubjects')->with('success', 'New Subject Created successfully');
        } else {
            return redirect('/adsubjects')->with('error', 'Something went wrong');
        };
    }







    /**
     * Display the specified subject data resource.
     */
    public function display(Exams $data)
    {
        // dd($data);

        $subject_id = $data->id;
        $exam_id = $data->title;

        $output = Subjects::where('exam_unique_id', $exam_id)->orderBy('title', 'asc')->get();
        return view('admin.subject', ['fetchSubjects' => $output]);
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $examdata = Exams::get();
        // dd($examdata);
        $output = Subjects::orderBy('exam_unique_id', 'asc')->get();
        return view('admin.adsubjects', ['fetchSubjects' => $output, 'fetchExams' => $examdata]);
    }


    /**
     * Display the User specified resource.
     */
    public function usershow(Exams $data)
    {

        $exam_id = $data->id;
        $output = Subjects::where('exam_unique_id', $exam_id)->get();
        $current_user = Auth::user()->id;

        $result = [];
        foreach ($output as $key) {
            $result[]  = user_exam::where('user_id', $current_user)->where('subject_id', $key->id)->get()->first();
        }
        return view('admin.showsubjects', ['exam' => $exam_id, 'userFetchSubjects' => $output, 'result' => $result]);
    }
    /**
     * Display the User specified Exams completed.
     */
    // public function exam_taken()
    // {
    //     $current_user = Auth::id();

    //     // Get all exam results for current user
    //     $results = Oex_result::where('user_id', $current_user)->get();

    //     // Extract all exam_ids from results
    //     $examIds = $results->pluck('exam_id')->toArray();

    //     // Fetch all exam details from Subjects table at once
    //     $exams = Subjects::whereIn('id', $examIds)->get();

    //     // dd($exams);
    //     // dd($results);

    //     return view('admin.exam_taken', [ 'userFetchCompletedExams' => $exams, 'result' => $results ]);
    // }
    public function exam_taken()
    {
        $current_user = Auth::id();

        // Fetch results with exam details using relationship
        $results = Oex_result::with('exam')
            ->where('user_id', $current_user)
            ->get()
            ->map(function ($attempt) {
                // Add status based on exam date
                $examDate = Carbon::parse($attempt->exam_date);
                if ($examDate->isPast() && !$examDate->isToday()) {
                    $attempt->status = 'Date expired';
                } elseif ($examDate->isToday()) {
                    $attempt->status = $attempt->exam_joined ? 'Finished' : 'Running';
                } else {
                    $attempt->status = 'Pending';
                }
                return $attempt;
            });

        return view('admin.exam_taken', compact('results'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        // dd($request);


        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'exam_duration' => ['sometimes', 'nullable', 'max:255'],
            'exam_id' => ['sometimes', 'nullable', 'max:255'],
            'avatar' => ['sometimes', 'mimes:jpg,png,jpeg', 'max:2048', 'image']
        ]);



        $exam = Subjects::find($request->id);
        // dd($exam);
        if ($exam) {
            $exam->title = $request->title;
            $exam->description = $request->description;
            $exam->exam_duration = $request->exam_duration;
            if ($request->exam_id) {
                $exam->exam_unique_id = $request->exam_id;
            } else {
                $exam->exam_unique_id = $request->prevexam;
            }

            if ($request->avatar) {
                // dd($request->prevavatar);
                File::delete(storage_path('app/public/' . $request->prevavatar));
                $avatar = $request->file('avatar')->store('upload');
                $exam->avatar = $avatar;
            } else {
                $exam->avatar = $request->prevavatar;
            }
            $exam->save();
            return redirect('/adsubjects')->with('success', 'Subjects updated Successfully');
        } else {
            return redirect('/adsubjects')->with('error', 'Something went wrong');
        };
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subjects $data)
    {
        File::delete(storage_path('app/public/' . $data->avatar));
        $done = $data->delete();
        if ($done) {
            return redirect('/adsubjects')->with('success', 'Subject` deleted successfully');
        } else {
            return redirect('/adsubjects')->with('error', 'Something went wrong');
        };
    }
}
