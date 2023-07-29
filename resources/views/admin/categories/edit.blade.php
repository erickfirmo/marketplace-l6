@extends('layouts.app')


@section('content')
    <h1>Atualizar Categoria</h1>
    <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
        @csrf
        @method("PUT")
        @include('admin.categories.partial._form')
        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Categoria</button>
        </div>
    </form>
@endsection