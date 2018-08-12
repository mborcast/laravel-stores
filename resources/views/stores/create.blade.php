@extends('layout', ['title' => 'Create store'])
@section('content')

<div class="container">
  <form class="create-form" action="">
    <fieldset>
      <legend><span><i class="fas fa-store-alt"></i></span>Create new store</legend>
      <div>
        <input id="store-name" type="text" placeholder="Store name" name="name" required>
      </div>
      <button class="button submit" data-endpoint="{{ route('stores-store') }}">Submit</button>
    </fieldset>
  </form>
  <ul class="errors"></ul>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/create.js')}}"></script>
@endsection


