@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Языки:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/lang/{{$lang->id}}/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="langName">Отображаемое название языка:</label>
                            <input type="text" class="form-control" id="langName" name="langName" aria-describedby="descriptionHelp" placeholder="Введите название языка " value="{{$lang->langName}}" >    
                        </div>
                        <div class="form-group">
                            <label for="langName">Файл для картинки:</label>
                            <input type="file" class="form-control" id="file" name="file" aria-describedby="descriptionHelp" placeholder="Выберите файл " >
                        </div>
                        <input type="submit" value="Обновить">
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
