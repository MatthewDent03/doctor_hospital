<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('doctors.index') }}">All Doctors</a></li>
                <!-- <li><a href="{{ route('doctors.create') }}">Add a new Doctor</a></li> -->
              
               
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>