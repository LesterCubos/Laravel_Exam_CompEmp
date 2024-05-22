<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-form col-6">
                <div class="col-6" style="margin-bottom: 10px; float:right">
                  <input type="text" class="form-control" placeholder="Search Employee Name..." wire:model.lazy="searchEmployee">
                  <button><i class="bi bi-search"></i></button>
                </div>
            </div><!-- End search formn-->
            <table class="table table-bordered table-hover border-primary">
                <thead class="table-display text-center">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
        
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->firstName }}</td>
                            <td>{{ $employee->lastName }}</td>
                            <td>{{ $employee->company }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <form method="post" action="{{ route('employees.destroy', $employee->id) }}" class="d-grid gap-2">
            
                                    {{-- <a class="btn btn-info" href="{{ route('employees.show', $employee->id) }}">Show</a> --}}
                                    <a class="btn" id="icon_edit" href="{{ route('employees.edit', $employee->id) }}"><i class="ri-edit-box-fill"></i></a>
                                    @csrf
                                    @method('DELETE')
            
                                    <button id="icon_delete" type="submit" class="btn"><i class="ri-delete-bin-5-fill"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; font-size: 24px">
                                <div class="py-5" style="">No Employee Found...</div>
                            </td>  
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
</div>
