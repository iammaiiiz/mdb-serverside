@extends('layout')
@section('lang','en')
@section('title','Login to admin')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf
        <h1>Login to admin</h1>
        <label for="passPhase">Pass Phase</label>
        <input type="text" id="passPhase" name="passPhase">
        <input type="submit" value="Login">
    </form>
@endsection