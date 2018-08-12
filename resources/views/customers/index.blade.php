@extends('layout', ['title' => 'Customers'])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <h2>Customers list</h2>
        </header>
        <div class="crud">
          <a href="{{ route('customers-create') }}">
            <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
          </a>
          <button class="button danger batch-destroyer" data-endpoint="{{route('customers-batch-destroy')}}" disabled>
            <span><i class="fas fa-eraser"></i></span>Delete
          </button>
        </div>
      </div>
    </section>
    <div class="container">
      <form class="index-grid">
        @if(empty($customers))
          <p>No customers available.</p>
        @else    
          @foreach ($customers as $customer)
          <div class="index-item">
            <aside>
              <span class="index-icon">
                <i class="fas fa-user-circle"></i>
              </span> 
              <p>{{ $customer->name }}</p>
              <p class="overview">{{ count($customer->sales) }} sales</p>
            </aside>
            <a href="{{ route('customers-about', $customer->id) }}">
              <button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>
            </a>
            <a href="{{ route('customers-edit', $customer->id) }}">
              <button type="button" class="mini button edit"><i class="fas fa-pencil-alt"></i></button>
            </a>
            <label class="control">
              <input type="checkbox" name="deleted[]" value="{{$customer->id}}">
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
<script src="{{ asset('js/customers-builder.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


