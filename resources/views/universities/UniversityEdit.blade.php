@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Университеты:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form action="/university/{{$university->id}}/update" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="universityName">Название университета</label>
                            <input type="text" class="form-control" id="universityName" name="universityName" aria-describedby="nameHelp" placeholder="Введите название " value="{{$university->name}}">
                            
                        </div>
                        <div class="form-group">
                                <label for="universityDescription">Краткое описание университета</label>
                                <input type="text" class="form-control" id="universityDescription" name="universityDescription" aria-describedby="descriptionHelp" placeholder="Введите описание " value="{{$university->description}}">
                                
                        </div>
                        <div class="form-group">
                                <label for="universityLatitude">Широта (первое число координат)</label>
                                <input type="text" class="form-control" id="universityLatitude" name="universityLatitude" aria-describedby="latitudeHelp" placeholder="Введите широту " value="{{$university->geolocationX}}">
                                
                        </div>
                        <div class="form-group">
                                <label for="universityLongitude">Долгота (второе число координат)</label>
                                <input type="text" class="form-control" id="universityLongitude" name="universityLongitude" aria-describedby="longitudeHelp" placeholder="Введите долготу " value="{{$university->geolocationY}}">
                        </div>
                        <input type="submit" value="Обновить">
                    </form>
                    <hr>
                    Доступные переводы:
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Краткое описание</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        @foreach ($university->translation as $item)
                        <tr>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->text}}
                            </td>
                            <td>
                                <a href="/translation/edit?id={{$item->id}}">редактировать</a>
                            </td>
                            <td>
                                <a href="/translation/delete?id={{$item->id}}">редактировать</a>
                            </td>
                        </tr>
                        @endforeach
                        <hr>
                    </table>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
