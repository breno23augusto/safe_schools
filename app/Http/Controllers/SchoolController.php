<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\School;
use Illuminate\Http\Response;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return School::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {
        $school = new School();
        $school->name = $request->validated('name');
        $school->save();

        return response(status: Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return $school;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->name = $request->validated('name');
        $school->save();
        return response(status: Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();
        return response(status: Response::HTTP_NO_CONTENT);
    }
}
