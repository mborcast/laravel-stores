@extends('layout', ['title' => 'Stores'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Stores list</h2>
        </header>
      </div>
    </section>
    <div class="container">
      <div class="index-grid">
        @if(empty($stores))
          <p>No stores available.</p>
        @else    
          @foreach ($stores as $store)
          <a class="index-item" href="{{ route('stores-details', $store->id) }}">
            <p>{{ $store->name }}</p>
            <aside>
              <p class="overview">{{ count($store->customers) }} customers</p>
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


