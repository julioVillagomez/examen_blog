@extends('layouts.app')

@section('content')

<div class="row mt-1">
    <div class="col-12 text-left">
        <small>{{ $article->source->name }}</small>
    </div>
    <div class="col-12 text-center">
        <h1>{{ $article->title }}</h1>
        <hr>
    </div>
    <div class="col-12">
        <p class="fs-3 text" >{{ $article->content }}</p>

        <img src="{{ $article->url_to_image }}" alt="img-fluid">
    </div>
</div>

@endsection
