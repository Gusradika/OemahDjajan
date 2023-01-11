@extends('dashboard.layouts.main')
@section('container')
    <h1>Hello, Welcome Back<span class="text-primary"> {{ auth()->user()->name }}</span> To Oemah Djajan Dashboard!</h1>
@endsection
