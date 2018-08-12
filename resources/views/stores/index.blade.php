@extends('layout', ['title' => 'Stores'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Stores list</h2>
        </header>
        <a href="{{ route('stores-create') }}">
          <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
        </a>
      </div>
    </section>
    <div class="container">
      <div class="index-grid">
        @if (empty($stores))
          <p>No stores available.</p>
        @else    
          @foreach ($stores as $store)
          <a class="index-item" href="{{ route('stores-about', $store->id) }}">
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
      <ul class="paginator">
      @for ($i = 1; $i <= $pages; $i++)
        <li @if ($current != $i) class="paginator-item" @else class="paginator-item active" @endif data-container="index-grid" data-page="{{$i}}">{{$i}}</li>
      @endfor
      </ul>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/stores.js') }}"></script>
<script src="{{ asset('js/details.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


