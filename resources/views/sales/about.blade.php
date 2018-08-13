@extends('layout', ['title' => $sale->products[0]->name])
@section('content')

<section class="about-grid">
  <header>
    <div class="container">
      <div class="sale">
        <p class="date">{{ $sale->date->format('d M Y') }}</p>
        <p class="units">
          <i class="fas fa-box-open"></i>
          <span class="times"><i class="fas fa-times"></i></span>
          {{ $sale->products[0]->pivot->units }}
        </p>
        <p class="product">{{ $sale->products[0]->name }}</p>
        <div class="relationship">
          <p><span><i class="fas fa-store"></i></span>
            <a href="{{route('customers-about', $sale->store->id)}}">
              {{$sale->store->name}}
            </a>
          </p>
        </div>
        <div class="relationship">
          <p><span><i class="fas fa-user"></i></span>
            <a href="{{route('customers-about', $sale->customer->id)}}">
              {{$sale->customer->name}}
            </a>
          </p>
        </div>
      </div>
      <div>
        <button class="button danger" onclick="destroy(this)" data-index="{{ route('sales-index') }}"><span><i class="fas fa-eraser"></i></span>Delete</button>
      </div>
    </div>
  </header>
</section>

@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection