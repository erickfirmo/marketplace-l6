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
        <label for="categories">Categorias</label>
        <select name="categories[]" id="categories" class="form-control @error('categories') is-invalid @enderror" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    
                    @if (isset($product))
                        @if($product->categories->contains($category)) selected @endif
                    @endif

                >{{ $category->name  }}</option>
            @endforeach
        </select>
        @error('categories')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    @isset($product)
    <div class="form-group">
        <label for="photos">Fotos do Produto</label>
        <input id="photos" type="file" name="photos[]" multiple class="form-control @error('photos.*') is-invalid @enderror" value="{{ $product->photos ?? old('photos') }}">
        @error('photos.*')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    @endisset

    @isset($product)
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $product->slug ?? old('slug') }}" disabled>
    </div>
    @endisset