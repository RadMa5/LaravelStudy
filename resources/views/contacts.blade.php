@extends('layouts.default')

@section('content')
@if ($email === '')
<h1>You didn't specify your email</h1>
@else
<h1>{{$email}}</h1>
<h3>Your inbox:</h3>
<p>Inbox is empty</p>
@endif
@endsection