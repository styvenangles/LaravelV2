<?php

namespace App\Http\Controllers;

use App\Bien;
use App\Favori;
use Illuminate\Http\Request;

class UpdateBienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_bien, $id_user)
    {
        
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
          'id_bien'=>'required',
          'id_user'=>'required'
        ]);
        
        $id_bien = $request->get('id_bien');
        $id_user = $request->get('id_user');
        $favoris = Favori::all()->where("id_user", "=", $id_user);
        
        if($favoris->isEmpty()) {
        
        $favori = new Favori([
                    'id_bien' => $request->get('id_bien'),
                    'id_user' => $request->get('id_user'),
                  ]);
        $favori->save();
        }
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bien = Bien::find($id);
        return view('bien/updatebien', ['bien' => $bien]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
          'frais'=>'required'
        ]);
        
        $dependance = $request->get('dependance');
        $dep = NULL;
        if($dependance == 'Oui') {
          $dep = 1;
        }
        else {
          $dep = 2;
        }
        
        $id = Bien::find($id);
        $id->titre_bien = $request->get('titre');
        $id->descr_bien = $request->get('description');
        $id->image_bien = $request->get('image');
        $id->type_bien = $request->get('type');
        $id->region_bien = $request->get('region');
        $id->superficie_bien = $request->get('superficie');
        $id->nbr_piece_bien = $request->get('nbr_piece');
        $id->dependance_bien = $dep;
        $id->prix_bien = $request->get('prix');
        $id->frais_agence_bien = $request->get('frais');
        
        $id->save();
        
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removefavs = Favori::all()->where("id_bien", "=", $id);
        foreach($removefavs as $removefav) {
          $removefav->delete();
        }
        
        return redirect('/home');
    }
}
