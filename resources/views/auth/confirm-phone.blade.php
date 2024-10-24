@extends('layouts.guest')
@section('content')
    <form method="POST" action="{{ route('confirm.phone') }}">
        @csrf

        <div>
            <input type="hidden" name="phone" >
            <x-input-label for="id-confirm" :value="__('Mã xác nhận')" />
            <x-text-input id="id-confirm" class="block mt-1 w-full" type="text" name="id-confirm"  required
                autofocus autocomplete="id-confirm" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Xác nhận') }}
            </x-primary-button>
        </div>
    </form>
@endsection
