<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/coursePage.css') }}" >
    <title>Document</title>
</head>
<body>
    <h1>Master</h1>

    @section('CoursePage')
        <h2>Master Course</h2>
    @endsection

    <div class="coursePage" >
        @yield('CoursePage')
    </div>
    
</body>
</html>