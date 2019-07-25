@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавление метки:</div>

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
                            <select name="organization_id" class="form-control">
                                <option value="{{$currentOrganisation->id}}" selected>{{$currentOrganisation->name}} </option>
                            @foreach ($organizations as $item)   
                                <option value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="country_id" class="form-control">
                            <option value="{{$currentCountry->id}}" selected>{{$currentCountry->name}} </option>
                            @foreach ($country as $item)   
                                <option value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                                <label for="universityDescription">Краткое описание университета</label>
                                <input type="text" class="form-control" id="universityDescription" name="universityDescription" aria-describedby="descriptionHelp" placeholder="Введите описание " value="{{$university->description}}">
                                
                        </div>

                        <script src="https://api-maps.yandex.com/2.1/?apikey=1f0064eb-6c20-41d7-87b9-c25967a30cd1&lang=ru_RU" type="text/javascript">
                        </script>

                        <script src="{{ asset('js/map/yandexMapForCreate.js')}}"></script>
                        <div id="map" style="width: 690px; height: 400px"></div>



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
                    <br>
                        <button class="button" onclick="location.href = '/university/{{$university->id}}/translation/create';" >добавить перевод</button>
                    <br>
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
                            <td style="width: 40%;">
                                {{ $item->text }}
                                {{-- {{!! $item->text !!}} --}}
                            </td>
                            <td>
                                <a href="/translation/{{$item->id}}/edit">редактировать</a>
                            </td>
                            <td>
                                <form action="/translation/{{$item->id}}/destroy" method="POST">
                                    @csrf
                                    <input type="submit" value = "удалить">
                                </form>
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
