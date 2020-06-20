<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skilluser;
use App\Skilluserid;
use App\Skill;
use App\User;

class Skilluserchange extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillsuser = Skilluser::all();
        
        /*return view('skills.index', compact ('skills'));*/
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
        $request->validate([
          'skill'=>'required',
          'user_id'=>'required',
          'level'=>'required'
        ]);
        
        $skill = new Skilluser([
          'skill_id' => $request->get('skill'),
          'user_id' => $request->get('user_id'),
          'level' => $request->get('level')
        ]);
        
        $skill->save();
        
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
        $user = User::find($id);
        return view('/skillsusers')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skilluser::find($id);
        
        return view('skillsuser.edit', $skill);
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
          'name'=>'required',
          'firstname'=>'required',
          'lastname'=>'required',
          'email'=>'required',
          'tel'=>'required',
          'date_naissance'=>'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->firstname  = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->tel = $request->get('tel');
        $user->date_naissance = $request->get('date_naissance');
        $user->save();
        
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $userid = $request->get('user_id'); 
        $useridexpected = Skilluserid::find($userid);
        
        $removeskilluser = Skilluser::find($id);
        $removeskilluser->where('user_id', '=', $useridexpected->user_id)->where('skill_id', '=', $id)->delete();
        
        return redirect('/home');
    }
}
