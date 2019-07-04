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

                    
                    <form action="/translation/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="universityName">Название языка</label>
                            <select>
                                @foreach ($langs as $item)
                                    <option></option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="universityName" name="universityName" aria-describedby="nameHelp" placeholder="Введите название " >
                            
                        </div>
                        <div class="form-group">
                                <label for="universityDescription">Краткое описание университета</label>
                                <input type="text" class="form-control" id="universityDescription" name="universityDescription" aria-describedby="descriptionHelp" placeholder="Введите описание " >
                                
                        </div>
                        <div class="form-group">
                                <label for="universityLatitude">Широта (первое число координат)</label>
                                <input type="text" class="form-control" id="universityLatitude" name="universityLatitude" aria-describedby="latitudeHelp" placeholder="Введите широту " >
                                
                        </div>
                        <div class="form-group">
                                <label for="universityLongitude">Долгота (второе число координат)</label>
                                <input type="text" class="form-control" id="universityLongitude" name="universityLongitude" aria-describedby="longitudeHelp" placeholder="Введите долготу " >
                        </div>
                        <input type="submit" value="Создать">
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
