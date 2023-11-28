<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * 1.- un modelo llamado “Perro” donde guardará la información basica del perro (id, nombre, url defoto, descripcion).
*/

class Perro extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','urlfoto','descripcion'];

}


