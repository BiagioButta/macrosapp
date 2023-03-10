@extends('layouts.app')

@section('content')
    <section id="admin-show">
        <div class="container my-5 p-2 rounded-2" style="border: 1px solid #d55924;">
            <a class="back-btn btn btn-dark mb-3" href="{{ route('admin.products.index') }}">Indietro</a>
            <h2 class="mt-3 mb-3 text-center fw-bold" style="color: #d55924;">Modifica il prodotto</h2>



            <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" class="py-5"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nome Prodotto --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Modifica il nome <span>*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Descrizione --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Modifica la descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }} </textarea>

                    @error('description')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tipologia Prodotto --}}
                <div class="mb-3">
                    <label for="type_id" class="form-label text-capitalize">Modifica tipo <span>*</span></label>
                    <select name="type_id" id="type_id"
                        class="form-control @error('type_id') is-invalid @enderror text-capitalize" required>
                        <option value="">Seleziona tipo</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                {{ $type->id == old('type_id', $product->type_id) ? 'selected' : '' }}
                                class="text-capitalize">
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Immagine --}}
                <div class="d-flex">
                    <div class="media me-4">
                        <img class="shadow" width="150" src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->image }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Modifica immagine prodotto <span>*</span></label>
                        <div><img id="uploadPreview" width="96" src="https://via.placeholder.com/300x200"></div>
                        <input type="file" name="image" id="image"
                            class="form-control  @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Prezzo Prodotto --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Modifica prezzo <span>*</span></label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Disponibilit?? --}}
                <div class="mb-3">
                    <fieldset>
                        Modifica disponibilit?? <span>*</span>
                        <div>
                            <input type="radio" id="available" name="available" value="1" required
                                {{ 1 == old('available', $product->available) ? 'checked' : 'Error' }} />
                            <label for="available">Disponibile</label>

                            <input type="radio" id="available" name="available" value="0" required
                                {{ 0 == old('available', $product->available) ? 'checked' : 'Error' }} />
                            <label for="available">Non disponibile</label>
                        </div>

                    </fieldset>
                </div>

                {{-- Sconto --}}
                {{-- <div class="mb-3">
                    <label for="discount" class="form-label">Modifica sconto</label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount"
                        name="discount" value="{{ old('discount', $product->discount) }}">
                    @error('discount')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div> --}}



                <div class="mt-4">
                    <button type="submit" class="btn mybtn-orange">Conferma modifiche</button>
                    <button type="reset" class="btn mybtn">Resetta</button>
                </div>
            </form>

            <p>* campi obbligatori</p>
        </div>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    @endsection
