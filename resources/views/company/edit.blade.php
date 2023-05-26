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

                            <form action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Company Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value={{ $company->name }}>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" value={{ $company->email }}>
                                </div>
                                <div class="form-group">
                                    <label for="web_url" class="control-label mb-1">Company Werbsite URL</label>
                                    <input type="text" name="web_url" class="form-control" id="web_url" value={{ $company->web_url }}>
                                </div>
                                <div class="form-group">
                                    <label for="logo" class="control-label mb-1">Company Logo</label><br>
                                    <img src="{{ asset($company->logo ? $company->logo: 'others/no_logo.png') }}" alt="Company Logo" width="100">
                                    <input type="file" name="logo" class="form-control" id="logo">
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