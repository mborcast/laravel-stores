@extends('layout', ['title' => $title])
@section('content')

<div class="container">
  <form class="submit-form">
    <fieldset>
      <legend><span><i class="fas fa-store"></i></span>{{$title}}</legend>
      <div>
        <label>Store name</label>
        <input type="text" placeholder="Store name" name="name" value="{{ isset($store) ? $store->name : '' }}" required>
      </div>
      <button class="button primary submit" data-endpoint="{{ isset($store) ? route('stores-update', $store->id) : route('stores-store') }}">Submit</button>
    </fieldset>
  </form>
</div>

@endsection

@section('scripts')
<script src="{{ isset($store) ? asset('js/update.js') : asset('js/create.js')}}"></script>
@endsection


