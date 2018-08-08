@extends('layout')
@section('title', 'Stores')
@section('content')

<section class="container">
    <header class="row">
        <div class="col">
            <h5>Stores list</h5>
        </div>
    </header>
    <div class="row">
        <div class="col">
            @if(empty($stores))
                <p>No stores available.</p>
            @else    
                <ul>
                    @foreach ($stores as $store)
                    <li>
                        {{ $store->id }} - 
                        <a href="{{ route('stores-details', $store->id) }}">
                            {{ $store->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</section>

@endsection