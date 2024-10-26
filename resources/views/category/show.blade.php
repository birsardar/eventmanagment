@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>categories Details</h1>
        <div class="card">
            <div class="card-header">
                {{ $categories->name }}
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $categories->id }}</p>
                <p><strong>Description:</strong> {{ $categories->description }}</p>
                <p><strong>Created At:</strong> {{ $categories->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $categories->updated_at }}</p>
            </div>
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-primary mt-3">Back to Categories</a>
    </div>
@endsection
