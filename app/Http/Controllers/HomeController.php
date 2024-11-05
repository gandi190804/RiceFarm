<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Article::all();
        return view("index", [
            "artikel" => $artikel
        ]);
    }

    public function someFunction()
    {
        // Ambil 2 artikel terbaru
        $latestArticles = Article::orderBy('tanggal', 'isi')->take(2)->get();

        // Kirim data ke view
        return view('/', compact('latestArticles'));
    }
}
