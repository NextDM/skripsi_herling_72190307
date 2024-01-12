@extends('layouts.layoutUtama')

@section('progressMahasiswaDsn')
    <script src="{{ asset('achart/dist/apexcharts.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('achart/dist/apexcharts.css') }}" />
    <script>
        var options = {
            title: {
                text: 'Progress',
                align: 'Center',
                offsetX: 0,
                offsetY: 2,
                style: {
                    fontSize: '18px',
                    fontWeight: 'bold',
                }
            },
            series: [{{ $pencapaian }}],
            chart: {
                height: 300,
                width: '100%',
                type: 'radialBar',
                // style : {
                //     position: 'right',
                // }
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '50%',
                    },
                    dataLabels: {
                        name: {
                            show: false
                        },
                        value: {
                            offsetY: 4,
                            fontSize: '18px',
                        }
                    }
                }
            },
            colors: ['#FF0000'],
        };
        var chart = new ApexCharts(document.querySelector("#progressMahasiswaDsn"), options);
        chart.render();
    </script>
@endsection

@section('sidebar')
    <nav class="sidebar">
        <div class="logo_items flex">
            <span class="nav_image">
                <img src="/image/logo.svg" alt="logo_img" />
            </span>
        </div>
        <div class="flex justify-content-around w-85 mx-3 mt-3 pb-2 border-bottom border-black">
            <a href="{{ route('dosen.profil') }}" class="flex">
                <div class="img-fluid pe-3">
                    @if (Auth::user()->foto)
                        <img src="/image/Dosen/{{ Auth::user()->foto }}" class="rounded-circle avatar">
                    @else
                        <img class="rounded-circle avatar" src="/image/foto-profil-kosong.jpg" alt="">
                    @endif
                </div>
                <div class="pt-3">
                    <p href="#" class="text-black text-xs font-weight-bold mb-1">{{ Auth::user()->nama }}</p>
                    <p href="#" class="text-black text-xs font-weight-normal">Dosen</p>
                </div>
            </a>
        </div>
        <div class="container">
            <div class="pt-1">
                <ul class="menu_item">
                    <li class="item">
                        <a href="{{ route('dosen.dashboard') }}"
                            class="{{ $halaman === 'dashboard' ? 'active' : '' }} link flex">
                            <i class="bi bi-bar-chart-line-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="{{ route('dosen.profil') }}" class="{{ $halaman === 'profil' ? 'active' : '' }} link flex">
                            <i class="bi bi-person-fill"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="{{ route('dosen.mahasiswa') }}"
                            class="{{ $halaman === 'mahasiswa' ? 'active' : '' }} link flex">
                            <i class="bi bi-people-fill"></i>
                            <span>Mahasiswa</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="{{ route('dosen.milestone') }}"
                            class="{{ $halaman === 'milestone' ? 'active' : '' }} link flex">
                            <i class="bi bi-flag-fill"></i>
                            <span>Milestone</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="{{ route('dosen.bimbingan') }}"
                            class="{{ $halaman === 'bimbingan' ? 'active' : '' }} link flex">
                            <i class="bi bi-journals"></i>
                            <span>Bimbingan</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="{{ route('dosen.logout') }}" class="link flex">
                            @method('POST')
                            <i class="bx bx-log-out"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
    </nav>
@endsection

