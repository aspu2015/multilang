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

                    You are logged in!123
                    @foreach ($universities as $item)
                        
                        <br><hr><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
