<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'DomPixel' }}</title>
    <script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                <div class="alert-text"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
            </div>
        @endif


        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                <div class="alert-text"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>



