<?php

namespace App\Http\Controllers;

use App\Http\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Financial;
use Illuminate\Support\Facades\Session;

class petaniPadiController extends Controller
{
    public function loginPetani()
    {
        if (Auth::check()) {
            return view("schedules");
        } else {
            return redirect('/login');
        }
    }

    public function viewCatatan()
    {
        if (Auth::check()) {
            return view("financials");
        } else {
            return redirect('/login');
        }
    }

    public function savePenjadwalan(Request $request)
    {
        $user = Auth::user();
        $username = $user->username;
        $namaPenjadwalan = $request->input('namaPenjadwalan');
        $tanggal = $request->input('tanggal');
        $jenisPadi = $request->input('jenisPadi');
        $luasLahan = $request->input('luasLahan');
        $musim = $request->input('musim');
        $catatan = $request->input('catatan');

        // Insert operation
        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/insertPenjadwalan?username=' . $username . '&namaPenjadwalan=' . $namaPenjadwalan . '&tanggal=' . $tanggal . '&jenisPadi=' . $jenisPadi . '&luasLahan=' . $luasLahan . '&musim=' . $musim . '&catatan=' . $catatan . '');

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/schedules');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }

    public function deletePenjadwalan($id)
    {
        $response = Http::delete('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/deletePenjadwalan?id=' . urlencode($id));

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/schedules');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }
    public function saveFinacials(Request $request)
    {
        $user = Auth::user();
        $username = $user->username;
        $tanggal = $request->input('tanggal');
        $keterangan = $request->input('keterangan');
        $pemasukan = $request->input('pemasukan');
        $pengeluaran = $request->input('pengeluaran');

        $response = Http::post('https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/postPemasukanPengeluaran?username=' . $username . '&tanggal=' . $tanggal . '&keterangan=' . $keterangan . '&pemasukan=' . $pemasukan . '&pengeluaran=' . $pengeluaran . '');

        if ($response->failed()) {
            // Handle error
            $errorMessage = $response->body();
            return $errorMessage; // Gantilah 'error' dengan nama view yang sesuai
        } else {
            // Redirect ke halaman login atau halaman lain yang sesuai
            return redirect('/financials');
            // Gantilah 'login' dengan nama rute yang sesuai
        }
    }
    

}
