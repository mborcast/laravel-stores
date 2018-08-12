@extends('layout', ['title' => 'products'])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <h2>Products list</h2>
        </header>
        <a href="{{ route('products-create') }}">
          <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
        </a>
      </div>
    </section>
    <div class="container">
      <div class="index-grid">
        @if(empty($products))
          <p>No products available.</p>
        @else    
          @foreach ($products as $product)
          <a class="index-item" href="{{ route('products-about', $product->id) }}">
            <aside>
              <span class="index-icon">
                <i class="fas fa-gift"></i>
              </span> 
              <p>{{ $product->name }}</p>
              <p class="overview">{{ count($product->sales) }} sales</p>
            </aside>
          </a>
          @endforeach
        @endif
      </div>
      @include('shared.paginator', ['current' => $current, 'container' => 'index-grid'])
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/products.js') }}"></script>
<script src="{{ asset('js/details.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection

