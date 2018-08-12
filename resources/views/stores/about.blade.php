@extends('layout', ['title' => $store->name])
@section('content')

<div class="about-grid">
  <section class="top">
    <div class="container">
      <header class="about-name">
        <p>Store</p>
        <h2>{{ $store->name }}</h2>
      </header>
      <div class="crud">
        <a href="{{ route('stores-edit', $store->id) }}">
          <button class="button edit"><span><i class="fas fa-edit"></i></span>Editar</button>
        </a>
        <button class="button danger" onclick="destroy(this)" data-index="{{ route('stores-index') }}"><span><i class="fas fa-eraser"></i></span>Eliminar</button>
      </div>

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
<script src="{{asset('js/delete.js')}}"></script>
@endsection