@extends('layout', ['title' => 'Sales'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Sales list</h2>
        </header>
      </div>
    </section>
    <div class="container">
        @if(empty($sales))
          <p>No sales available.</p>
        @else    
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
          </tr>
          @foreach ($sales as $sale)
          <tr>
            <td>{{ $sale->id }}</td>
            <td>
              <a href="{{ route('sales-details', $sale->id) }}">
                {{ $sale->name }}
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