@section('dashboard')
    <nav class="navbar navbar-expand-sm shadow-none pe-6 border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="judul">
            <div class="square"></div>
            <h1 class="judulHalaman">Mahasiswa</h1>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-8 pe-4">
                <div class="card my-table">
                    <div class="card-header p-0 position-relative mt-n4 mx-4 z-index-2">
                        <div class="row">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-2 pb-2 flex">
                                <div class="col-6 my-auto">
                                    <h6 class="text-white text-capitalize ps-3">Detail Mahasiswa</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <div class="pe-2 float-end">
                                        <i class="bi bi-person text-white icon-table float-end"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">

                        <div class="main-data-profile">
                            <div class="data-profile w-55 pe-3">
                                <label for="" class="text-start">Nama Mahasiswa</label>
                                <input type="text" name="nama" id="nama" class="text-sm"
                                    value="{{ $mahasiswa->nama }}" disabled>
                            </div>

                            <div class="data-profile w-45">
                                <label for="" class="text-start">NIM</label>
                                <input type="text" name="nim" id="nim" class="text-sm"
                                    value="{{ $mahasiswa->nim }}" disabled>
                            </div>

                            <div class="data-profile">
                                <label for="" class="text-start">Email</label>
                                <input type="text" name="angkatan" id="angkatan" class="text-sm"
                                    value="{{ $mahasiswa->email }}" disabled>
                            </div>

                            <div class="data-profile">
                                <label for="" class="text-start">Judul Skripsi</label>
                                <textarea name="judulSkripsi" id="" class="pe-3 text-justify" disabled>{{ $mahasiswa->judul }}</textarea>
                            </div>

                            <div class="data-profile w-50 pe-3">
                                <label for="" class="text-start">Angkatan</label>
                                <input type="text" name="angkatan" id="angkatan" class="text-sm"
                                    value="{{ $mahasiswa->angkatan }}" disabled>
                            </div>

                            <div class="data-profile w-50">
                                <label for="" class="text-start">Periode</label>
                                <input type="text" name="periode" id="periode" class="text-sm"
                                    value="{{ date('Y', strtotime($mahasiswa->periode->tanggalMulai)) }} / {{ date('Y', strtotime($mahasiswa->periode->tanggalMulai)) + 1 }}"
                                    disabled>
                            </div>

                            <div class="data-profile w-50 pe-3">
                                <label for="" class="text-start">No. Handphone</label>
                                <input type="text" name="noHp" id="noHp" class="text-sm"
                                    value="{{ $mahasiswa->noHp }}" disabled>
                            </div>

                            <div class="data-profile w-50">
                                <label for="" class="text-start">Jenis Kelamin</label>
                                <input type="text" name="noHp" id="noHp" class="text-sm"
                                    value="{{ $mahasiswa->jenisKelamin }}" disabled>
                            </div>

                            <div class="data-profile w-50 pe-3">
                                <label for="" class="text-start">Jumlah SKS</label>
                                <input type="text" name="jumlah_sks" id="jumlah_sks" class="text-sm"
                                    value="{{ $mahasiswa->jumlah_sks }}" disabled>
                            </div>

                            <div class="data-profile w-50">
                                <label for="" class="text-start">IPK</label>
                                <input type="text" name="ipk" id="ipk" class="text-sm"
                                    value="{{ $mahasiswa->ipk }}" disabled>
                            </div>

                            <div class="data-profile w-50 pe-3">
                                <label for="" class="text-start">Dosen Pembimbing 1</label>
                                @foreach ($dosenPembimbing1 as $dp1)
                                    <input type="text" name="" id="dosenPembimbing2"
                                        value="{{ $dp1->nama }}" disabled>
                                @endforeach
                            </div>
                            <div class="data-profile w-50">
                                <label for="" class="text-start">Dosen Pembimbing 2</label>
                                @foreach ($dosenPembimbing2 as $dp2)
                                    <input type="text" name="" id="dosenPembimbing2"
                                        value="{{ $dp2->nama }}" disabled>
                                @endforeach
                            </div>
                            <div class="w-100">
                                <a href="{{ route('dosen.mahasiswa') }}" class="btn btn-info float-end">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card my-table">
                    <div class="col-12 text-center mt-n5 bg-transparent">
                        @if ($mahasiswa->foto)
                            <img class="position-relative collapsing avatar-xxl rounded-circle"
                                src="/image/Mahasiswa/{{ $mahasiswa->foto }}" alt="">
                        @else
                            <img class="position-relative collapsing avatar-xxl rounded-circle"
                                src="/image/foto-profil-kosong.jpg" alt="">
                        @endif

                    </div>
                    <div class="card-body px-0">
                        <div class="text-center pb-3 text-md">
                            <label for="">{{ $mahasiswa->nama }}</label>
                        </div>
                        <div class="text-center text-md pb-3">
                            <label for="" class="">Mahasiswa</label>
                        </div>
                    </div>
                </div>
                <div class="card my-table">
                    <div class=" p-1 px-0">
                        <div class="pt-4">
                            <div id="progressMahasiswaDsn">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
