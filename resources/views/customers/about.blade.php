@extends('layout', ['title' => $customer->name])
@section('content')

<section class="about-grid">
  <header>
    <div class="container">
      <div>
        <p>Customer</p>
        <h2>{{ $customer->name }}</h2>
      </div>
      <div>
        <a href="{{ route('customers-edit', $customer->id) }}">
          <button class="button edit"><span><i class="fas fa-edit"></i></span>Edit</button>
        </a>
        <button class="button danger" onclick="destroy(this)" data-index="{{ route('customers-index') }}"><span><i class="fas fa-eraser"></i></span>Delete</button>
      </div>
    </div>
  </header>
  <div class="container">
    @if (count($customer->sales) > 0)
    <a href="{{ route('customers-sales', $customer->id) }}">
      <i class="fas fa-angle-right"></i> All sales
    </a>
    @endif
  </div>
</section>

@endsection

@section('scripts')
<script src="{{asset('js/delete.js')}}"></script>
@endsection