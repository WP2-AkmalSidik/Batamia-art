@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
        <!-- Statistik -->
        @include('pages.admin.dashboard.components.kartu-statistik')
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Grafik Penjualan -->
        @include('pages.admin.dashboard.components.grafik-penjualan')

        <!-- Produk Terlaris -->
        @include('pages.admin.dashboard.components.produk-terlaris')
    </div>
@endsection
