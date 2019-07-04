<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class AddressBook extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
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
            'lastName' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        if (Contact::where('phone', '=', $request->input('phone'))->exists()) {
            return redirect('/contacts/create')->with('error', 'Phone exists');
        }

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->lastName = $request->input('lastName');
        $contact->address = $request->input('address');
        $contact->phone = $request->input('phone');
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit')->with('contact', $contact);
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
            'name' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $contact = Contact::find($id);
        if ($contact->phone === $request->input('phone')) {
            $contact->name = $request->input('name');
            $contact->lastName = $request->input('lastName');
            $contact->address = $request->input('address');
            $contact->phone = $request->input('phone');
            $contact->save();

            return redirect('/contacts')->with('success', 'Contact Updated');
        
        }
        if (Contact::where('phone', '=', $request->input('phone'))->exists()) {
            return redirect("/contacts/$id/edit")->with('error', 'Phone exists');
        }

        $contact->name = $request->input('name');
        $contact->lastName = $request->input('lastName');
        $contact->address = $request->input('address');
        $contact->phone = $request->input('phone');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contact Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/contacts')->with('success', 'Contact Removed');
    }
}
