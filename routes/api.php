<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Evento;
use App\Http\Controllers\EventosController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/events', [EventosController::class, 'getEvents']);


    Route::get('/events/{id}', function ($id) {
        return Evento::findOrFail($id);
    });

    Route::post('/events', function (Request $request) {
        $validator = Evento::validate($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $evento = Evento::create($request->all());
        return response()->json($evento, 201);
    });

    Route::put('/events/{id}', function (Request $request, $id) {
        $evento = Evento::findOrFail($id);
        $validator = Evento::validate($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $evento->update($request->all());
        return response()->json($evento, 200);
    });

    Route::delete('/events/{id}', function ($id) {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return response()->json(null, 204);
    });
});
