@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $panel }}</div>

                <div class="card-body">
                
                    @error('word')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>                                       
                     @enderror

                     @if (session('mssg'))
                        <div class="alert alert-success" role="alert">
                           
                                {{ session('mssg') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __('You are logged in!') }}
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/home">
                      @csrf

                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="word" placeholder="Enter a word to add into the database" aria-label="Recipient's username" aria-describedby="basic-addon2">
                         <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Add</button>
                         </div>
                      </div>


                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection