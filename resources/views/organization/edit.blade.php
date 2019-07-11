@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Типы организаций:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/organization/{{$organization->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="OrganizationName">Отображаемый тип организации:</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="descriptionHelp" placeholder="Введите тип организации " value="{{$organization->name}}" >    
                        </div>
                        <input type="submit" value="Обновить">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection