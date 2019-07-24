<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/libs/jquery.js')}}"></script>
    <script src="{{ asset('js/libs/bootstrap.js')}}"></script>
    <script src="{{ asset('js/libs/summernote.js')}}"></script>


    <!-- <script src="{{ asset('js/allUniversityTable/filter.js')}}"></script> -->
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/dd.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/skin2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flags.css') }}" />
    <script src="{{ asset('js/langs/jquery.dd.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/langs/jquery.dd.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/allUniversityTable/tableTranslation.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layoutCss/layout.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap-multiselect-master/docs/js/prettify.min.js')}}"></script>
    <script src="{{ asset('bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js')}}"></script>
    <link href="{{ asset('bootstrap-multiselect-master/docs/css/prettify.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap-multiselect-master/docs/css/bootstrap-3.3.2.min.css')}}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Главная
                </a>
                
                <div class="choose-lang-div">
                    <p class="chooseLang" >Choose your Language: </p>
                    <select id="webmenu"  name = "webmenu">
                    
                    </select>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>

        <main class="py-4">
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

                    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Краткое описание</th>
                <th scope="col">Тип организации
                    <!-- <div id="org">
                        <select id="organizationChoice" multiple="multiple">
                        
                        </select>
                    </div> -->
                </th>
                <th scope="col">Страна
                    <!-- <div id="countrych">
                        <select id="countryChoice" multiple="multiple">
                        
                        </select>
                    </div> -->
                </th>
            </tr>
        </thead>
                </table>

                <!-- <script type="text/javascript">
                $(document).ready(function() {
                    $('#organizationChoice').multiselect({buttonWidth: '150px'});
                    $('#countryChoice').multiselect({buttonWidth: '150px'});                    
                });
                </script> -->
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
</body>
</html>