@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-center">
        <p>Your API TOKEN</p>: {{ $token }}</p>
    </div>
    <x-vendors-table :token="$token" />
@endsection
