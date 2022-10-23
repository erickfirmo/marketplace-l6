    <div class="form-group">
        <label for="name">Nome do Produto</label>
        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name ?? old('name') }}">
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $product->description ?? old('description') }}">
        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="body">Conteúdo</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ $product->body ?? old('body') }}</textarea>
        @error('body')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Preço</label>
        <input id="price" type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price ?? old('price') }}">
        @error('price')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $product->slug ?? old('slug') }}">
        @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>