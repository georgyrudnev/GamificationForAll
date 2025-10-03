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
    <div id="score" class="w-64">
        <img src="{{ asset("img/score.png")}}" alt="score symbol" class="h-20 w-16 ml-24">
        Score: @yield('Score')
    </div>
    <div id="points">
        <img src="{{ asset("img/spendingPoints.png")}}" alt="score symbol" class="h-20 w-16 ml-6">
        <div class="ml-6">
            Points: @yield('Points')
        </div>
    </div>

  <!--  <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden"> -->
        @if (Route::has('login'))
            <nav class="ml-auto gap-4 p-8">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="mr-80 px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Reporting
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
</header>

<body class="bg-orange-600">

{{$slot}}

</body>


