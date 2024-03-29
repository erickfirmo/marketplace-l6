@extends('layouts.app')

@section('content')
    <a href="{{ route('admin.products.create') }}" class="btn btn-lg btn-success">Criar Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>R$ {{ $product->getPrice() }}</td>
                    <td>{{ $product->store->name }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.products.edit', ['product' => $product->id ]) }}" class="btn btn-sm btn-primary mx-1">EDITAR</a>
                            <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($products)
        {{ $products->links() }}
    @endif

@endsection