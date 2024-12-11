@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <!-- Dashboard Admin -->
        @if (Auth::user()->role->role === 'Admin')
            @include('layouts.dashboard.admin')
            
        <!-- Dashboard Teknisi -->
        @elseif (Auth::user()->role->role === 'Teknisi')
            @include('layouts.dashboard.teknisi')
        
        <!-- Dashboard Karyawan -->
        @elseif (Auth::user()->role->role === 'Karyawan')
            @include('layouts.dashboard.karyawan')
        @endif  
    @endif
@endsection