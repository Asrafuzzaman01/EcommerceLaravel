@extends('user.layouts.user_template')

@section('user_page-title')




@endsection

@section('content')
<h1>welcome:{{ Auth::user()->name }}</h1>


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <ul class="">
                    <li> <a href="{{ route('userprofile') }}">Dashboard</a></li>
                    <li> <a href="{{ route('pendingorder') }}"> Pending Order</a></li>
                    <li><a href="{{ route('history') }}">History</a></li>
                    <li><a href="">Logout</a></li>
                </ul>

            </div>

        </div>

        <div class="col-lg-8">
            <div class="box_main">
                @yield('userprofile_content')

            </div>

        </div>



    </div>


</div>

@endsection
