<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bien;

class BienController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
          'nom_bien',
          'region',
          'type'
        ]);
        
        $biens = Bien::all();
        $nom_bien = $request->get('nom_bien');
        $region = $request->get('region');
        $type = $request->get('type');
        
        if ($nom_bien != NULL) {
          $biens_trouves = $biens->where("titre_bien", "=", $nom_bien);
          
          if ($region != "--Choisissez une region--") {
            $biens_trouves = $biens->where("titre_bien", "=", $nom_bien)->where("region_bien", "=", $region);
            
            if ($type != "--Choisissez un type--") {
              $biens_trouves = $biens->where("titre_bien", "=", $nom_bien)->where("region_bien", "=", $region)->where("type_bien", "=", $type);
            }
          }
          else if ($type != "--Choisissez un type--") {
              $biens_trouves = $biens->where("titre_bien", "=", $nom_bien)->where("type_bien", "=", $type);
          }
        }
        else if ($region != "--Choisissez une region--") {
            $biens_trouves = $biens->where("region_bien", "=", $region);
            
              if ($type != "--Choisissez un type--") {
                $biens_trouves = $biens->where("region_bien", "=", $region)->where("type_bien", "=", $type);
              }
        }
        else if ($type != "--Choisissez un type--") {
                $biens_trouves = $biens->where("type_bien", "=", $type);
              }
        //$biens_trouves->paginate(5);
        return view('bien/table')->with(['biens' => $biens_trouves]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'titre'=>'required',
          'description'=>'required',
          'image'=>'required',
          'type'=>'required',
          'region'=>'required',
          'superficie'=>'required',
          'nbr_piece'=>'required',
          'dependance'=>'required',
          'prix'=>'required',
          'frais'=>'required',
          'id_vendeur' => 'required'
        ]);
        
        $dependance = $request->get('dependance');
        $dep = NULL;
        if($dependance == 'Oui') {
          $dep = 1;
        }
        else {
          $dep = 2;
        }
        
        $bien = new Bien([
          'titre_bien' => $request->get('titre'),
          'descr_bien' => $request->get('description'),
          'image_bien' => $request->get('image'),
          'type_bien' => $request->get('type'),
          'region_bien' => $request->get('region'),
          'superficie_bien' => $request->get('superficie'),
          'nbr_piece_bien' => $request->get('nbr_piece'),
          'dependance_bien' => $dep,
          'prix_bien' => $request->get('prix'),
          'frais_agence_bien' => $request->get('frais'),
          'id_vendeur' => $request->get('id_vendeur')
        ]);
        
        $bien->save();
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bien = Bien::find($id);
        return view('bien/biendescr')->with('bien', $bien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {     
      return view('bien/index', compact('id_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
    
    public function search($id_user)
    {
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
}
