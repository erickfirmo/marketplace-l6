@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>
<form action="{{ route('admin.products.update', [ 'product' => $product->id ]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.products.partial._form')
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
    </div>

    
</form>

<hr>

<div class="row">
    @foreach ($product->photos as $photo)
        <div class="col-4 text-center">
            <img src="{{ asset('storage/' . $photo->image) }}" alt="" class="img-fluid">
            <form action="{{ route('admin.photo.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="photoName" value="{{ $photo->image }}">
                <button type="submit" class="btn btn-lg btn-danger">REMOVER</button>
            </form>
        </div>
    @endforeach
</div>

@endsection