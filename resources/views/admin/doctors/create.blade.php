@extends('layouts.master', ['sidebar'=>'doctor-create'])

@section('content')
<div class="page-header">
    <h3 class="page-title"> Doctors <code>/ add patient</code></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.doctor.index')}}" class="nav-link btn btn-inverse-info create-new-button">/ index</a></li>
        </ol>
    </nav>
</div>
<div class="row">
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <form class="form-sample" method="post" action="{{route('admin.doctor.store')}}">
                @csrf
                <p class="card-description"> Personal info </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">{{ __('Full Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="name" id="name"/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">{{ __('Email')}}</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description"> Security info </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">{{ __('Password')}}</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="password"/>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-3 col-form-label">{{ __('Confirm password')}}</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                                <input class="form-control" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option>Category1</option>
                                    <option>Category2</option>
                                    <option>Category3</option>
                                    <option>Category4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Membership</label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> Free </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description"> Address </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 1</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 2</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option>America</option>
                                    <option>Italy</option>
                                    <option>Russia</option>
                                    <option>Britain</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-6">
                    <button type="submit" class="btn btn-inverse-success btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Create </button>
                    <button type="button" class="btn btn-inverse-warning btn-icon-text">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Create and add another</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class="card-footer">
            <button type="submit" class="btn btn-inverse-success btn-icon-text">
                <i class="mdi mdi-file-check btn-icon-prepend"></i> Create </button>
            <button type="button" class="btn btn-inverse-warning btn-icon-text">
                <i class="mdi mdi-file-check btn-icon-prepend"></i> Create and add another</button>
        </div> -->
    </div>
</div>
</div>
@endsection