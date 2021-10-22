@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-center my-5"> 

	<form action="{{ route('admin.users.store') }}" method="POST" style="min-width: 320px;">
		
		<h4>Nieuw account</h4>

		<div class="form-group">
			<label for="name">Naam</label>
			<input type="text" id="name" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Wachtwoord</label>
			<input type="password" id="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label for="password_confirmation">Wachtwoord bevestigen</label>
			<input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
		</div>

		<button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
		{{ csrf_field() }}
	</form>
</div>

@endsection
