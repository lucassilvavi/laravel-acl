@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$dados['post']->title}}</h1>
        <p>{{$dados['post']->description}}</p>
        <hr>
        <p>Autor:{{$dados['post']->user->name}}</p>

    </div>
@endsection
