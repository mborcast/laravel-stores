@extends('layout', ['title' => $store->name])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="store-name">
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
        <table class="sales">
          <tr>
            <th>ID</th>
            <th>Date</th>
          </tr>
          @foreach ($store->sales as $sale)
          <tr>
            <td>{{ $sale->id }}</td>
            <td>
              <a href="{{ route('customers-details', $sale->id) }}">
                {{ $sale->date }}
              </a>
            </td>
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