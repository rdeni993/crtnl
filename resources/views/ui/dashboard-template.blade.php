{{-- 

    Dashboard Template
    ================
    
--}}
@extends('ui.template')

@section('pageContent')
    <div class="container-fluid p-0 m-0 position-absolute w-100 h-100 h-100">
        
        {{-- Full Dashboard --}}
        <div class="row ab-h-100 p-0 m-0">

            {{-- Sidebar --}}
            <div class="col-lg-3 h-100 sidebar">
                @include('ui.parts.sidebar')
            </div>
            
            {{-- Dashboard Content --}}
            <div class="col-lg-9 ab-h-100 p-0">
                @include('ui.parts.navbar', [
                    'pageTitle' => $pageTitle
                ])

                @yield('dashboardContent')
            </div>
        
        </div>
    </div>
@endsection