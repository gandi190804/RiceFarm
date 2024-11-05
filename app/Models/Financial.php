<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    public static function getFinancialsByUsername($username){
        return self::where('username', $username)->get(); // Ini akan mengembalikan koleksi
    }

}
