@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Owner</h2>
        <form action="{{ route('owners.store') }}" method="POST">
            @csrf
            @include('owners.form')
            <button type="submit" class="btn btn-success">Save Owner</button>
        </form>
    </div>
@endsection
