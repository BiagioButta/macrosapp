@extends('layouts.admin')

@section('content')
    
    <h2 class="text-uppercase mt-4 text-center">I tuoi piatti</h2>
    
    <div class="d-flex justify-content-center">
        <a href="{{ route('admin.dishes.create') }}" class="btn mybtn-orange mt-3">
            <i class="fa-solid fa-plus"></i> <span class="fs-5">Aggiungi un nuovo prodotto</span>
        </a>
    </div>

    @if (count($dishes) > 0)
    
    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Calorie</th>
            <th scope="col">Carboidrati</th>
            <th scope="col">Di cui zuccheri</th>
            <th scope="col">Grassi</th>
            <th scope="col">Di cui saturi</th>
            <th scope="col">Fibre</th>
            <th scope="col">Proteine</th>
            <th scope="col">Sali</th>
            <th scope="col">Categoria</th>
            <th scope="col">Aggiunto il</th>
            <th scope="col">Cancella</th>
        </tr>
        </thead>

        <tbody>
        @foreach($dishes as $dish)
                <tr>
                    <th scope="row">{{$dish->id}}</th>
                    <td scope="row">{{$dish->nome}}</td>
                    <td scope="row">{{$dish->tot_calorie}}</td>
                    <td scope="row">{{$dish->tot_carboidrati}}</td>
                    <td scope="row">{{$dish->tot_carboidrati_di_cui_zuccheri}}</td>
                    <td scope="row">{{$dish->tot_grassi}}</td>
                    <td scope="row">{{$dish->tot_grassi_di_cui_saturi}}</td>
                    <td scope="row">{{$dish->tot_fibre}}</td>
                    <td scope="row">{{$dish->tot_proteine}}</td>
                    <td scope="row">{{$dish->tot_sali}}</td>
                    <td scope="row">{{$dish->category}}</td>
                    <td scope="row">{{$dish->created_at}}</td>
                    {{-- <td><a class="link-secondary" href="{{route('admin.dishes.edit')}}" title="Edit Post"><i class="fa-solid fa-pen"></i></a></td> --}}
                    <td>
                        <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$dish->nome}}">Elimna piatto</button>
                        </form> 
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>

    @else   
        <p>nessun piatto trovato</p>
    @endif
        
    
    @include('profile.partials.admin.modal-delete')
    
@endsection
