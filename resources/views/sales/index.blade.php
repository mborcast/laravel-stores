@extends('layout', ['title' => 'Sales'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Sales list</h2>
        </header>
      </div>
    </section>
    <div class="container">
      <div class="sales-grid">
        @if(empty($sales))
          <p>No sales available.</p>
        @else    
          @foreach ($sales as $sale)
          <a class="sales-item" href="{{ route('sales-details', $sale->id) }}">
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
      <ul class="links">
      @for ($i = 1; $i <= $pages; $i++)
        <li @if ($current != $i) class="link-item" @else class="link-item active" @endif data-container="sales-grid" data-page="{{$i}}">{{$i}}</li>
      @endfor
      </ul>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/sales.js') }}"></script>
<script src="{{ asset('js/details.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


