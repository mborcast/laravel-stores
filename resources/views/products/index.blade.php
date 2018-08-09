@extends('layout', ['title' => 'Products'])
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
            <p>{{ $product->name }}</p>
            <aside>
              <p class="overview">
                ${{ $product->price }}
              </p>
            </aside>
          </a>
          @endforeach
        @endif
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/details.js') }}"></script>
@endsection


