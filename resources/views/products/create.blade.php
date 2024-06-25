@extends('layout')

@section('content')
<h1>Create Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <button type="submit">Save</button>
</form>
@endsection
