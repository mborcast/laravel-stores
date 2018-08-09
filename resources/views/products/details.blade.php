@extends('layout', ['title' => $product->name])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <p>product</p>
          <h2>{{ $product->name }}</h2>
          <h3>Unit price: ${{ $product->price }}</h3>
        </header>
        <ul class="tabs">
          <li class="tab-item" data-outlet="customers">
            <i class="fas fa-users"></i>
            <span>Customers</span>
          </li>
          <li class="tab-item" data-outlet="sales">
            <i class="fas fa-box-open"></i>
            <span>Sales</span>
          </li>
        </ul>
      </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/details.js') }}"></script>
@endsection