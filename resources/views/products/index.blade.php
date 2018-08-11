@extends('layout', ['title' => 'products'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Products list</h2>
        </header>
      </div>
    </section>
    <div class="container">
      <div class="index-grid">
        @if(empty($products))
          <p>No products available.</p>
        @else    
          @foreach ($products as $product)
          <a class="index-item" href="{{ route('products-details', $product->id) }}">
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
      <ul class="links">
      @for ($i = 1; $i <= $pages; $i++)
        <li @if ($current != $i) class="link-item" @else class="link-item active" @endif data-container="index-grid" data-page="{{$i}}">{{$i}}</li>
      @endfor
      </ul>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/products.js') }}"></script>
<script src="{{ asset('js/details.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection

