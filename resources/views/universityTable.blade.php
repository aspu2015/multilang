@extends('layouts.app')

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

                    <br>

                    <br><br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Краткое описание</th>
                                <th scope="col">Тип организации
                                    <div id="org">
                                        <select id="organizationChoice" multiple="multiple">
                                        @foreach ($universities as $item)   
                                            <option value="{{$item->id}}"> {{$item->orgname}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </th>
                                <th scope="col">Страна</th>
                            </tr>
                        </thead>
                        
                        @foreach ($universities as $item)

                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->description}}
                                </td>
                                <td>
                                    {{$item->orgname}}
                                </td>
                                <td>
                                    {{$item->countryname}}
                                </td>
                            </tr>
                        @endforeach 
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection