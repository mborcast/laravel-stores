@extends('layout', ['title' => $store->name])
@section('content')

<section class="about-grid">
  <header>
    <div class="container">
      <div>
        <p>Store</p>
        <h2>{{ $store->name }}</h2>
      </div>
      <div>
        <a href="{{ route('stores-edit', $store->id) }}">
          <button class="button edit"><span><i class="fas fa-edit"></i></span>Edit</button>
        </a>
        <button class="button danger" onclick="destroy(this)" data-index="{{ route('stores-index') }}"><span><i class="fas fa-eraser"></i></span>Delete</button>
      </div>
    </div>
  </header>
  <div class="container">
    @if (count($store->customers) > 0)
    <a href="{{ route('stores-customers', $store->id) }}">
      <i class="fas fa-angle-right"></i> All customers
    </a>
    @endif
    @if (count($store->sales) > 0)
    <a href="{{ route('stores-sales', $store->id) }}">
      <i class="fas fa-angle-right"></i> All sales
    </a>
    @endif
  </div>
</section>
@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection