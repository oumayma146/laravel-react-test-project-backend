<?php

namespace App\Http\Controllers;

use App\Models\Mensualite as ModelsMensualite;
use Illuminate\Http\Request;

class Mensualite extends Controller
{
 public function calculeMensualite(Request $request)
 {
    $duree=$request->input('duree');
    $taux_interet_annuel=$request->input('taux_interet_annuel');
    $capital= $request->get('capital');
    $taux_interet_menseul=round(pow(1 + ($taux_interet_annuel / 100), 1/12) - 1, 3);
    $mensualite=round(($capital * $taux_interet_menseul * pow(1 + $taux_interet_menseul, $duree)) / (pow(1 + $taux_interet_menseul, $duree) - 1), 2);
  
    $mensualites = new ModelsMensualite();
    $mensualites->duree = $duree;
    $mensualites->capital = $capital;
    $mensualites->taux_interet_annuel = $taux_interet_annuel;
    $mensualites->taux_interet_menseul = $taux_interet_menseul;
   
    $mensualites->mensualite =$mensualite;
    $mensualites->save();
   
    return response()->json($mensualites, 201);

 }
 public function getMensualite()
 {
   $mensualite=ModelsMensualite::get('mensualite');
   return response()->json($mensualite, 201); 
 }
 public function index()
 {
   $list=ModelsMensualite::get();
   return response()->json($list, 201); 
 }

 public function getTableAmmortissment($id)
 {
  $capital = ModelsMensualite::where('id', $id)->pluck('capital')->first();
  $duree = ModelsMensualite::where('id', $id)->pluck('duree')->first();
  $taux_mensuel = ModelsMensualite::where('id', $id)->pluck('taux_interet_annuel')->first();
  $mensualite = ModelsMensualite::where('id', $id)->pluck('mensualite')->first();
     $tableau_amortissement = [];
 
     $solde_debut = $capital;
     
     for ($periode = 1; $periode <= $duree; $periode++) {
         $interet = round($solde_debut * $taux_mensuel, 2);
         $capital_rembourse = $mensualite - $interet;
         $solde_fin = $solde_debut - $capital_rembourse;
     
         $ligne_amortissement = [
             'periode' => $periode,
             'solde_debut' => $solde_debut,
             'mensualite' => $mensualite,
             'interet' => $interet,
             'capital_rembourse' => $capital_rembourse,
             'solde_fin' => $solde_fin
         ];
     
         $tableau_amortissement[] = $ligne_amortissement;
        
     }
     return response()->json($tableau_amortissement, 201);
}
}