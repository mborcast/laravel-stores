@extends('layout', ['title' => $customer->name])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <p>Customer</p>
          <h2>{{ $customer->name }}</h2>
        </header>
        <ul class="tabs">
          <li class="tab-item" data-outlet="sales">
            <i class="fas fa-box-open"></i>
            <span>Sales</span>
          </li>
        </ul>
      </div>
    </section>
    <div class="container">
      <div class="outlet">
        <table class="sales">
          <tr>
            <th>ID</th>
            <th>Store</th>
            <th>Date</th>
          </tr>
          @foreach ($customer->sales as $sale)
          <tr>
            <td>{{ $sale->id }}</td>
            <td>
              <a href="{{ route('stores-details', $sale->store->id) }}">
                {{ $sale->store->name }}
              </a>
            <td>{{ $sale->date }}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/details.js') }}"></script>
@endsection