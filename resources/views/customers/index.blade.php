@extends('layout', ['title' => 'Customers'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Customers list</h2>
        </header>
      </div>
    </section>
    <div class="container">
        @if(empty($customers))
          <p>No customers available.</p>
        @else    
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
          </tr>
          @foreach ($customers as $customer)
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
        @endif
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/details.js') }}"></script>
@endsection


