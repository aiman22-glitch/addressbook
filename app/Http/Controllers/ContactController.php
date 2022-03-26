<?php

namespace App\Http\Controllers;
use App\Models\contacts;
use Illuminate\Http\Request;



class ContactController extends Controller

{
    public function index()
    {
        $contacts = contacts::latest()->paginate(10);
        return view('contacts.index',compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
        ]);

        $contacts = new contacts;
        $contacts->first_name =  $request->get('first_name');  
        $contacts->last_name = $request->get('last_name');  
        $contacts->email = $request->get('email');  
        $contacts->phone = $request->get('phone'); 
        $contacts->bio = $request->get('bio');  
        $contacts->save();  
        return view('contacts.create',compact('contacts'));
    }

   
    public function search (Request $request)
    {
        $search = $request->get('search');
$contacts = contacts::where('first_name','=','%'.$search.'%')->with('first_name')->get();
return view('contacts.index',['contacts' => $contacts]);

    }

    public function edit($id)
    {
        $contacts= contacts::find($id);
        return view('contacts.edit',compact('contacts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
        ]);
        $contacts= contacts::find($id);
        
        $contacts->first_name =  $request->get('first_name');  
        $contacts->last_name = $request->get('last_name');  
        $contacts->email = $request->get('email');  
        $contacts->phone = $request->get('phone'); 
        $contacts->bio = $request->get('bio');  
        $contacts->save();  
       
        return redirect()->route('contacts.index')->with('success','contact updated successfully');
    }

    public function destroy($id)
    {   $contacts=contacts::find($id);
        $contacts->delete();
        return redirect()->route('contacts.index')->with('success','contact deleted successfully');
    }

    //
}
