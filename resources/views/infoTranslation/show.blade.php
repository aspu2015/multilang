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
                    
                    
                    <!-- <button class="button" onclick="location.href = '/info_translation/create';" >добавить организацию</button>
                    <br><br> -->
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Редактировать</th>
                            </tr>
                        </thead>
                        @foreach ($sections as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                <a href="/info_translation/show/{{ $item->id }}">редактировать</a>
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