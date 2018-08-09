@extends('layout', ['title' => $store->name])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <p>Store</p>
          <h2>{{ $store->name }}</h2>
        </header>
        <ul class="tabs">
          <li class="tab-item" data-outlet="customers">
            <i class="fas fa-users"></i>
            <span>Customers</span>
          </li>
          <li class="tab-item" data-outlet="sales">
            <i class="fas fa-box-open"></i>
            <span>Sales</span>
          </li>
        </ul>
      </div>
    </section>
    <div class="container">
      <div class="outlet">
        <table class="customers">
          <tr>
            <th>ID</th>
            <th>Name</th>
          </tr>
          @foreach ($store->customers as $customer)
          <tr>
            <td>{{ $customer->id }}</td>
            <td>
              <a href="{{ route('customers-details', $customer->id) }}">
                {{ $customer->name }}
              </a>
            </td>
          </tr>
          @endforeach
        </table>
        <div class="sales">
          <div class="sales-grid">
            @foreach ($store->sales as $sale)
            <a class="sales-item" href="{{ route('sales-details', $sale->id) }}">
              <header>
                <p class="units">{{ $sale->products[0]->pivot->units }} units</p>
                <p class="product">{{ $sale->products[0]->name }}</p>
              </header>
              <div>
                <p class="date">{{ $sale->date->format('d-M-Y') }}</p>
                <p class="price">{{ $sale->products[0]->price }}</p>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/details.js') }}"></script>
@endsection