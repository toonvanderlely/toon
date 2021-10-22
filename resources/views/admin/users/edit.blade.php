@extends('layouts.admin')

@section('content')

<div class="d-flex align-items-center flex-column my-5"> 

	<form action="{{ route('admin.users.update', $user) }}" method="POST" style="min-width: 320px;">
		
		<h4>Account aanpassen</h4>

		<div class="form-group">
			<label for="name">Naam</label>
			<input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
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
		{{ method_field('PATCH') }}
	</form>
	<form action="{{ route('admin.users.destroy', $user) }}" method="POST">
		<button type="submit" class="form-control btn btn-outline-danger">Verwijderen</button>
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
</div>

@endsection
