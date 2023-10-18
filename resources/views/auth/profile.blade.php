@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <x-profile_info :user="$user" />
        <x-profile_password_update />
        <x-profile_delete />
    </div>
@endsection
