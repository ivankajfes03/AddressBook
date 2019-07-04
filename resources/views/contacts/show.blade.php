@extends('layouts.app')

@section('content')
<h1>Contacts</h1>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone Number</th>
      
    </tr>
  </thead>
	
  <tbody>
    <tr>
      <th scope="row">{{$contact->id }}</th>
      <td>{{$contact->name}}</td>
      <td>{{$contact->lastName}}</td>
      <td>{{$contact->address}}</td>
      <td>{{$contact->phone}}</td>
      
      
    </tr>
    
  </tbody>
	
	</table>


@endsection