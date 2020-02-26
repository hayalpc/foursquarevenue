<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="public/css/app.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">

    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/lodash/lodash.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>
    <script src="bower_components/angular-local-storage/dist/angular-local-storage.min.js"></script>
    <script src="bower_components/restangular/dist/restangular.min.js"></script>


    <script src="public/js/mainApp.js"></script>
    <script src="public/js/mainRoutes.js"></script>
    <script src="public/js/services/ajaxService.js"></script>
</head>

<body>
    @yield('content')
</body>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="public/js/lib.js"></script>

</html>