@extends('layouts.app')

@section('content')
<h1>Criar Produto</h1>
<form action="{{ route('admin.products.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome do Produto</label>
        <input id="name" type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label for="body">Conteúdo</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Preço</label>
        <input id="price" type="text" name="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug" class="form-control">
    </div>
    <div class="form-group">
        <label for="store">Loja</label>
        <select name="store_id" id="store" class="form-control">
            @foreach ($stores as $store)
                <option value="{{ $store->id }}">{{ $store->name }} </option>
            @endforeach
        </select>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
    </div>
</form>
@endsection