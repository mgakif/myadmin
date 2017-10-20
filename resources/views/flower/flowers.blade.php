@extends('base')
@section('content')
<h1>Ciçeklerimiz</h1>
<table>
	<tr>
	<th>Ad</th>
	<th>Fiyat</th>
	</tr>
@foreach($flowers as $flower)
	<tr>
		<td>{{ $flower->name }}</td>
		<td>{{ $flower->price }}</td>
	</tr>
@endforeach

</table>


<ul>
@foreach($adlar as $ad)
	<li>{{ $ad }}</li>
@endforeach
</ul>


@endsection