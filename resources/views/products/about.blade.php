@extends('layout', ['title' => $product->name])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <p>product</p>
          <h2>{{ $product->name }}</h2>
          <h3>Unit price: ${{ $product->price }}</h3>
        </header>
        <div class="crud">
          <a href="{{ route('products-edit', $product->id) }}">
            <button class="button edit"><span><i class="fas fa-edit"></i></span>Editar</button>
          </a>
          <button class="button danger" onclick="destroy(this)" data-index="{{ route('products-index') }}"><span><i class="fas fa-eraser"></i></span>Eliminar</button>
        </div>
        @if (count($product->sales) > 0)
        <a href="{{ route('products-sales', $product->id) }}">
          <i class="fas fa-angle-right"></i> All sales
        </a>
        @endif
      </div>
    </section>
    <div class="container">
      <div class="outlet">
        <div class="sales">
          <div class="sales-grid">
            @foreach ($product->sales as $sale)
            <a class="sales-item" href="{{ route('sales-about', $sale->id) }}">
              <header>
                <p class="units">{{ $sale->products[0]->pivot->units }} units</p>
                <p class="product">{{ $sale->products[0]->name }}</p>
              </header>
              <div>
                <p class="date">{{ $sale->date->format('d M Y') }}</p>
                <p class="price">{{ $sale->products[0]->price }}</p>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection