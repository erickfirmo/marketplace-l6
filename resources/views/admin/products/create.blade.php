@extends('layouts.app')

@section('content')
<h1>Criar Produto</h1>
<form action="{{ route('admin.products.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome do Produto</label>
        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="body">Conteúdo</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror" value="{{ old('body') }}"></textarea>
        @error('body')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Preço</label>
        <input id="price" type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
        @error('price')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
        @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="store">Loja</label>
        <select name="store_id" id="store" class="form-control @error('store_id') is-invalid @enderror">
            @foreach ($stores as $store)
                <option value="{{ $store->id }}">{{ $store->name }} </option>
            @endforeach
        </select>
        @error('store_id')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
    </div>
</form>
@endsection