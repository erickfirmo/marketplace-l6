@extends('layouts.app')

@section('content')
    <table>
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
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $stores->links() }}
@endsection