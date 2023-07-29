    <div class="form-group">
        <label for="name">Nome da Loja</label>
        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $store->name ?? old('name') }}">
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror"  value="{{ $store->description ?? old('description') }}">
        @error('description')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ $store->phone ??  old('phone') }}">
        @error('phone')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="mobile_phone">Celular/WhatsApp</label>
        <input id="mobile_phone" type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror"  value="{{ $store->mobile_phone ?? old('mobile_phone') }}">
        @error('mobile_phone')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    
    @isset($store)
        <img src="{{ asset('storage/' . $store->logo) }}" class="img-fluid">
    @endisset

    <div class="form-group">
        <label for="logo">Logo</label>
        <input id="logo" type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ $store->logo ?? old('logo') }}">
        @error('logo')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    @isset($store)
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $store->slug ?? old('slug') }}" disabled>
        @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    @endisset
