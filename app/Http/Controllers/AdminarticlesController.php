<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminarticlesController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            $artikel = Article::all();
            return view('adminarticles', [
                "artikel" => $artikel
            ]);
        } else {
            redirect('/login');
        }
    }

    public function add(Request $request)
    {

        $judul = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $isi = $request->input('isi');
        $penulis = 'Admin';


        // Menggunakan request untuk mengelola pengunggahan gambar
        $gambar = $request->file('gambar');

        // Validasi file
        if ($gambar && $gambar->isValid()) {
            // Mendapatkan nama unik untuk gambar
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();

            // Pindahkan gambar ke folder tujuan (misalnya, public/images)
            $gambar->move(public_path('assets/img/artikel'), $namaGambar);

            $response = Http::post(
                'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/createArticles',
                [
                    'judul' => $judul,
                    'gambar' => $namaGambar,
                    'tanggal' => $tanggal,
                    'isi' => $isi,
                    'penulis' => $penulis
                ]
            );
            if ($response->failed()) {
                // Handle error
                $errorMessage = $response->body();
                return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
            } else {
                // Redirect ke halaman login atau halaman lain yang sesuai
                return redirect('/adminarticles');
                // Gantilah 'login' dengan nama rute yang sesuai
            }
        } else {
            // Tangani kesalahan, file tidak diunggah atau tidak valid
            return 'Error: Gambar tidak diunggah atau tidak valid.';
        }
    }

    public function update(Request $request, $id)
    {

        $artikel = Article::find($id);

        $judul = $request->input('judul');
        $isi = $request->input('isi');
        $tanggal = $request->input('tanggal');
        $penulis = 'Admin';
        $gambarlama = $request->input('gambarlama');
        // Menggunakan request untuk mengelola pengunggahan gambar
        $gambar = $request->file('gambar');

        // Validasi file
        if ($gambar && $gambar->isValid()) {
            // Mendapatkan nama unik untuk gambar
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();

            // Pindahkan gambar ke folder tujuan (misalnya, public/images)
            $gambar->move(public_path('assets/img/artikel'), $namaGambar);
        } else {
            $namaGambar = $gambarlama;
            // Tangani kesalahan, file tidak diunggah atau tidak valid
            // return 'Error: Gambar tidak diunggah atau tidak valid.';
        }

        $response = Http::put('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/updateArtikel', [
            'id' => $id,
            'judul' => $judul,
            'penulis' => $penulis,
            'tanggal' => $tanggal,
            'isi' => $isi,
            'gambar' => $namaGambar,
        ]);
        // dd($response->body());

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('adminarticles');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    public function delete(string $id)
    {
        $artikel = Article::find($id);

        $response = Http::delete("https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/deleteArtikel?id=" . $artikel->id);

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/adminarticles');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }
}
