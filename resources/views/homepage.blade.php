@extends('base')

@section('head')
@endsection

@section('content')
@if(Auth::check())
	{{ Auth::user()->photo }}
@endif
 
@endsection