@extends('layouts.app')


@section('content')
    <h1>Criar Categoria</h1>
    <form action="{{route('admin.categories.store')}}" method="POST">
        @csrf
        @include('admin.categories.partial._form')
        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Categoria</button>
        </div>
    </form>
@endsection