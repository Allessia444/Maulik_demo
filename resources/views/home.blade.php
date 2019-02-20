@extends('common.master')
@section('title','Dashboard')
@section('page')
    <h1>Welcome {!! Auth::user()->first_name !!} to system..!!</h1>
@endsection('page')
