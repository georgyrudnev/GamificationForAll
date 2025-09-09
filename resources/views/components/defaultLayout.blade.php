<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        Bravour
    </title>
</head>
<header class="bg-white flex flex-row basis-128 h-26 text-center items-center p-6">
    <div class="w-32">
        <img src="{{ asset('img/bravourHorse.jpg') }}" alt="site logo">
    </div>

    <h1 class="w-96 text-5xl font-bold"> Bravour
    </h1>
    <div class="w-64">
        <img src="{{ asset("img/score.png")}}" alt="score symbol" class="h-20 w-16 ml-24">
        Score: @yield('Score')
    </div>
    <div>
        <img src="{{ asset("img/spendingPoints.png")}}" alt="score symbol" class="h-20 w-16 ml-6">
        <div class="ml-6">
            Points: @yield('Points')
        </div>
    </div>
</header>

<body class="bg-orange-600">

{{$slot}}

</body>


<footer class="bg-yellow-500 grid justify-items-center">
    This is the footer
    <div class="bg-blue-200">
        this is div inside footer
         </div>
</footer>
