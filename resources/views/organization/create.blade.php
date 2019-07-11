@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Организации:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/organization/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                                <label for="name">Отображаемый тип органзизации:</label>
                                <input type="text" class="form-control" id="OrganizationName" name="OrganizationName" aria-describedby="descriptionHelp" placeholder="Введите тип организации" >
                                
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