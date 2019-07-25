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

                    
                    <form action="/translation/{{$translation->id}}/update" method="POST" onsubmit="return postForm()">
                        @csrf
                        <div class="form-group">
                            <label for="language">Название языка:</label>
                            <select class="form-control" id="language" name="language_id">
                                <option selected value="{{$selectedLang->id}}">{{$selectedLang->langName}}</option>
                                @foreach ($avalibleLangs as $item)
                                    <option value="{{$item->id}}">{{$item->langName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="universityName">Название университета:</label>
                                <input type="text" class="form-control" id="universityName" name="universityName" aria-describedby="descriptionHelp" placeholder="Введите название университета " value="{{$translation->name}}">
                        </div>
                        <div class="form-group">
                                <label for="universityCountry">Страна:</label>
                                <input type="text" class="form-control" id="universityCountry" name="universityCountry" aria-describedby="descriptionHelp" placeholder="Страна " value="{{$translation->country}}">                               
                        </div>
                        <div class="form-group">
                                <label for="universityOrganization">Тип организации:</label>
                                <input type="text" class="form-control" id="universityOrganization" name="universityOrganization" aria-describedby="descriptionHelp" placeholder="Тип организации " value="{{$translation->organization}}">        
                        </div>
                        <div class="form-group">
                                <label for="universityShortDescription">Краткое описание (таблица университетов):</label>
                                <input type="text" class="form-control" id="universityShortDescription" name="universityShortDescription" aria-describedby="descriptionHelp" placeholder="Краткое описание " value="{{$translation->shortDescription}}"> 
                        </div>
                        <div class="form-group">
                                <label for="universityDescription">Описание Университета:</label>
                                <textarea name="universityDescription" id="universityDescription" >{{$translation->text}}</textarea>
                        </div>  
                        <input type="submit" value="Обновить">
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/summernote/init.js')}}" defer></script>
@endsection
