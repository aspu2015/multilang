<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Работа с изображениями в Laravel</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style type="text/css"> 
        table, th, td{ 
            border: 1px solid; 
            padding: 5px; 
        } 
    </style>
</head>
<body>
    <div class="container">
        <form action="/images/create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}          
                <input id="file" type="file" name="file">
                <input type="submit" class="btn btn-default">Добавить</button>
        </form>
    </div>
</body>
</html>
