@extends('layout', ['title' => 'Stores'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Stores list</h2>
        </header>
      </div>
    </section>
    <div class="container">
        @if(empty($stores))
          <p>No stores available.</p>
        @else    
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
          </tr>
          @foreach ($stores as $store)
          <tr>
            <td>{{ $store->id }}</td>
            <td>
              <a href="{{ route('stores-details', $store->id) }}">
                {{ $store->name }}
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


