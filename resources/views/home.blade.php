@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <p><a class="btn btn-lg btn-success" href="{{ route('leden') }}" role="button">Ouders / jeugdleden &gt;</a></p>
    <p><a class="btn btn-lg btn-primary mt-4" href="{{ route('leiding') }}" role="button">Leiding / explorers &gt;</a></p>
</div>
@endsection
