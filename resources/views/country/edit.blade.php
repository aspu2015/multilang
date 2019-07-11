@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Страны:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/country/{{$country->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="langName">Отображаемое название страны:</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="descriptionHelp" placeholder="Введите название страны " value="{{$country->name}}" >    
                        </div>
                        <input type="submit" value="Обновить">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
