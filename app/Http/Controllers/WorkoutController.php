<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workout = Workout::findOrFail($id);
        return view('workout.single', ["workout" => $workout]);
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
                return view('workout.edit', ["workout" => $workout]);
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

        // print_r($request->input());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
