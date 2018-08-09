@extends('layout', ['title' => 'Products'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Products list</h2>
        </header>
      </div>
    </section>
    <div class="container">
        @if(empty($products))
          <p>No products available.</p>
        @else    
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Unit price</th>
          </tr>
          @foreach ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>
              <a href="{{ route('products-details', $product->id) }}">
                {{ $product->name }}
              </a>
            </td>
            <td>${{ $product->price }}</td>
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


