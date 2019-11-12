@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Actualizar imagen</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('image.update') }}" aria-label="Actualizar imagen" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="image_id" value="{{ $image->id }}">

                            <div class="form-group row">

                                <label for="image_path"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                                <div class="col-md-6">

                                    @if($image->image_path)
                                        <div class="container-avatar">
                                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" class="avatar"/>
                                        </div>
                                    @endif

                                    <input id="image_path" type="file"
                                           class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}"
                                           name="image_path" autofocus>

                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  name="description" value="{{ old('description') }}" required autofocus>{{ $image->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar imagen
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection