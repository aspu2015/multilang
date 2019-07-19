<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ASU</title>

        <!-- js -->
        <script src="{{ asset('js/libs/jquery.js')}}"></script>
        <script src="{{ asset('js/libs/bootstrap.js')}}"></script>

        <script src="{{ asset('js/allUniversityTable/filter.js')}}"></script>


        <!-- 16.07.2019 multiselect (checkbox) -->
        <script src="{{ asset('bootstrap-multiselect-master/docs/js/prettify.min.js')}}"></script>
        <script src="{{ asset('bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js')}}"></script>
        <link href="{{ asset('bootstrap-multiselect-master/docs/css/prettify.min.css')}}" rel="stylesheet">
        <link href="{{ asset('bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css')}}" rel="stylesheet">
        <link href="{{ asset('bootstrap-multiselect-master/docs/css/bootstrap-3.3.2.min.css')}}" rel="stylesheet">
        <!-- 16.07.2019 multiselect (checkbox) -->


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Университеты:</div>
                    <div class="card-body">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Краткое описание</th>
                <th scope="col">Тип организации
                    <div id="org">
                        <select id="organizationChoice" multiple="multiple">
                        @foreach ($organizations as $item)   
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </th>
                <th scope="col">Страна
                    <div id="countrych">
                        <select id="countryChoice" multiple="multiple">
                        @foreach ($countries as $item)   
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </th>
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

                <script type="text/javascript">
                $(document).ready(function() {
                    $('#organizationChoice').multiselect();
                    $('#countryChoice').multiselect();
                });
                </script>

                </div>
            </div>
        </div>
    </div>
</div>
      

    </body>
</html>