@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{ route('admin.stores.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome da Loja</label>
        <input id="name" type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input id="phone" type="text" name="phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="mobile_phone">Celular/WhatsApp</label>
        <input id="mobile_phone" type="text" name="mobile_phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug" class="form-control">
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Criar Loja</button>
    </div>
</form>
@endsection