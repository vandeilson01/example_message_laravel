@extends("layouts.app")

@section("content")
    <example-component id-user="{{ \Auth::user()->id }}"/>
@endsection