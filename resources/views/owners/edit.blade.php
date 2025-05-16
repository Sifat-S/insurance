@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Owner</h2>
        <form action="{{ route('owners.update', $owner) }}" method="POST">
            @csrf
            @method('PUT')
            @include('owners.form')
            <button type="submit" class="btn btn-primary">Update Owner</button>
        </form>
    </div>
@endsection
