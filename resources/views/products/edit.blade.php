@extends('layout')

@section('content')
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ $product->name }}">
    <button type="submit">Update</button>
</form>
@endsection
