@extends('layouts.admin')

@section('content')
	
	<div class="d-flex justify-content-between align-items-center">
		<div>
			<h4>Bestelling #{{ $order->slug }}</h4>
			<p><em>{{ $order->name }} ({{ $order->speltak }})</em></p>
		</div>
		<form action="{{ route('admin.orders.destroy', $order) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button type="submit" class="btn btn-danger">Annuleren</a>
		</form>
		
	</div>

	<table class="table mt-4">
	
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