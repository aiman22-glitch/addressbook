@extends('contacts.layout')
@section('content')
<table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>email</th>
            <th>phone</th>
            <th>bio</th>
            <th>Action</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->first_name }}</td>
            <td>{{ $contact->last_name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone}}</td>
            <td>{{ $contact->bio }}</td>
            <td><form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
             @method('DELETE')
            <a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id)}}">Edit</a>
            @csrf
           
            <button type="submit" onclick="return confirm('Do you really want to delete contact!')" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
        @endforeach
    </table>

@endsection