@extends('layouts.app')

@section('content')

    <div class="row mt-1">
        <div class="col-12 text-center">
            <h1>Blog de Noticias</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/store" method="post">
                @csrf
                <button class="btn btn-success">Actualizar noticias</button>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        @foreach ($articles as $item)
            <div class="col-4">
                <img src="{{ $item->url_to_image }}" class="img-thumbnail" alt="">
            </div>
            <div class="col-6">
                <p>{{ $item->source->name }}</p>
                <h3>{{ $item->title }}</h3>
                <small>{{ $item->author->profile->name  }} {{ $item->author->profile->lastname  }} | {{ $item->published_at->format('d-m-Y H:m') }}</small>

                <p>{{ $item->description }}</p>

                <small><a href="/show/{{ $item->slug }}">More</a></small>
            </div>
            <hr class="mt-1 mb-1">

        @endforeach

    </div>

    <div class="row">
        <div class="col-12">
            {{ $articles->links() }}
        </div>
    </div>

@endsection
