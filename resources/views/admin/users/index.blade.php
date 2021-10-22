@extends('layouts.admin')

@section('content')
	
	<div class="d-flex justify-content-between align-items-center my-4">
		<h4>Accounts</h4>
		<div>
			<a href="{{ route('admin.users.create') }}">Nieuwe gebruiker toevoegen</a>
		</div>
	</div>

	<table class="table table-striped table-hover">
		<tr>
			<th>Naam</th>
			<th>E-mail</th>
			<th>&nbsp;</th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					<a href="{{ route('admin.users.edit', $user->id) }}">Aanpassen</a>
				</td>
			</tr>
		@endforeach
	</table>
@endsection
