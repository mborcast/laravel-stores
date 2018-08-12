@extends('layout', ['title' => $sale->name])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <p>Sale</p>
          <h2>{{ $sale->date }}</h2>
        </header>
      </div>
    </section>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/details.js') }}"></script>
@endsection