<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontantEmpruter extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant_achat',
        'fonds_propre',
        'frais_achat',
        'fonds_hypotheque',
        'montant_brut',
        'montant_net'
        
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
