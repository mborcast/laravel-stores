@extends('layout', ['title' => $product->name])
@section('content')

<section class="about-grid">
  <header>
    <div class="container">
      <div>
        <p>product</p>
        <h2>{{ $product->name }}</h2>
        <h3>${{ $product->price }}</h3>
      </div>
      <div>
        <a href="{{ route('products-edit', $product->id) }}">
          <button class="button edit"><span><i class="fas fa-edit"></i></span>Edit</button>
        </a>
        <button class="button danger" onclick="destroy(this)" data-index="{{ route('products-index') }}"><span><i class="fas fa-eraser"></i></span>Delete</button>
      </div>
    </div>
  </header>
  <div class="container">
    @if (count($product->sales) > 0)
    <a href="{{ route('products-sales', $product->id) }}">
      <i class="fas fa-angle-right"></i> All sales
    </a>
    @endif
  </div>
</section>

@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection