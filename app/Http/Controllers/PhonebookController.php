<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phonebook;
use Auth;
use Illuminate\Support\Facades\Storage;


class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::check()){
           
        // }else {
        //     return redirect('login'); 
        // }

        


        $phonebooks = Phonebook::orderBy('name','asc')->paginate(5);

        return view('phonebook.index', compact('phonebooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phonebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $this->validate($request, [
            'name' => 'required',
        ]);


        $phonebook = new Phonebook;
        $phonebook->name = $request->input('name');
        $phonebook->contactnum = $request->input('contactnum');

        if ($request->file('image') == "") {
            $path =  "";    
        }else {
            $path = $request->file('image')->store('upload') ;
        }
        


        $phonebook->profile_pic = $path;
        $phonebook->save();


        return redirect('phonebook')->with('success', 'Contact has been added');  


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phonebook = Phonebook::find($id);

        return view('phonebook.edit', compact('phonebook'));
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $phonebook = Phonebook::find($id); 
        $phonebook->name = $request->get('name');
        $phonebook->contactnum = $request->get('contactnum');


        if ($request->file('image') == "") {
            $phonebook->profile_pic = $phonebook->profile_pic;  
        }else {
            $phonebook->profile_pic = $request->file('image')->store('upload') ;
        }   

        // echo $request->file('image')->store('upload');

        $phonebook->save();

        return redirect('phonebook')->with('success','Contact has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phonebook = Phonebook::find($id);
        $phonebook->delete();

        return redirect('phonebook')->with('success', 'Contact has been deleted succesfully');
    }
}










