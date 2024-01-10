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
                    <input type="text" required class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" name="title" aria-describedby="emailHelp" placeholder="Title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-100">
                    <label for="exampleInputPassword1">Comic Description</label>
                    <input type="text" required class="form-control @error('description') is-invalid @enderror"
                        value="{{ old('description') }}" name="description" placeholder="Desc">
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-100">
                    <label for="exampleInputPassword1">Comic Price</label>
                    <input type="text" required class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}" name="price" placeholder="Price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="exampleInputPassword1">Comic Type</label>
                    <input type="text" required class="form-control @error('type') is-invalid @enderror"
                        value="{{ old('type') }}" name="type" placeholder="Type">
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="exampleInputPassword1">Comic Series</label>
                    <input type="text" required class="form-control @error('series') is-invalid @enderror"
                        value="{{ old('series') }}" name="series" placeholder="series">
                    @error('series')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="exampleInputPassword1">Comic Sale date</label>
                    <input type="text" required class="form-control @error('sale_date') is-invalid @enderror"
                        value="{{ old('sale_date') }}" name="sale_date" placeholder="sale_date">
                    @error('sale_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ">Submit</button>
            </form>
        </div>

    </main>

@endsection
