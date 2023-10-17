<?php

namespace App\Models;

use App\Models\Notice;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function noticias(){
        return $this ->hasMany(Notice::class);
    }
}

