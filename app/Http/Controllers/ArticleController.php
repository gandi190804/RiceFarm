<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Article::all();
        return view('article', [
            "artikel" => $artikel
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getArticle = Article::find($id);
        if ($getArticle == null) {
            abort(403);
        }
        return view('fullarticle', [
            "article" => $getArticle,
        ]);
    }
}
