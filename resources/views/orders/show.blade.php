@extends('layouts.app')

@section('content')

	@if(!$order->payed)
		<div class="alert alert-info">
			<h5 class="alert-heading">Nog niet betaald</h5>
			<p>Let op: deze bestelling is nog niet betaald. U kunt de bestelling ook nog annuleren.</p>
			<hr>
			<p>
				<a href="{{ route('ideal.pay', $order) }}" class="alert-link">Nu betalen &gt;</a>
				<a href="{{ route('order.cancel', [$order, $order->slug]) }}" class="alert-link ml-3">Annuleren &gt;</a>
			</p>
		</div>
	@endif

	<div class="d-flex justify-content-between mt-5">
		<div>
			<h5><em>Bestelling #{{ $order->slug }}</em></h5>
			<p>{{ $order->name }} ({{ $order->speltak }})</p>
		</div>
		<div>
			@if($order->payed)
				<span class="badge badge-success">Betaald</span>
			@else
				<span class="badge badge-warning">Niet betaald</span>
			@endif
		</div>
	</div>
	

	<table class="table mb-5">
		<?php $total = 0; ?>
		@foreach($order->rules as $rule)
			<tr>
				<td>{{ $rule->product }}</td>
				<td>{{ $rule->type }} {{ $rule->size }}</td>
				<td class="text-right">&euro;{{ $rule->price }}</td>
				<?php $total += $rule->price; ?>
			</tr>
		@endforeach
		<tr>
			<td colspan="2"><strong>Totaal</strong></td>
			<td class="text-right"><strong>&euro;{{ number_format($total, 2) }}</strong></td>
		</tr>
	</table>

@endsection
