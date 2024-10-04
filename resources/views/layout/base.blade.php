@extends('layout.app')
@section('content')
    <div class="content col-span-7">
        <main>
            <header>
                <div class="direction">
                    <button id="before" class="btn-black"><</button>
                    <button id="after" class="btn-black">></button>
                </div>
                <div class="Account">
                    <button id="register" class="btn-gray px-[30px] py-[10px]">Register</button>
                    <button id="login" class="btn-white px-[30px] py-[10px] hover:px-[31px]">Login</button>
                </div>
            </header>
            <div class="submain">
                @yield('show-content')
            </div>
        </main>
    </div>
@endsection