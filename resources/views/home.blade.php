@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="col-md-3">
                        <img src="{{ Storage::url(Auth::user()->image) }}" alt="80x80" class="rounded-circle z-depth-2" alt="{{ Auth::user()->name }}" data-holder-rendered="true" style="width:120px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
