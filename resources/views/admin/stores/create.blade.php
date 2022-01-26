<h1>Criar Loja</h1>
<form action="{{ route('admin.stores.store') }}" method="post">
    @csrf
    <div>
        <label for="name">Nome da Loja</label>
        <input id="name" type="text" name="name">
    </div>

    <div>
        <label for="description">Descrição</label>
        <input id="description" type="text" name="descripton">
    </div>

    <div>
        <label for="phone">Telefone</label>
        <input id="phone" type="text" name="phone">
    </div>
    <div>
        <label for="mobile_phone">Celular/Whatsapp</label>
        <input id="mobile_phone" type="text" name="mobile_phone">
    </div>
    <div>
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug">
    </div>
    <div>
        <label for="user">Usuário</label>
        <select name="user_id" id="user">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} </option>
            @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Criar Loja</button>
    </div>
</form>