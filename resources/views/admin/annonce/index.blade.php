@extends('layouts.app')

@section('content')

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($annonces as $annonce)
            <tr>
                <th scope="row">{{ $annonce->id }}</th>
                <td>{{ $annonce->title }}</td>
                <td>{{ $annonce->content }}</td>
                <td>{{ $annonce->price }}</td>
                <td>
                    @if ($annonce->enabled == 1)
                        <p>Actif</p>
                    @else
                        <p>Desactivé</p>
                    @endif                
                </td>
                <td><a href="{{ route('admin.annonce.update', ['id'=>$annonce->id]) }}" class="btn btn-info">
                    @if ($annonce->enabled == 1)
                        Désactivé l'annonce
                    @else
                        Activer l'annonce
                    @endif  
                </a> </td>

            </tr>
            @endforeach

            </tbody>
        </table>
        {{-- {{ $vehicles->links() }} --}}

    </div>

@endsection
