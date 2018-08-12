@extends('layout', ['title' => $product->name])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <p>product</p>
          <h2>{{ $product->name }}</h2>
        </header>
        <p class="about-price">
          ${{ $product->price }}
        </p>
        <div class="crud">
          <a href="{{ route('products-edit', $product->id) }}">
            <button class="button edit"><span><i class="fas fa-edit"></i></span>Edit</button>
          </a>
          <button class="button danger" onclick="destroy(this)" data-index="{{ route('products-index') }}"><span><i class="fas fa-eraser"></i></span>Delete</button>
        </div>
        @if (count($product->sales) > 0)
        <a href="{{ route('products-sales', $product->id) }}">
          <i class="fas fa-angle-right"></i> All sales
        </a>
        @endif
      </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection