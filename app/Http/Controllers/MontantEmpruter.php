<?php

namespace App\Http\Controllers;

use App\Models\MontantEmpruter as Montant;
use Illuminate\Http\Request;

class MontantEmpruter extends Controller
{
    public function calculeMontantEmpruter(Request $request)
   { 
    $montant_achat=$request->input('montant_achat');
    $fond_propre=$request->input('fonds_propre');
    if ($montant_achat >= 50000){
        $frait_achat=  $montant_achat*0.1;
    } else {
        $frait_achat=0;
    }
    $montant_brut=($montant_achat+$frait_achat)-$fond_propre ;
    $frait_hypotheque=$montant_brut*0.02;
    $montant_net= $montant_brut+$frait_hypotheque;

    $montant = new Montant();
    $montant->montant_achat =  $montant_achat;
    $montant->fonds_propre =  $fond_propre;
    $montant->frais_achat = $frait_achat;
    $montant->fonds_hypotheque = $frait_hypotheque;
    $montant->montant_brut =$montant_brut;
    $montant->montant_net =$montant_net;
    $montant->save();

    return response()->json($montant, 201);
   }
   public function getMontant()
   {
    $capitale=Montant::get('montant_brut');
    return response()->json($capitale, 201);
   }
   public function index()
   {
    $list=Montant::get();
    return response()->json($list, 201);
   }
}
