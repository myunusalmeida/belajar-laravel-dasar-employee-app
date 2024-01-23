<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee App</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="max-w-7xl mx-auto">
        <div class="navbar bg-base-100">
            <div class="flex-1">
                <a class="btn btn-ghost text-2xl font-bold">Employee App</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1">
                    <li><a href="{{ url('position') }}" class="text-base">Position</a></li>
                    <li><a href="{{ route('employees.index') }}" class="text-base">Employee</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="max-w-6xl py-10 mx-auto">
        @yield('content')
    </section>
</body>

</html>
