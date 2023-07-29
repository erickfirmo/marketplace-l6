    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name ?? old('name') }}">

        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $category->description ?? old('description') }}">

        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    @isset($category)
    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $category->slug ?? old('slug')}}" disabled>
    </div>
    @endisset