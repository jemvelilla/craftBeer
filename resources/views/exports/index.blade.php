<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>ADDRESS COMPONENTS</th>
				<th>PERIODS</th>
				<th>ADR ADDRESS</th>
				<th>FORMATTED ADDRESS</th>
				<th>ICON</th>
				<th>INTERNATIONAL PHONE NUMBER</th>
				<th>RATING</th>
				<th>REFERENCE</th>
				<th>SCOPE</th>
				<th>URL</th>
				<th>UTC OFFSET</th>
				<th>VICINITY</th>
				<th>LOCATION</th>
			</tr>
		</thead>
		<?php 
		$model = new App\Result;
		$results = $model->whereNotNull('result_id')
					->with(['geometry', 'component', 'schedule'])
					->get();
		?>			
		<tbody>
			@foreach($results as $result)
			<tr>
				<td>{{ $result->result_id }}</td>
				<td>{{ $result->name }}</td>
				<td>
					@foreach($result->component as $component)
						{{ $component->long_name }}
						({{ $component->short_name }}), 
					
					@endforeach
				</td>
				<td>
					@foreach($result->schedule as $schedule)
						{{ $schedule->body }},
					@endforeach
				</td>
				<td>{{ $result->adr_address }}</td>
				<td>{{ $result->formatted_address }}</td>
				<td>{{ $result->icon }}</td>
				<td>{{ $result->international_phone_number }}</td>
				<td>{{ $result->rating }}</td>
				<td>{{ $result->reference }}</td>
				<td>{{ $result->scope }}</td>
				<td>{{ $result->url }}</td>
				<td>{{ $result->utc_offset }}</td>
				<td>{{ $result->vicinity }}</td>
				<td>
					@foreach($result->geometry as $geometry) 
						Latitude: {{ $geometry->location_lat }}
						Longitude: {{ $geometry->location_lng }}
					@endforeach
				</td>
				
			</tr>
			@endforeach
		</tbody>
		
	</table>
	
</body>
</html>