@extends('layouts.admin')

@section('content')

    

        <h2 class="text-uppercase mt-4 text-center">I tuoi ingredienti</h2>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.dishes.create') }}" class="btn mybtn-orange mt-3">
                <i class="fa-solid fa-plus"></i> <span class="fs-5">Aggiungi un nuovo prodotto</span>
            </a>
        </div>


        @if (count($ingredients) > 0)

        <table class="table table-striped">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Calorie</th>
                <th scope="col">Carboidrati</th>
                <th scope="col">Di cui zuccheri</th>
                <th scope="col">Grassi</th>
                <th scope="col">Di cui saturi</th>
                <th scope="col">Fibre</th>
                <th scope="col">Proteine</th>
                <th scope="col">Sali</th>
                <th scope="col">Aggiunto il</th>
                <th scope="col">Cancella</th>
            </tr>
            </thead>

            <tbody>
            @foreach($ingredients as $ingredient)
                    <tr>
                        <th scope="row">{{$ingredient->id}}</th>
                        <td scope="row">{{$ingredient->nome}}</td>
                        <td>{{Str::limit($ingredient->description,100)}}</td>
                        <td scope="row">{{$ingredient->calorie}}</td>
                        <td scope="row">{{$ingredient->carboidrati}}</td>
                        <td scope="row">{{$ingredient->carboidrati_di_cui_zuccheri}}</td>
                        <td scope="row">{{$ingredient->grassi}}</td>
                        <td scope="row">{{$ingredient->grassi_di_cui_saturi}}</td>
                        <td scope="row">{{$ingredient->fibre}}</td>
                        <td scope="row">{{$ingredient->proteine}}</td>
                        <td scope="row">{{$ingredient->sali}}</td>
                        <td scope="row">{{$ingredient->created_at}}</td>
                        {{-- <td><a class="link-secondary" href="{{route('admin.ingredients.edit')}}" title="Edit Post"><i class="fa-solid fa-pen"></i></a></td> --}}
                        <td>
                            <form action="{{route('admin.ingredients.destroy')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$ingredient->nome}}">Elimna ingrediente</button>
                         </form>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>

        @else   
            <p>nessun piatto trovato</p>
        @endif

            
        </div>




        @include('profile.partials.admin.modal-delete')

    

@endsection
