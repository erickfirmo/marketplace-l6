@extends('layouts.app')

@section('content')
    <h1>Editar Loja</h1>
    <form action="{{ route('admin.stores.update', [ 'store' => $store->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.stores.partial._form')
        <div class="mt-3">
            <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
        </div>
    </form>

@endsection