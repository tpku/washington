<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = Auth()->user();

        $credentials = $request->validate([
            'title' => ['required'],
            'duration' => ['required'],
            'unit' => ['required'],
            'workout_id' => ['required'],
        ]);

        Exercise::create($credentials);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $user = Auth()->user();

        $credentials = $request->validate([
            'title' => ['required'],
            'duration' => ['required'],
            'unit' => ['required'],
            'workout_id' => ['required'],
        ]);

        $userWorkouts = $user->workouts;

        foreach ($userWorkouts as $workout) {
            if ($workout->id == $credentials['workout_id']) {

                $exercise = Exercise::find($id);
                $exercise->title = $credentials['title'];
                $exercise->duration = $credentials['duration'];
                $exercise->unit = $credentials['unit'];
                $exercise->save();

                return redirect()->back();
            }
        }

        return redirect()->back()->withErrors([
            'access' => 'Access denied',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
