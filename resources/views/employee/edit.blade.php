@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Update</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Articles</h3>
                        </div>

                        <hr>
                        @if(count($errors)>0)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="first_name" class="control-label mb-1">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" value={{$employee->first_name}}>
                                </div>
                                <div class="form-group">
                                        <label for="last_name" class="control-label mb-1">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" value={{$employee->last_name}}>
                                </div>
                                <div class="form-group">
                                    <label for="company" class="control-label mb-1">Company</label>
                                    <select name="company" id="company" class="form-control">
                                        <option value="">Select a company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                                {{ $company->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value={{$employee->email}}>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label mb-1">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value={{$employee->phone}}>
                                </div>
                                <div>
                                    <button id="submit-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                        <span id="submit-button-amount">Submit</span>
                                    </button>
                                </div>
                            </form>
                            
                    </div>
                </div>
            </div>
        </div> <!-- .card -->
    </div>
</div>
@endsection