@extends('layouts.app')

@section('content')
<h1>Update Contact</h1>

<form method="post" action="{{action('AddressBook@update', $contact->id)}}">
  
   {{ method_field('PUT') }}
    {{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control col-sm-4" id="" placeholder="name" name="name" value="{{$contact->name}}">
    
  </div>

  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control col-sm-4" id="" placeholder="lastName" name="lastName" value="{{$contact->lastName}}">
    
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control col-sm-4" id="" placeholder="address" name="address" value="{{$contact->address}}">
    
  </div>

  <div class="form-group">
    <label for="name">Phone</label>
    <input type="text" class="form-control col-sm-4" id="" placeholder="phone" name="phone" value="{{$contact->phone}}">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection