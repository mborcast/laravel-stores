@extends('layout', ['title' => 'Sales'])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <h2>Sales list</h2>
        </header>
        <div class="crud">
          <a href="{{ route('sales-create') }}">
            <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
          </a>
          <button class="button danger batch-destroyer" data-endpoint="{{route('sales-batch-destroy')}}" disabled>
            <span><i class="fas fa-eraser"></i></span>Eliminar
          </button>
        </div>
      </div>
    </section>
    <div class="container">
      <form class="sales-grid">
        @if(empty($sales))
          <p>No sales available.</p>
        @else    
          @foreach ($sales as $sale)
          <div class="sales-item">
            <header>
              <p class="date">{{ $sale->date->format('d M Y') }}</p>
              <p class="units">
                <i class="fas fa-box-open"></i><span class="times"><i class="fas fa-times"></i></span>{{ $sale->products[0]->pivot->units }}
              </p>
              <p class="product">{{ $sale->products[0]->name }}</p>
              <p class="store">{{ $sale->store->name }}</p>
            </header>
            <a href="{{ route('sales-about', $sale->id) }}">
              <button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>
            </a>
            <label class="control">
              <input type="checkbox" name="deleted[]" value="{{$sale->id}}">
              <div class="control-indicator"></div>
            </label>
          </div>
          @endforeach
        @endif
      </form>
      @include('shared.paginator', ['current' => $current, 'container' => 'sales-grid'])
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/sales-builder.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


