@extends('layout', ['title' => 'products'])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <h2>Products list</h2>
        </header>
        <div class="crud">
          <a href="{{ route('products-create') }}">
            <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
          </a>
          <button class="button danger batch-destroyer" data-endpoint="{{route('products-batch-destroy')}}" disabled>
            <span><i class="fas fa-eraser"></i></span>Eliminar
          </button>
        </div>
      </div>
    </section>
    <div class="container">
      <form class="index-grid">
        @if(empty($products))
          <p>No products available.</p>
        @else    
          @foreach ($products as $product)
          <div class="index-item">
            <aside>
              <span class="index-icon">
                <i class="fas fa-gift"></i>
              </span> 
              <p>{{ $product->name }}</p>
              <p class="overview">{{ count($product->sales) }} sales</p>
            </aside>
            <a href="{{ route('products-about', $product->id) }}">
              <button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>
            </a>
            <a href="{{ route('products-edit', $product->id) }}">
              <button type="button" class="mini button edit"><i class="fas fa-pencil-alt"></i></button>
            </a>
            <label class="control">
              <input type="checkbox" name="deleted[]" value="{{$product->id}}">
              <div class="control-indicator"></div>
            </label>
          </div>
          @endforeach
        @endif
      </form>
      @include('shared.paginator', ['current' => $current, 'container' => 'index-grid'])
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/products-builder.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection

