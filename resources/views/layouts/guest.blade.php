<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class='mt-4 flex flex-col items-center'>
                <h1 class='font-bold text-3xl sm:text-4xl md:text-[40px] text-dark'>EAW Form App</h1>
                <h3 class='text-base mt-4'>Tech Stack: <span class='text-amber-500 font-bold'>PHP/Laravel, MYSQL, TailwindCSS</span> </h3>
                <p class='text-base'>Github: <a href='https://github.com/HugoSuarezJr/eaw-form' target='_blank' class='hover:underline'>eaw-form</a></p>
              </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            <div className='mt-2'>
                <p className='text-base dark:text-gray-400'>*Contact me for access @<a href='https://hugosuarez.com/#contact' target='_blank' className='hover:underline'>hugosuarez.com</a></p>
              </div>
        </div>
    </body>
</html>
