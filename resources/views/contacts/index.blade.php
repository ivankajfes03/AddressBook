@extends('layouts.app')

@section('content')
<h1>Contacts</h1>
 <a href="/contacts/create" class="btn btn-primary">
        Create
</a>
<br><br>
@if(count($contacts) > 0)

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
	@foreach($contacts as $contact)
		
  <tbody>
  	<a href="/contacts/{{$contact->id}}">
    <tr>
      <th scope="row">{{$contact->id }}</th>
      <td>{{$contact->name}}</td>
      <td>{{$contact->lastName}}</td>
      <td>{{$contact->address}}</td>
      <td>{{$contact->phone}}</td>
      
      <td>
      	<a href="/contacts/{{$contact->id}}" class="btn btn-success">
      	Show
      </a>
      </td>
      
      <td>
        <a href="/contacts/{{$contact->id}}/edit" class="btn btn-primary">
        Edit
      </a>
      </td>

      <td>
        <form method="post" action="{{action('AddressBook@destroy', $contact->id)}}">
          {{ method_field('DELETE') }}
          {{csrf_field()}}
        
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>

    </tr>
    
  </tbody>
	@endforeach

	</table>

@else
	<p>No Contacts found</p>
@endif

@endsection