@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Mes Annonces</h1>
                <a href='{{route('user.create.annonce')}}'>Créer une annonce</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Prix</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($annonces as $annonce)
                        <tr>
                            <td> {{ $annonce->title }} </td>
                            <td> {{ $annonce->content }} </td>
                            <td> {{ $annonce->price }}€ </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('user.show.annonce', $annonce->id)}}">Éditer</a>
                            </td>
                            <td>
                                <form action="{{ route('user.delete.annonce', $annonce->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>               
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
