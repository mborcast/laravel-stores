@extends('layout', ['title' => $title])
@section('content')

<div class="container">
  <form class="submit-form">
    <fieldset>
      <legend><span><i class="fas fa-box-open"></i></span>{{$title}}</legend>
      <div>
        <input type="text" placeholder="Sale name" name="name" value="{{ isset($sale) ? $sale->name : '' }}" required>
      </div>
      <button class="button primary submit" data-endpoint="{{ isset($sale) ? route('sales-update', $sale->id) : route('sales-store') }}">Submit</button>
    </fieldset>
  </form>
</div>

@endsection

@section('scripts')
<script src="{{ isset($sale) ? asset('js/update.js') : asset('js/create.js')}}"></script>
@endsection


