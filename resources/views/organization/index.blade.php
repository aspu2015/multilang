@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Организации</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <button class="button" onclick="location.href = '/organization/create';" >добавить организацию</button>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        @foreach ($countries as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                <a href="/organization/{{$item->id}}/edit">редактировать</a>
                                </td>
                                <td>
                                    <form action="/organization/{{$item->id}}/destroy" method="POST">
                                        @csrf
                                        <input type="submit" value = "удалить">
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    </table>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection