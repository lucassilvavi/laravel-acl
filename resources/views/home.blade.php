@extends('layouts.app')

@section('content')
<div class="container">
@forelse($dados['posts'] as $post)
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p><hr>
    <p>Autor:{{$post->user->name}}</p>
    <a href="{{url("post/$post->id/update")}}">Editar</a>
    @empty
    <p>Nenhum Post Cadastrado</p>
    @endforelse
</div>
@endsection
