@extends('layout', ['title' => 'Sales'])
@section('content')

<section class="about-grid">
  <header>
    <div class="container">
      <div>
        @if (isset($title)) 
        <h2>{{$title}}</h2>
        <h3>Sales list</h3>
        @else
        <h2>Sales list</h2>
        @endif
      </div>
      <div>
        @if (!isset($title)) 
        <a href="{{ route('sales-create') }}">
          <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
        </a>
        @endif
        <button class="button danger batch-destroyer" data-endpoint="{{route('sales-batch-destroy')}}" disabled>
          <span><i class="fas fa-eraser"></i></span>Delete
        </button>
      </div>
    </div>
  </header>
  <div class="container">
    <form class="sales-grid">
      @if(empty($sales))
        <p>No sales available.</p>
      @else    
      @foreach ($sales as $sale)
      <div class="sales-item">
        <aside>
          <p class="units">
            <i class="fas fa-box-open"></i>
            <span class="times"><i class="fas fa-times"></i></span>
            {{ $sale->products[0]->pivot->units }}
          </p>
          <p class="date">{{ $sale->date->format('d M Y') }}</p>
          <p class="product">{{ $sale->products[0]->name }}</p>
        </aside>
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
</section>

@endsection

@section('scripts')
<script src="{{ asset('js/sales-builder.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


