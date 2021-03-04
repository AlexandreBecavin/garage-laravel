@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-lg-2-12">
               <div class="mb-5">
                    <form method="POST" action="{{ route('annonce.search') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Recherche</label>
                            <input  class="form-control" type="text" name="search">
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>
               </div>
           </div>
       </div>
       <div class="row">
           @foreach($announcements as $announcement)
               <div class="col-lg-3">
                   <div class="card mb-5" style="width: 18rem;">
                       <img class="card-img-top" src="https://picsum.photos/seed/picsum/300/200" alt="Card image cap">
                       <div class="card-body">
                            <p><span>{{ $announcement->title }}</span></p>
                            <p>{{ $announcement->content }}</p>
                            <p>{{ $announcement->price }} €</p>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
@endsection
