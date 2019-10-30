@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <h1>Mis imágenes favoritas</h1>
            <hr>
            @include('includes.message')

            @foreach($likes as $like)
                @include('includes.imagen',['image'=>$like->image])
            @endforeach

            <!-- PAGINATION -->
                <div class="clearfix">
                    {{ $likes->links() }}
                </div>
            </div>


        </div>
    </div>
@endsection