<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="mock, mock-app, mock application, technical exam">
    <meta name="description" content="mock application mini-crm">
    <meta name="author" content="Juan Carlo Bartolome, JC Bartolome">
    <title>Mock app</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="apple-touch-icon" href="{{asset('back/apple-icon.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('back/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('back/assets/scss/style.css')}}">
    <link href="{{asset('back/assets/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <script src="https://cdn.ckeditor.com/4.20.0/standard-all/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('back/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
</head>