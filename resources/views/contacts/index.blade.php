@extends('contacts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>ADDRESSSBOOK</h3>
            </div>
            <div class="pull-right"><a class="nav-link" href="{{ route('signout') }}">Logout</a></div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create new contact</a>
            </div>
            <div class="pull-right">
                <form action="{{url('/search')}}" method="get">
                    <div class="form-group">
                        <input type="search" name="search" class="input-control" placeholder="Enter name to search"  >
                        <span class="form-group-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                </form>
            
            <br>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <span>{{ $message }}</span>
    </div>
    @endif
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