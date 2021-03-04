@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <a class='px-5' href='{{route('user.annonce')}}'><p>< Revenir a la liste</p></a>
            <div class="col-lg-12">
                <h1 class='mt-5'>Créer votre annonce</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{route('user.store.annonce')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">titre</label>
                        <input  class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label for="">Prix</label>
                        <input  class="form-control" type="number" name="price">
                    </div>
                    <div class="form-group">
                        <label for="">Contenu</label>
                        <textarea  class="form-control" name="content"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Créer votre annonce</button>
                </form>
            </div>
        </div>
    </div>
@endsection
