@extends('layouts.app')

@section('title', 'Comics')

@section('content')
    <main>
        <section class="container">
            <h1>Comics</h1>
            <form class="py-3" action="{{ route('comics.index') }}" method="GET">
                <select name="search" id="search">
                    <option selected value="">All</option>
                    <option value="comic book">Comic</option>
                    <option value="graphic novel">Graphic Novel</option>
                </select>
                <button class="btn btn-success position-static" type="submit">Cerca</button>
            </form>
            @if (session()->has('deleted'))
                <div class="alert alert-success">
                    {{ session('deleted') }}
                </div>
            @endif
            <div class="row gy-4">
                @foreach ($comics as $comic)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comic->title }}</h5>
                                <p class="card-text">{{ substr($comic->description, 0, 100) . '...' }}</p>
                                <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Vedi dettaglio</a>
                                <form action="{{ route('comics.destroy', $comic->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger position-static">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
