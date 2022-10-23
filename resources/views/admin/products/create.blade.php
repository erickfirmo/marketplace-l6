@extends('layouts.app')

@section('content')
<h1>Criar Produto</h1>
<form action="{{ route('admin.products.store') }}" method="post">
    @csrf
    @include('admin.products.partial._form')
    <div class="mt-3">
        <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
    </div>
</form>
@endsection