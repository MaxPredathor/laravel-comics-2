@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    @include('partials.jumbo')
    <main class="bg-light">
        <div class="container">
            <form action="{{ route('comics.store') }}" method="POST">
                @csrf
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
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                        value="{{ old('description') }}" name="description" placeholder="Desc">
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-100">
                    <label for="exampleInputPassword1">Comic Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}" name="price" placeholder="Price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="exampleInputPassword1">Comic Type</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                        value="{{ old('type') }}" name="type" placeholder="Type">
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ">Submit</button>
            </form>
        </div>

    </main>

@endsection
