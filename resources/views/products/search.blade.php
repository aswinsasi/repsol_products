@extends('layout')

@section('content')
<h1>Search Results</h1>
@if ($hasResults)
    <ul class="list-group">
        @foreach($products as $product)
            <li class="list-group-item">{{ $product->name }}</li>
        @endforeach
    </ul>
@else
    <p>No results found for "{{ request('query') }}".</p>
@endif
<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
``
