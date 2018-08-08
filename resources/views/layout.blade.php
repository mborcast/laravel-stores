<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

	<title>Laravel Stores – {{ ucfirst($title ?? '') }}</title>

	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	
	@yield('styles')
</head>
<body>
	@include('shared.navbar')
	@yield('content')
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
	<script>
		$.ajaxSetup
		({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>
	@yield('scripts')
</body>
</html>