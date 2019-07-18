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

                    <br>

                    <button class="button" onclick="location.href = '/university/create';" >добавить университет</button>
                    <br><br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Краткое описание</th>
                                <th scope="col">Количество переводов</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        
                        @foreach ($universities as $item)
                        dump({{$universities}})
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->description}}
                                </td>
                                <td>
                                    {{$item->organization_id}}
                                </td>
                                <td>
                                <a href="/university/{{$item->id}}/edit">редактировать</a>
                                </td>
                                <td>
                                    <form action="/university/{{$item->id}}/destroy" method="POST">
                                        @csrf
                                        <input type="submit" value = "удалить">
                                    </form>
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