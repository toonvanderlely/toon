@extends('layouts.admin')

@section('content')
	

	<h4>Mails versturen</h4>
	<p>Onderstaande bestellers ontvangen een mail dat hun bestelling klaar ligt. De tekst onder het kopje <em>ophalen</em> moet je hieronder zelf nog invullen.</p>

	<form action="{{ route('admin.orders.mail.send') }}" method="POST">
		<p class="m-0"><strong>Ophalen</strong></p>
		<textarea name="pickup" id="" cols="30" rows="5" class="form-control">De bestelling is op te halen op het Scoutinggebouw, bij voorkeur aanstaande zaterdag om 12.00u. Daarna iedere zaterdag voor of na de opkomst. Vraag er even naar bij je speltakleiding!</textarea>
		<button type="submit" class="btn btn-success mt-3">Verstuur e-mails</button>
		{{ csrf_field() }}
	</form>

	<table class="table table-striped table-hover mt-5">
		<tr>
			<th>#</th>
			<th>Naam</th>
			<th>Speltak</th>
			<th>Bedrag</th>
			<th>Betaling</th>
		</tr>
		@foreach($orders as $order)
			<tr>
				<td>
					<a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->slug }}</a>
				</td>
				<td>{{ $order->name }}</td>
				<td>{{ ucfirst($order->speltak) }}</td>
				<td>&euro;{{ number_format($order->amount, 2) }}</td>
				<td>
					{!! $order->payed ? '<span class="badge badge-success">betaald</span>' : '<span class="badge badge-warning">niet betaald</span>' !!}
				</td>
			</tr>
		@endforeach
	</table>
@endsection