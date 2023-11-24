<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*un modelo llamado “Interaccion” donde ud guardará el id del “perro Interesado”
, el id del “perro candidato” y la preferencia seleccionada (aceptado o rechazado). */

class Interaccion extends Model
{
    use HasFactory;
    protected $fillable = ['perrointeresado','perrocandidato','preferencia'];
}