@extends('layout', ['title' => $sale->name])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <p>Sale</p>
          <h2>{{ $sale->name }}</h2>
          <h3>Unit price: ${{ $sale->price }}</h3>
        </header>
        <div class="crud">
          <a href="{{ route('sales-edit', $sale->id) }}">
            <button class="button edit"><span><i class="fas fa-edit"></i></span>Editar</button>
          </a>
          <button class="button danger" onclick="destroy(this)" data-index="{{ route('sales-index') }}"><span><i class="fas fa-eraser"></i></span>Eliminar</button>
        </div>
      </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection