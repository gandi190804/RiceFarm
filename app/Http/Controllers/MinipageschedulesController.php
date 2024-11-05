<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinipageschedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('minipageschedules');
    }
}
