<?php

namespace App\Http\Controllers;

use App\Http\Requests\MethodRequest;
use App\Http\Requests\MethodUpRequest;
use Illuminate\Http\Request;
use App\Models\Method;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = Method::all();
        if ($methods) {
            return response()->json(['data' => $methods], 200);
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
    public function store(MethodRequest $request)
    {
        $validated = $request->validated();
        $method = Method::create([
            'name' => $validated['name'],
            'info' => $validated['info'],
            'intensity' => $validated['intensity'],
            'duration' => $validated['duration'],
            'charge' => $validated['charge'],
            'is_private' => $validated['is_private'],
        ]);
        if ($method) {
            return response()->json(['data' => $method, 'message' => "Se ha creado correctamente el Método de Entrenamiento: {$method['name']}"], 201);
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
        $response = [];
        try {
            $method = Method::find($id);
            if ($method) {
                $response['data'] = $method;
                $response['success'] = true;
            } else {
                $response['data'] = null;
                $response['success'] = false;
                $response['message'] = '404 Not Found';
            }
        } catch (\Throwable $th) {
            return response()->json($th);
        }
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MethodUpRequest $request, $id)
    {
        $validated = $request->validated();
        $session = Method::find($id);
        $update = $session->update($validated);
        if ($update) {
            return response()->json(['data' => $session, "message" => "Se ha actualizado correctamente el método de entrenamiento: {$session['name']}"], 201);
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
        try {
            $method = Method::find($id);
            if ($method) {
                $destroy = $method->delete();
                if ($destroy) {
                    return response()->json(['message' => "Se ha eliminado correctamente a {$method['name']}", "success" => true, "status" => 200]);
                }
            } else {
                return response()->json(['message' => "¡Error! No existe el método de entrenamiento.", "success" => false, "status" => 404]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
