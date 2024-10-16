@extends('layout.app')
@section('content')
    <div class="content col-span-7">
        <main>
            <header>
                <div class="direction">
                    <a id="before" href="" class="btn-black"><</a>
                    <a id="after" href="{{ route($next_direction ?? 'spotifys.index') }}" class="btn-black">></a>
                </div>
                <div class="Account">
                    <a href="" class="btn-white px-[30px] py-[10px] hover:px-[31px]">Login</a>
                    {{--
                    <button id="register" class="btn-gray px-[30px] py-[10px]">Register</button>
                    <button id="login" class="btn-white px-[30px] py-[10px] hover:px-[31px]">Login</button>
                    --}}
                </div>
            </header>
            <div class="submain">
                @yield('show-content')
            </div>
            <div x-data="{ isOpen: {{ session()->has('modal_message') ? 'true' : 'false' }},
                message: '{{ session()->get('modal_message') }}',
                modalType: '{{ session()->get('modal_type') }}' }"
                x-show="isOpen"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-init="setTimeout(() => { $el.style.display = 'none' }, 5000)"
                class="fixed top-0 left-0 w-full flex items-center justify-center">
                <div class="modal"
                    :class="{
                    'border-green-500 text-green-500': modalType === 'success',
                    'border-red-500 text-red-500': modalType === 'delete',
                    'border-fuchsia-500 text-fuchsia-500': modalType === 'update',
                    }">
                    <p x-text="message"></p>
                </div>
            </div>
        </main>
    </div>
@endsection