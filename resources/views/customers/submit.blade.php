@extends('layout', ['title' => $title])
@section('content')

<div class="container">
  <form class="submit-form">
    <fieldset>
      <legend><span><i class="fas fa-user-circle"></i></span>{{$title}}</legend>
      <div>
        <label>Customer name</label>
        <input type="text" placeholder="Customer name" name="name" value="{{ isset($customer) ? $customer->name : '' }}" required>
      </div>
      <button class="button primary submit" data-endpoint="{{ isset($customer) ? route('customers-update', $customer->id) : route('customers-store') }}">Submit</button>
    </fieldset>
  </form>
</div>

@endsection

@section('scripts')
<script src="{{ isset($customer) ? asset('js/update.js') : asset('js/create.js')}}"></script>
@endsection


