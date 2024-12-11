@extends('layouts.app')
@section('content')
    @if (Auth::check())
        @if (Auth::user()->role->role === 'Admin')
            @include('layouts.index-tiket.admin')
        @elseif (Auth::user()->role->role === 'Teknisi')
            @include('layouts.index-tiket.teknisi')
        @elseif (Auth::user()->role->role === 'Karyawan')
            @include('layouts.index-tiket.karyawan')
        @endif
    @endif
@endsection