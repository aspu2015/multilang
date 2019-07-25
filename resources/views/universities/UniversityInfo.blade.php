@extends('layouts.translation')

@section('content')
<div class="container">
    <script src="{{ asset('js/langs/translations.js')}}"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    
                </div>

                <div id="textBody" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{!! session('status') !!}}
                        </div>
                    @endif
                
                </div>
                
                
            </div>
            <div class="card">
                <div id="textBody" class="card-body">
                    <div id="country" class="card-body"></div>
                </div>
            </div>
            <div class="card">
                <div id="textBody" class="card-body">
                    <div id="organization" class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
