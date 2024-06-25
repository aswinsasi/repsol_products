@extends('layout')

@section('content')
<h1>Product List</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
<ul class="list-group mt-3">
    @foreach($products as $product)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $product->name }}
            <span>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </span>
        </li>
    @endforeach
</ul>
<form action="{{ route('products.search') }}" method="GET" class="mt-3">
    <input type="text" name="query" placeholder="Search" class="form-control">
    <button type="submit" class="btn btn-primary mt-2">Search</button>
</form>
@endsection
