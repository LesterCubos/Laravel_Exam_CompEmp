<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-form col-6">
                <div class="col-6" style="margin-bottom: 10px; float:right">
                  <input type="text" class="form-control" placeholder="Search Company Name..." wire:model.lazy="searchCompany">
                  <button><i class="bi bi-search"></i></button>
                </div>
            </div><!-- End search formn-->
            <table class="table table-bordered table-hover border-primary">
                <thead class="table-display text-center">
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
        
                <tbody>
                    @forelse ($companies as $company)
                        <tr>
                            <td>
                                <img style="width:100px; display: block; margin: 0 auto;" src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}" srcset="">
                            </td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                <form method="post" action="{{ route('companies.destroy', $company->id) }}" class="d-grid gap-2">
            
                                    {{-- <a class="btn btn-info" href="{{ route('companys.show', $company->id) }}">Show</a> --}}
                                    <a class="btn" id="icon_edit" href="{{ route('companies.edit', $company->id) }}"><i class="ri-edit-box-fill"></i></a>
                                    @csrf
                                    @method('DELETE')
            
                                    <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Company Found...</div>
                            </td>  
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $companies->links() !!}
            </div>
        </div>
    </div>
</div>
