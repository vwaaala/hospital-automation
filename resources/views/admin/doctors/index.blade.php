@extends('layouts.master', ['sidebar'=>'doctor-index'])

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Doctors <code>/ index</code> </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.doctor.create')}}" class="nav-link btn btn-inverse-info create-new-button">+ Add Doctor</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-contextual">
                            <thead>
                            <tr>
                                <th> </th>
                                <th> Name</th>
                                <th> Progress</th>
                                <th> Amount</th>
                                <th> Joined</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                <td class="py-1">
{{--                                    <img src="../../assets/images/faces-clipart/pic-1.png" alt="image"/>--}}
                                </td>
                                <td> {{$doctor->name}}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> $ 77.99</td>
                                <td> {{$doctor->created_at}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="card-footer">
                    {{ $doctors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection