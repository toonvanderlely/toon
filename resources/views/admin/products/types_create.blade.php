@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-center my-5"> 

	<form action="{{ route('admin.products.types.store', $product) }}" method="POST" style="min-width: 320px;">
		
		<h4>{{ $product->title }} &gt; Nieuwe type</h4>

		<div class="form-group">
			<label for="title">Titel</label>
			<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Dames">
		</div>
		<div class="form-group">
			<label for="description">Omschrijving van type t.b.v. fabrikant</label>
			<input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}" placeholder="Basic hoody full-zip Ladies (grijs, logo voor en achter)">
		</div>
		<div class="form-group">
			<label for="sizes">Maten (voer alle maten in, gescheiden door een komma)</label>
			<textarea name="sizes" id="sizes" cols="30" rows="5" class="form-control" placeholder="XS,S,M,..."></textarea>
		</div>

		<button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
		{{ csrf_field() }}
	</form>
</div>

@endsection
