<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passport;

class PassportController extends Controller
{
    //
    public function create(){
        return view('create');   
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passport = Passport::find($id);
        return view('edit',compact('passport','id'));
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
       
        $passport= Passport::find($id);
        $passport->name=$request->get('name');
        $passport->email=$request->get('email');
        $passport->number=$request->get('number');
        $passport->office=$request->get('office');
        $date = date_create($request->get('date'));
        $format = date_format($date, "y-m-d");
        $passport->date = strtotime($format); 
        $passport->save();
        return redirect('passports');
    }
    
   /* Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $passport = Passport::find($id);
        $passport->delete();
        return redirect('passports')->with('success','Information has been  deleted');
    }

    public function index()
    {
        $passports=Passport::all();
        return view('index',compact('passports'));
    }
    
    /* Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store(Request $request)
   {
       if($request->hasfile('filename'))
        {
           $file = $request->file('filename');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/images/', $name);
        }
       $passport= new Passport;
       $passport->name=$request->get('name');
       $passport->email=$request->get('email');
       $passport->number=$request->get('number');
       $date=date_create($request->get('date'));
       $format = date_format($date,"Y-m-d");
       $passport->date = strtotime($format);
       $passport->office=$request->get('office');
       $passport->filename=$name;
       $passport->save();
       
       return redirect('passports')->with('success', 'Information has been added');
   }


}
