@extends('layouts.app')

@section('content')

	<h5><em>Bestellen</em></h5>
	@include('orders.partial_cart', ['remove' => false])
	
	<form action="{{ route('pay') }}" method="POST">
		<div class="form-group">
			<label for="name">Naam {{ session('type') == 'leden' ? 'jeugdlid' : '' }}</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
			<label for="email">E-mailadres</label>
			<input type="email" class="form-control" id="email" name="email">
		</div>
		<div class="form-group">
			<label for="speltak">{{ session('type') == 'leden' ? 'Speltak' : 'Team' }}</label>
			<select name="speltak" id="speltak" class="form-control">
				<option value="bevers">Bevers</option>
				<option value="hathi">Welpen Hathi</option>
				<option value="haveli">Welpen Haveli</option>
				<option value="scouts">Scouts</option>
				<option value="explorers">Explorers</option>
				<option value="overige">Overige</option>
			</select>
		</div>
		<div class="form-group d-flex justify-content-end">
			<button type="submit" class="btn btn-success">Bestellen &amp; betalen &gt;</button>
			{{ csrf_field() }}
		</div>
	</form>

@endsection
