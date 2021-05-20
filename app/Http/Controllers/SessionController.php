<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use App\Http\Requests\SessionUpRequest;
use Illuminate\Http\Request;

use App\Models\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::with('session_type')->get();
        if ($sessions) {
            return response()->json(['data' => $sessions], 200);
        } else {
            return response()->json(['data' => 'error'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionRequest $request)
    {
        $validated = $request->validated();
        $session = Session::create([
            'microcycle_id' => $validated['microcycle_id'],
            'session_type_id' => $validated['session_type_id'],
            'name' => $validated['name'],
            'info' => $validated['info'],
            'start_session' => $validated['start_session'],
            'end_session' => $validated['end_session'],
        ]);
        if ($session) {
            return response()->json(['data' => $session, 'message' => "Se ha creado correctamente la Sesión de Entrenamiento {$session['name']}"], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = \App\Models\Session::findOrFail($id);
        return response()->json(['session' => $session], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionUpRequest $request, $id)
    {
        $validated = $request->validated();
        $session = Session::find($id);
        $update = $session->update($validated);
        if ($update) {
            return response()->json(['data' => $session, "message" => "Se ha actualizado correctamente la sessión {$session['name']}"], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $destroy = $session->delete();
        if ($destroy) {
            return response()->json(['message' => "Se ha eliminado correctamente a {$session['name']}"]);
        }
    }
}
