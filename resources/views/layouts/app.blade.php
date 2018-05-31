<!DOCTYPE html>
<html lang="en">
<head>
   @include('partials.head')
</head>
<body>
    <div id="wrapper">
        
@include('partials.topbar')
@include('partials.sidebar')
        
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="note note-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="note note-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @yield('content')
   </div>
            </div>
        </section>
    </div>
</div>


@include('partials.javascripts')
    <!-- Scripts -->
</body>
</html>
