<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Models\Workout;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth()->user();

        // $workouts = Workout::where('user_id', $user->id);

        return view('workout.archive', ["workouts" => $user->workouts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workout.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth()->user();
        $credentials = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'date' => ['required'],
        ]);

        $workout = new Workout([
            'user_id' => Auth::id(),
            'title' => $credentials['title'],
            'description' => $credentials['description'],
            'category' => $credentials['category'],
            'date' => $credentials['date'],
        ]);

        $workout->save();

        return redirect('/workout/'.$workout->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth()->user();
        $workout = Workout::findOrFail($id);
        $exercises = $workout->exercises;
        // $exercises = Exercise::where("workout_id", $workout->id);
        return view('workout.single', ["workout" => $workout,"exercises"=>$exercises]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth()->user();

        $userWorkouts = $user->workouts;

        foreach ($userWorkouts as $workout) {
            if ($workout->id == $id) {
                $exercises = $workout->exercises;
                return view('workout.edit', ["workout" => $workout,"exercises"=>$exercises]);
            }
        }

        return redirect('/')->withErrors([
            'access' => 'Access denied',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $credentials = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'date' => ['required'],
        ]);

        // print_r($request->input());
        $workout = Workout::find($id);
        $workout->title = $credentials['title'];
        $workout->description = $credentials['description'];
        $workout->category = $credentials['category'];
        $workout->date = $credentials['date'];
        $workout->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
