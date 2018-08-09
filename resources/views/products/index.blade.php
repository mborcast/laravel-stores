@extends('layout', ['title' => 'Products'])
@section('content')

<section class="container">
    <header class="row">
        <div class="col">
            <h5>Products list</h5>
        </div>
    </header>
    <div class="row">
        <div class="col">
            @if(empty($products))
                <p>No products available.</p>
            @else    
                <ul>
                    @foreach ($products as $product)
                    <li>
                        {{ $product->id }} - 
                        <a href="{{ route('products-details', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</section>

@endsection