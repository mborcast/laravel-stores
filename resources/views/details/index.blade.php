@extends('layout', ['title' => 'Details'])
@section('content')

<div class="details-grid">
    <section class="top">
      <div class="container">
        <header class="details-name">
          <h2>Details list</h2>
        </header>
      </div>
    </section>
    <div class="container">
        @if(empty($details))
          <p>No details available.</p>
        @else    
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
          </tr>
          @foreach ($details as $detail)
          <tr>
            <td>{{ $detail->id }}</td>
            <td>
              <a href="{{ route('details-details', $detail->id) }}">
                {{ $detail->name }}
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


