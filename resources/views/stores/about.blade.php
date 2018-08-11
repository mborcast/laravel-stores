@extends('layout', ['title' => $store->name])
@section('content')

<div class="details-grid">
  <section class="top">
    <div class="container">
      <header class="details-name">
        <p>Store</p>
        <h2>{{ $store->name }}</h2>
      </header>
      <a href="{{ route('stores-customers', $store->id) }}">
        <i class="fas fa-angle-right"></i> All customers
      </a>
      <a href="{{ route('stores-sales', $store->id) }}">
        <i class="fas fa-angle-right"></i> All sales
      </a>
    </div>
  </section>
</div>

@endsection

@section('scripts')
@endsection