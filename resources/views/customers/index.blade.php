@extends('layout', ['title' => 'customers'])
@section('content')
<section class="container">
    <header class="row">
        <div class="col">
            <h5>Customers list</h5>
        </div>
    </header>
    <div class="row">
        <div class="col">
            @if(empty($customers))
                <p>No customers.</p>
            @else    
                <ul>
                    @foreach ($customers as $customer)
                    <li>
                        {{ $customer->id }} - 
                        <a href="{{ route('customers-details', $customer->id) }}">
                            {{ $customer->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</section>

@endsection