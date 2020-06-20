<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agence;

class AgenceController extends Controller
{
    public function index()
    {
        $agences = Agence::all();
        
        return view('agence/agence', compact ('agences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agence = Agence::find($id);
        
        return view('agence.edit', compact ('agence'));
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
        $request->validate([
          'email'=>'required',
          'tel'=>'required',
          'agent'=>'required',
          'region'=>'required'
        ]);
        
        $agence = Agence::find($id);
        $agence->email_agence = $request->get('email');
        $agence->tel_agence = $request->get('tel');
        $agence->nbr_agent_agence = $request->get('agent');
        $agence->region_agence = $request->get('region');
        $agence->save();
        
        return redirect('/agencecontroller/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removeagency = Agence::find($id);
        $removeagency->delete();
        
        return redirect('/agencecontroller/');
    }
}
