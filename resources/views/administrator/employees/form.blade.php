@extends('administrator.administrator_master')

@if (isset($employee))
    @php($title = 'Edit Employee')
@else 
    @php($title = 'Add New Employee')
@endif

@section('title', $title)
@section('content')
<div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}"><i class="bx bx-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Manage Employee</a></li>
        <li class="breadcrumb-item active">{{ isset($company) ? 'Edit Employee' : 'Add New Employee' }}</li>
    </ol>
    </nav>
</div>

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($employee) ? 'Edit Employee' : 'Add New Employee' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" enctype="multipart/form-data">
                @csrf
                @isset($employee)
                    @method('put')
                @endisset      
                
                <br>
                <div>
                    <label for="firstName" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $employee->firstName ?? old('firstName') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="lastName" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $employee->lastName ?? old('lastName') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email ?? old('email') }}">
                </div>
                <br>
                <div>
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $employee->phone ?? old('phone') }}">
                </div>
                <br>
                <br>
                    <label for="company class="form-label">Company:</label>
                    <select class="form-select" id="company" name="company" aria-label="Default select example">
                        @foreach ($companies as $company)
                            <option value="{{ $company->name }}" {{ (old('company') == $company->name || ($employee->company ?? null) == $company->name) ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                <br>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('employees.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                 
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
