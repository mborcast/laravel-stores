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
      <div class="index-grid">
        @if(empty($sales))
          <p>No sales available.</p>
        @else    
          @foreach ($sales as $sale)
          <a class="index-item" href="{{ route('sales-details', $sale->id) }}">
            <p>{{ $sale->date }}</p>
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


