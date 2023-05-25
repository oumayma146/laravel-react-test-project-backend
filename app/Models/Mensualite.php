<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensualite extends Model
{
    use HasFactory;
    protected $fillable = [
        'duree',
        'capital',
        'taux_interet_annuel',
        'taux_interet_menseul',
        'mensualite'  
        
    ];
}
