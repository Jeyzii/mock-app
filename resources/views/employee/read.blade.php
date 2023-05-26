@extends('layouts.app')

@section('content')

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    
                    @foreach (['success', 'error'] as $status)
                        @if (session($status))
                            <div class="alert alert-{{ $status }}">
                                {{ session($status) }}
                            </div>
                        @endif
                    @endforeach

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Employees Table</strong>
                            <a href="{{ route('employees.create') }}" class="btn btn-primary pull-right">
                            Create
                            </a>
                        </div>
                        <div class="card-body">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                            <th class="th-sm">First name</th>
                            <th class="th-sm">Last name</th>
                            <th class="th-sm">company</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">Phone</th>
                            <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr class="text-center">
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->company?->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <a href="{{ url('employees/edit/'.$employee->id) }}" class="btn btn-primary">Edit</a>
                    
                                    <form method="post" action="{{ url('employees/delete/'.$employee->id) }}" style="display:inline">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" value="delete" class="btn btn-danger">
                                    </form>                                    
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                        </div>
                    </div>
                    
                </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>

@endsection
