@extends('layouts.master')

@section('content')
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <p>{{Auth::guard('web')->user()->name}}</p>
@endsection
