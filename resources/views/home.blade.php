@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $panel }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __('You are logged in!') }}
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="input-group mb-3">
                    
                    <form method="POST" autocomplete="off" action="/home">
                      @csrf
                      <div class="autocomplete" style="width:300px;">
                        <input type="text" id="myInput"class="form-control" placeholder="text" aria-label="Recipient's username" aria-describedby="basic-addon2">
 
                         </div>
                         </div>
                         </form>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script src="{{ asset('js/autoComplete.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@stop
