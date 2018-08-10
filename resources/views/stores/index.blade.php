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
            <aside>
              <span class="index-icon">
                <i class="fas fa-store"></i>
              </span> 
              <p>{{ $store->name }}</p>
              <p class="overview">{{ count($store->customers) }} customers</p>
            </aside>
          </a>
          @endforeach
        @endif
      </div>
      @for ($i = 1; $i <= $pages; $i++)
        <button onclick="paginate({{$i}})">{{$i}}</button>
      @endfor
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/details.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
@endsection


