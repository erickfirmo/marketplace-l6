@extends('layouts.app')

@section('content')
    @if (!$store)
        <a href="{{ route('admin.stores.create') }}" class="btn btn-lg btn-success">Criar Loja</a>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ($store)
                <tr>
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->name}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.stores.edit', ['store' => $store->id ]) }}" class="btn btn-sm btn-primary mx-1">EDITAR</a>
                            <form action="{{ route('admin.stores.destroy', ['store' => $store->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection