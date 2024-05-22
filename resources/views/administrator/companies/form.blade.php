@extends('administrator.administrator_master')

@if (isset($company))
    @php($title = 'Edit Company') 
@else 
    @php($title = 'Add New Company')
@endif

@section('title', $title)
@section('content')
<div class="pagename">
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('administrator.dashboard') }}"><i class="bx bx-home"></i> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Manage Company</a></li>
        <li class="breadcrumb-item active">{{ isset($company) ? 'Edit Company' : 'Add New Company' }}</li>
    </ol>
    </nav>
</div><!-- End Page name -->

<div class="card flex justify-between">
    <div class="card-body">
        <br>
        <h4>{{ isset($company) ? 'Edit Company' : 'Add New Company' }}</h4>
    </div>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store') }}" enctype="multipart/form-data">
                @csrf
                @isset($company)
                    @method('put')
                @endisset      
                
                <br>
                <div>
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $company->name ?? old('name') }}" required autofocus>
                </div>
                <br>
                <div>
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $company->email ?? old('email') }}">
                </div>
                <br>
                <div>
                    <label for="logo" class="form-label">Logo:</label>
                    <br>
                    <label class="block mt-2">
                        <input type="file" id="logo" name="logo" class="btn rounded-pill block w-full text-sm text-slate-500"/>
                    </label>
                    <div class="shrink-0 my-2">
                        <img style="width:600px" id="logo_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($company) ? Storage::url($company->logo) : '' }}" alt="Logo preview" />
                    </div>
                </div>

                <div class="flex text-center" style="padding-top: 10px">
                    <button class="btn btn-success col-md-4 col-lg-2" style="margin-right: 5px">{{ __('Save') }}</button>
                    
                    <a href="{{ route('companies.index') }}" class="btn btn-warning col-md-4 col-lg-2">Back</a>
                 
                </div>
            </form>
        </div>
    </div>
</section>


<script>
    // create onchange event listener for logo input
    document.getElementById('logo').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            // if there is an image, create a preview in logo_preview
            document.getElementById('logo_preview').src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
