@extends('layout', ['title' => $sale->name])
@section('content')

<div class="about-grid">
  <section class="top">
    <div class="container">
      <header class="about-name">
        <p>Sale</p>
        <h2>{{ $sale->products[0]->name }}</h2>
      </header>
      <div>
        <p>{{ $sale->products[0]->pivot->units }} units</p>
        <p>{{ $sale->store->name }}</p>
        <p>{{ $sale->date->format('d M Y') }}</p>
      </div>
      <div class="crud">
        <button class="button danger" onclick="destroy(this)" data-index="{{ route('sales-index') }}"><span><i class="fas fa-eraser"></i></span>Delete</button>
      </div>
    </div>
  </section>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection