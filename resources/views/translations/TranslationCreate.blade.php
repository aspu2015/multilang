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

                    
                    <form action="/university/{{$university_id}}/translation/store" method="POST" onsubmit="return postForm()">
                        @csrf
                        <div class="form-group">
                            <label for="language">Название языка:</label>
                            <select class="form-control" id="language" name="language_id">
                                @foreach ($langs as $item)
                                    <option value="{{$item->id}}">{{$item->langName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="universityName">Название университета:</label>
                                <input type="text" class="form-control" id="universityName" name="universityName" aria-describedby="descriptionHelp" placeholder="Введите название университета " >
                                
                        </div>
                        <div class="form-group">
                                <label for="universityCountry">Страна:</label>
                                <input type="text" class="form-control" id="universityCountry" name="universityCountry" aria-describedby="descriptionHelp" placeholder="Страна " >
                                
                        </div>
                        <div class="form-group">
                                <label for="universityOrganization">Тип организации:</label>
                                <input type="text" class="form-control" id="universityOrganization" name="universityOrganization" aria-describedby="descriptionHelp" placeholder="Тип организации " >
                                
                        </div>
                        <div class="form-group">
                                <label for="universityShortDescription">Краткое описание (таблица университетов):</label>
                                <input type="text" class="form-control" id="universityShortDescription" name="universityShortDescription" aria-describedby="descriptionHelp" placeholder="Краткое описание " >
                                
                        </div>
                        <div class="form-group">
                                <label for="universityDescription">Описание Университета:</label>
                                <textarea name="universityDescription" id="universityDescription" ></textarea>
                                
                        </div>  
                        <input type="submit" value="Создать">
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/summernote/init.js')}}" defer></script>

@endsection
