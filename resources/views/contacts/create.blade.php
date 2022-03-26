@extends('contacts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Contact</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Whoops!</strong> something we are problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Firstname:</strong>
                    <input type="text" name="first_name" class="form-control" placeholder="First name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lastname:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="email">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Phone:</strong>
                <input type="number" name="phone" class="form-control" placeholder="phone">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Bio:</strong>
                <input type="text"  name="bio" class="form-control" placeholder="bio">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    </form>
@endsection
