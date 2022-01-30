@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stores as $store)
                <tr>
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->name}}</td>
                    <td>
                        <a href="{{ route('admin.stores.edit', ['store' => $store->id ]) }}" class="btn btn-sm btn-default">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $stores->links() }}
@endsection