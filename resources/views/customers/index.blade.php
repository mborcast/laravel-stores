@extends('layout', ['title' => 'Customers'])
@section('content')

<div class="about-grid">
    <section class="top">
      <div class="container">
        <header class="about-name">
          <h2>Customers list</h2>
        </header>
        <a href="{{ route('customers-create') }}">
          <button class="button primary"><span><i class="fas fa-plus"></i></span>Create</button>
        </a>
      </div>
    </section>
    <div class="container">
      <div class="index-grid">
        @if(empty($customers))
          <p>No customers available.</p>
        @else    
          @foreach ($customers as $customer)
          <a class="index-item" href="{{ route('customers-about', $customer->id) }}">
            <aside>
              <span class="index-icon">
                <i class="fas fa-user-circle"></i>
              </span> 
              <p>{{ $customer->name }}</p>
              <p class="overview">{{ count($customer->sales) }} sales</p>
            </aside>
          </a>
          @endforeach
        @endif
      </div>
      @include('shared.paginator', ['current' => $current, 'container' => 'index-grid'])
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/customers-builder.js') }}"></script>
<script src="{{ asset('js/index-pagination.js') }}"></script>
@endsection


