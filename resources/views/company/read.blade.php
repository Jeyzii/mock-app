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
                            <strong class="card-title">companies Table</strong>
                            <a href="{{ route('companies.create') }}" class="btn btn-primary pull-right">
                            Create
                            </a>
                        </div>
                        <div class="card-body">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                            <th class="th-sm">Logo</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">Web URL</th>
                            <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($companies as $company)
                            <tr class="text-center">
                                <td><img src="{{ asset($company->logo ? $company->logo: 'others/no_logo.png') }}" alt="Company Logo" width="100"></td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><a href="{{ $company->web_url }}" target="_blank">{{ $company->web_url }}</a></td>

                                <td>
                                    <a href="{{ url('companies/edit/'.$company->id) }}" class="btn btn-primary">Edit</a>
                    
                                    <form method="post" action="{{ url('companies/delete/'.$company->id) }}" style="display:inline">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" value="delete" class="btn btn-danger">
                                    </form>                                    
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                        </div>
                    </div>
                    
                </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>

@endsection
