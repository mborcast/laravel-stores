@extends('layout')
@section('title', '')
@section('content')

<section class="container">
    <header class="row">
        <div class="col">
            <h5>{{ $store->name }}</h5>
        </div>
    </header>
    <div class="row">
        <div class="col">
            <ul>
                @foreach ($store->customers as $customer)
                <li>
                    {{ $customer->id }} - 
                    <a href="{{ route('customers-details', $customer->id) }}">
                        {{ $customer->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

@endsection