@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Языки:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    <button class="button" onclick="location.href = '/lang/create';" >добавить язык</button>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Картинка</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        @foreach ($langs as $item)
                            <tr>
                                <td>
                                    {{$item->langName}}
                                </td>
                                <td>
                                    <img class="lang-picture" src="{{$item->picturePath}}" >
                                </td>
                                <td>
                                <a href="/lang/{{$item->id}}/edit">редактировать</a>
                                </td>
                                <td>
                                    <form action="/lang/{{$item->id}}/destroy" method="POST">
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
