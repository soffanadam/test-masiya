<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Test Masiya</title>
<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
@yield('css')
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Person</h1>
		</div>
		<div class="col-md-6">
			<ul class="nav nav-tabs pull-right nav-tabs-blue">
				<li class="{{ active_class(if_uri('persons/by-city')) }}"><a href="{{ route('person.getIndex', ['groupBy' => 'city']) }}">By City</a></li>
				<li class="{{ active_class(if_uri('persons/by-department')) }}"><a href="{{ route('person.getIndex', ['groupBy' => 'department']) }}">By Department</a></li>
			</ul>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-blue">
			<thead>
				<tr>
				<td>Name</td><td>City</td><td>Department</td><td width="10"></td>
				</tr>
			</thead>
			<tbody>
				@foreach ($groupedPersons as $group => $persons)
					<tr><th colspan="4">{{ $group }}</th></tr>
					@foreach ($persons as $person)
						<tr>
							<td>{{ $person['name'] }}<br><span class="text-muted">{{ $person['position'] }}</span></td>
							<td>{{ $person['city'] }}</td>
							<td>{{ $person['department'] }}</td>
							<td><span class="status-indicator status-indicator-{{ $person['status'] }}">{{ $person['statusText'] }}</span></td>
						</tr>
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</body>
</html>