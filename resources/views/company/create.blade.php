@extends('layouts.app')

@section('content')
<script src="{{ asset('back/assets/js/lib/chosen/chosen.jquery.min.js') }}">
    <script src="{{ asset('back/assets/js/lib/chosen/chosen.jquery.js') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/css/lib/chosen/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/css/lib/chosen/chosen.css') }}">
    
    <script>
        jQuery (document).ready(function(){
            jQuery (".myselect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Create</strong>
            </div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Company</h3>
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
                        
                        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Company Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="web_url" class="control-label mb-1">Company Werbsite URL</label>
                                <input type="text" name="web_url" class="form-control" id="web_url">
                            </div>
                            <div class="form-group">
                                <label for="logo" class="control-label mb-1">Company Logo</label>
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