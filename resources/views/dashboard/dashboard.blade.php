@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-center">
        <p>Seu token: {{ $token }}</p>
    </div>
    <x-vendors-table :token="$token" />
@endsection
