<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all();

        return response()->json($complaints, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_id' => ['required', 'integer'],
            'organization_id' => ['required', 'integer'],
            'is_anonymous' => 'required|bool',
            'description' => 'required|string',
            'classification' => 'nullable|in:azul,verde,amarelo,laranja,vermelho',
        ]);

        $requestData = $request->all();
        $requestData['user_id'] = $request->boolean('is_anonymous') ? null : $request->user()->id;
        unset($requestData['is_anonymous']);

        $complaint = Complaint::create($requestData);

        return response()->json($complaint, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Complaint $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return response()->json($complaint, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Complaint $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        $data = $request->validate([
            'organization_id' => ['required', 'integer'],
            'classification' => 'nullable|in:azul,verde,amarelo,laranja,vermelho',
        ]);

        $complaint->update($data);

        return response()->json($complaint, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Complaint $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
