@extends('layouts.master')

@section('content')
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <p>{{Auth::guard('patient')->user()->name}}</p>
@endsection
