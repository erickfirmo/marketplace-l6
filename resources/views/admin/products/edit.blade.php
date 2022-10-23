@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>
<form action="{{ route('admin.products.update', [ 'product' => $product->id ]) }}" method="post">
    @csrf
    @method('PUT')
    @include('admin.products.partial._form')
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
    </div>
</form>
@endsection