@extends('layouts.app')

@section('content')
    <section id="admin-show">

        <div class="container my-5 rounded-2 p-2" style="border: 1px solid #d55924;">
            <a class="back-btn btn btn-dark mb-2" href="{{ route('admin.dishes.index') }}">Indietro</a>
            <h2 class="mt-3 mb-3 text-center fw-bold" style="color: #d55924;">Aggiungi un nuovo prodotto</h2>

            <form action="" method="POST" class="py-5" enctype="multipart/form-data">
                @csrf

                {{-- Nome Prodotto --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Aggiungi nome <span>*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required maxlength="100">
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Categorie --}}
                <div class="mb-3">
                    <label for="category" class="form-label">Categoria <span>*</span></label>
                    <select id="category" name="category" class="form-select @error('category') is-invalid @enderror" required>
                        <option value="">Seleziona una categoria</option>
                        <option value="Colazione">Colazione</option>
                        <option value="Pranzo">Pranzo</option>
                        <option value="Cena">Cena</option>
                        <option value="Merenda">Merenda</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                {{-- ingredienti--}}
                <div class="mb-3">
                    <label for="ingredients" class="form-label">Ingredienti <span>*</span></label>
                    @foreach(Auth::user()->ingredients as $ingredient)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"
                                id="ingredient_{{ $ingredient->id }}">
                            <label class="form-check-label" for="ingredient_{{ $ingredient->id }}">
                                {{ $ingredient->nome }}
                            </label>
                        </div>
                    @endforeach
                    @error('ingredients')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                
                


            </form>

            <p>* Campi obbligatori</p>
        </div>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    
    @endsection
