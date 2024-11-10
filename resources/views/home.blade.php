@extends("layouts.master")

@section("contenu")
    {{-- <livewire:counter/> --}}
    <div class=" text-center">
        
                <h6 class="display-3">Bienvenue, <strong>{{userFullName()}}</strong></h6>   
        
        <img src="{{asset('/images/pluit.jpg')}}" alt="Welcome Image">
    </div>
@endsection
{{-- @extends('layouts.app')

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
