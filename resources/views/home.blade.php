@extends('layouts.default')

@section('content')
<h2>Hello, {{$name}}. You are {{$position}} and you live at {{$address}}.</h2>

@if ( $age  > 17 )
    <h3>You are {{$age}} years old.</h3>

@else
    <h3>You are too young</h3>
@endif

@endsection