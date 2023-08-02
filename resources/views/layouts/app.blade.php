<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- fontawesome -->
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

         {{--glider--}}
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        {{-- flexslider --}}
        <link rel="stylesheet" href="{{asset('vendor/FlexSlider/flexslider.css')}}">

        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{--glider--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.js" integrity="sha512-AZURF+lGBgrV0WM7dsCFwaQEltUV5964wxMv+TSzbb6G1/Poa9sFxaCed8l8CcFRTiP7FsCgCyOm/kf1LARyxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      
        {{-- flexslider --}}
        <script src="{{asset('vendor/FlexSlider/jquery.flexslider-min.js')}}"></script>
  
        </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            function dropdown(){
                return {
                    open:false,
        
                    show(){
                        if (this.open) {
                            this.open=false; // se cierra el menu
                            document.getElementByTagName('html')[0].style.overflow='auto'
                        } else {
                            this.open=true; // se abre el menu
                            document.getElementByTagName('html')[0].style.overflow='hidden'
                        }
                    },
                    close(){
                            this.open=false; // se cierra el menu
                            document.getElementByTagName('html')[0].style.overflow='auto'
                    }
                    
                }
            }
 
         </script>
         @stack('script');

        </body>
</html>
