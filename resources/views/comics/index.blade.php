@extends('layouts.app')

@section('title', 'Comics')

@section('content')
<main>
    <section class="container">
        <h1>Comics</h1>
        <div class="row gy-4">
          @foreach (config('comics.key') as $key => $comics)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{$comics['thumb']}}" alt="{{$comics['title']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$comics['title']}}</h5>
                        <p class="card-text">{{ substr($comics['description'], 0, 100) . '...' }}</p>
                        <a href="{{route('comics.show', $key)}}" class="btn btn-primary">Vedi dettaglio</a>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </section>
</main>
@endsection
