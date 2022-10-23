@extends('layouts.app')

@section('content')
<h1>Editar Loja</h1>
<form action="{{ route('admin.stores.update', [ 'store' => $store->id ]) }}" method="post">
    @csrf
    @method('PUT')
    @include('admin.stores.partial.form')
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
    </div>
</form>
@endsection