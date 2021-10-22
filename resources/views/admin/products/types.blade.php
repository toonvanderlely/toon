@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between my-5">
	<div>
		<h4>{{ $product->title }}</h4>
		<p class="lead">&euro;{{ number_format($product->price, 2) }}</p>
		<p>
			@if($product->active)
				<span class="badge badge-success">Zichtbaar</span>
			@else
				<span class="badge badge-light">Onzichtbaar</span>
			@endif
			@if($product->leiding)
				<span class="badge badge-info">Leiding</span>
			@else
				<span class="badge badge-primary">Leden</span>
			@endif
		</p>
		<p>{{ $product->description }}</p>
		<p>
			<a href="{{ route('admin.products.index') }}">Terug naar overzicht &gt;</a><br />
			<a href="{{ route('admin.products.edit', $product) }}">Product-info aanpassen &gt;</a>
		</p>
	</div>
	<div class="ml-5 w-50 text-right">
		<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded mw-100">
	</div>
</div>
<hr class="my-5">

<table class="table table-striped table-hover">
	<tr>
		<th>Type</th>
		<th>Maten</th>
		<th>Fabrikant</th>
		<th></th>
	</tr>
	@foreach($product->types as $type)
		<tr>
			<td>{{ $type->title }}</td>
			<td>{{ $type->sizes->implode('title', ', ') }}</td>
			<td><small><em>{{ $type->description }}</em></small></td>
			<td>
				<form action="{{ route('admin.products.types.delete', [$product, $type]) }}" method="POST" class="m-0">
					<button type="submit" class="btn btn-link m-0 p-0">Verwijderen</button>
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
				</form>
			</td>
		</tr>
	@endforeach
	<tr>
		<td colspan="4">
			<a href="{{ route('admin.products.types.create', $product) }}">Nieuw type toevoegen &gt;</a>
		</td>
	</tr>
</table>


@endsection
