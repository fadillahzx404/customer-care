@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('page-content')
    <div class="container px-12 lg:mt-8 max-lg:px-10 max-sm:px-5 mx-auto min-h-screen">
        <div class="text-center">
            <p class="pt-5 text-4xl font-black">Hello {{ Auth::user()->name }}</p>
            <p>Wellcome On Dashboard</p>
        </div>

        <section class="content-dashboard grid mt-10">

        <div class="stats shadow">


                    <div class="stat">

                        <div class="stat-title text-white font-medium badge badge-primary">Menunggu Di Balas Oleh Admin.</div>
                        <div class="stat-value pt-2">
                            {{ $data->where('status', '=', 'Menunggu Di Balas Oleh Admin.')->groupBy(['year', 'month'])->count() }}</div>
                        <div class="stat-desc">Yang yang sedang menunggu<br/> balasan admin.</div>
                    </div>

                    <div class="stat">

                        <div class="stat-title text-white font-medium badge badge-info">Menunggu Di Balas Oleh Anda.</div>
                        <div class="stat-value pt-2">
                            {{ $data->where('status', '=', 'Menunggu Di Balas Oleh Anda.')->groupBy(['year', 'month'])->count() }}</div>
                        <div class="stat-desc">Yang harus di Anda Balas.</div>
                    </div>


                    <div class="stat">

                        <div class="stat-title text-white font-medium badge badge-success">Ticket Support Telah Ditutup.</div>
                        <div class="stat-value pt-2">
                            {{ $data->where('status', '=', 'Ticket Support Telah Ditutup.')->groupBy(['year', 'month'])->count() }}</div>
                        <div class="stat-desc">Ticket Yang Telah Selesai.</div>
                    </div>


                <div class="stat">

                    <div class="stat-title text-white font-medium badge badge-error">Masalah Tidak Terselasaikan.</div>
                    <div class="stat-value pt-2">
                        {{ $data->where('status', '=', 'Masalah Tidak Terselesaikan.')->groupBy(['year', 'month'])->count() }}</div>
                    <div class="stat-desc">Yang Tidak Bisa Diselesaikan.</div>
                </div>

            </div>

        </section>


    </div>
@endsection
