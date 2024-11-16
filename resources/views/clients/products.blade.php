@extends('layouts.main')
@section('content')
    <livewire:search-product />
@endsection
@push('scripts')
    <script>
        @if (session('success'))
            openToast('success', '{{ session('success') }}', 5000);
        @endif

        @if (session('error'))
            openToast('error', '{{ session('error') }}', 5000);
        @endif
    </script>
@endpush
