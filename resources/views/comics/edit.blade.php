@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    @include('partials.jumbo')
    <main class="bg-light">
        <div class="container">
            <form action="{{ route('comics.update', $comic->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group w-100">
                    <label for="exampleInputEmail1">Comic Title</label>
                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Title">
                </div>
                <div class="form-group w-100">
                    <label for="exampleInputPassword1">Comic Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Desc">
                </div>
                <div class="form-group w-100">
                    <label for="exampleInputPassword1">Comic Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Price">
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="exampleInputPassword1">Comic Type</label>
                    <input type="text" class="form-control" name="type" placeholder="Type">
                </div>
                <button type="submit" class="btn btn-primary ">Submit</button>
            </form>
        </div>

    </main>

@endsection
