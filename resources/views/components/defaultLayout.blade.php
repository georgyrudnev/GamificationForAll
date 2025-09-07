<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        Bravour
    </title>
</head>
<header class="bg-pink-500 flex-row align-content items-center justify-center ">
    <div>
        Header start
    </div>
    <div class="align-items"> What is the difference between header and head in html? Where do I put my cdn scripts?
    </div>
    <h1 class="bg-blue-500"> Bravour
    </h1>
    <div>
        Score: @yield('Score')
        Points: @yield('Points')
    </div>
    <div>
        Header end
    </div>
</header>

<body>

{{$slot}}

</body>


<footer class="bg-yellow-500 grid justify-items-center">
    This is the footer
    <div class="bg-blue-200">
        this is div inside footer
         </div>
</footer>
