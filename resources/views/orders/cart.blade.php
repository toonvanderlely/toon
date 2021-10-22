@extends('layouts.app')

@section('content')

	<h5><em>Winkelwagentje</em></h5>
	@include('orders.partial_cart', ['remove' => true])

	<div class="d-flex justify-content-end my-4">
		<a href="{{ route('shop') }}" class="btn btn-primary mr-3">Verder winkelen &gt;</a>
		<a href="{{ route('order') }}" class="btn btn-success">Bestellen &gt;</a>
	</div>

@endsection
