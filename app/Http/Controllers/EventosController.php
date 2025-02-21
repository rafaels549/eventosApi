<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventosController extends Controller
{

    public function getEvents()
    {
        return Evento::all();
    }
    //
}
