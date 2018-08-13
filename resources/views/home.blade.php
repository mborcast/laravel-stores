@extends('layout', ['title' => 'Home'])
@section('content')

<section>
  <header>
    <div class="container">
      <h2>Laravel Stores</h2>
    </div>
  </header>
  <div class="container">
    <div class="cell-grid">
      <a href="{{route('stores-index')}}" class="cell">
        <figure>
          <span><i class="fas fa-store"></i></span>
          <h2>Stores</h2>
        </figure>
      </a>
      <a href="{{route('customers-index')}}" class="cell">
        <figure>
          <span><i class="fas fa-users"></i></span>
          <h2>Customers</h2>
        </figure>
      </a>
      <a href="{{route('products-index')}}" class="cell">
        <figure>
          <span><i class="fas fa-boxes"></i></span>
          <h2>Products</h2>
        </figure>
      </a>
      <a href="{{route('sales-index')}}" class="cell">
        <figure>
          <span><i class="fas fa-shopping-cart"></i></span>
          <h2>Sales</h2>
        </figure>
      </a>
    </div>
  </div>
</section>

@endsection

@section('scripts')
@endsection