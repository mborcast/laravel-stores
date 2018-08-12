@extends('layout', ['title' => 'Sales'])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <h2>Sales list</h2>
        </header>
        <a href="{{ route('sales-create') }}">
          <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
        </a>
      </div>
    </section>
    <div class="container">
      <div class="sales-grid">
        @if(empty($sales))
          <p>No sales available.</p>
        @else    
          @foreach ($sales as $sale)
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
        @endif
      </div>
      @include('shared.paginator', ['current' => $current, 'container' => 'sales-grid'])
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/sales.js') }}"></script>
<script src="{{ asset('js/details.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


