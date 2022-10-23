@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{ route('admin.stores.store') }}" method="post">
    @csrf
    @include('admin.stores.partial.form')
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Criar Loja</button>
    </div>
</form>
@endsection