
    <!DOCTYPE html>
    <html lang="en">
    @include('admin.partials.head')
    
    
    <body class="sb-nav-fixed">
        {{-- includem bara de sus cu search --}}
        @include('admin.partials.topbar')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    @include('admin.partials.sidenav')
                </nav>
            </div>

           <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>
           </div>
        </div>

       @include('admin.partials.scripts')
       
    </body>
</html>
