<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name', 'MRF - System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />
        <style>
            ::-webkit-scrollbar {
                width: 10px;
                height: 10px;
            }

            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 2px grey;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                background: #4B5563;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: rgb(95, 95, 110);
            }

            [role="navigation"] > div:nth-child(2) {
                width: 100%;
            }
        </style>

        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    </head>
    
    <body class="antialiased">

        @if(Auth::user())
            @include('layouts.navigation')
        @endif

        @yield('content')

        <script>
            $(document).ready(function () {
                $('.numberOnly').on('input', function() {
                    var inputValue = $(this).val();
                    inputValue = inputValue.replace(/[^0-9]/g, '');
                    $(this).val(inputValue);
                });

                jQuery(document).on( "click", ".hideAlert", function(){
                    $(this).parent('div').addClass('hidden');
                });
            });
        </script>
    </body>
</html>
