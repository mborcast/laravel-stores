@extends('layout', ['title' => 'Stores'])
@section('content')

<section class="about-grid">
  <header>
    <div class="container">
      <div>
        @if (isset($title)) 
        <h2>{{$title}}</h2>
        <h3>Stores list</h3>
        @else
        <h2>Stores list</h2>
        @endif
      </div>
      <div>
        <a href="{{ route('stores-create') }}">
          <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
        </a>
        <button class="button danger batch-destroyer" data-endpoint="{{route('stores-batch-destroy')}}" disabled>
          <span><i class="fas fa-eraser"></i></span>Delete
        </button>
      </div>
    </div>
  </header>
  <div class="container">
    <form class="index-grid">
      @if (empty($stores))
      <p>No stores available.</p>
      @else   
      @foreach ($stores as $store)
      <div class="index-item">
        <aside>
          <span class="index-icon">
            <i class="fas fa-store"></i>
          </span> 
          <p>{{ $store->name }}</p>
          <p class="overview">{{ count($store->customers) }} customers</p>
        </aside>
        <a href="{{ route('stores-about', $store->id) }}">
          <button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>
        </a>
        <a href="{{ route('stores-edit', $store->id) }}">
          <button type="button" class="mini button edit"><i class="fas fa-pencil-alt"></i></button>
        </a>
        <label class="control">
          <input type="checkbox" name="deleted[]" value="{{$store->id}}">
          <div class="control-indicator"></div>
        </label>
      </div>
      @endforeach
      @endif
    </form>
    @include('shared.paginator', ['current' => $current, 'container' => 'index-grid'])
  </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/stores-builder.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


