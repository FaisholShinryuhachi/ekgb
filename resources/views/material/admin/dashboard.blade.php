@extends('mylayout.layout')

@section('sidebar')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('ekgb') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Ekgb</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengajuan.tampilPengajuanKGB') }}">
                    <i class="material-icons">send</i>
                    <p>Pengajuan</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user-table') }}">
                    <i class="material-icons">switch_account</i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-about') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>About</p>
                </a>
            </li>

        </ul>
    </div>
@endsection

@section('content')
 {{-- 
<div class="row d-flex justify-content-center">
    <div class="col-lg-12">
        <div class="card card-profile">
            <div class="card_image"><img src="{{ asset('material/assets/img/dash.png') }}" width="100%"></div>
            
            
        </div>
    </div>
</div>
Bagin Atas --}}

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Warning !</h4>
                <marquee>
                    <p class="card-category">Sistem Ini Dibuat Untuk Memudahkan Dalam Proses Monitoring KGB Pada Dinas PUPR Kab. Natuna</p>
                </marquee>
            </div>
            <div class="card-body table-responsive">
               
            </div>
        </div>
    </div>
</div>
    {{-- Bagin Atas --}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <p class="card-category">KGB Selanjutnya</p>
                    <div id="deadline">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i>
                        <a href="javascript:;">Cek Kembali...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <p class="card-category">Sudah Dalam Proses</p>
                    <div id="proses">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-success">update</i> proses

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- End Bagian Atas --}}

    {{-- Bagian Bawah --}}
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Data KGB Dalam 2 Bulan Mendatang</h4>
                    <marquee>
                        <p class="card-category">Segera lakukan konfirmasi ke Sub Bagian Umum dan Kepegawaian</p>
                    </marquee>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-danger">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Kgb Terakhir</th>
                            <th>Deadline</th>
                        </thead>
                        <tbody id="table-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-6">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Data Yang Sudah Di Proses</h4>
                    <marquee>
                        <p class="card-category">Mohon lakukan cek berkala</p>
                    </marquee>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-success">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Kgb Terakhir</th>
                            <th>Deadline</th>
                        </thead>
                        <tbody id="table-body2">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@section('footer')
    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="{{ route('admin') }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ekgb') }}">
                            E-kgb
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user-table') }}">
                            User
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-about') }}">
                            About
                        </a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                    </li>
                </ul>


                
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Team IT Dinas PUPR Natuna - Version 2.0
            </div>
        </div>
    </footer>
@endsection

{{-- End Bagian Bawah --}}
@push('scriptku')
    <script type="text/javascript">
        $(document).ready(function() {
            $.get('api/dashboard', (res) => {
                $('#deadline').html(`
                                            <h2 class="card-title">${res.deadline}/${res.total}</h2>
                                        `);
                $('#proses').html(`
                                            <h2 class="card-title">${res.diproses}/${res.total}</h2>
                                        `);
                $.each(res.data, (i, item) => {
                    res.data[i].nama_pegawai
                    $('#table-body').append(`<tr>
                                            <td>${res.data[i].id}</td>
                                            <td>${res.data[i].nama_pegawai}</td>
                                            <td>${getTanggal(res.data[i].kgb_terakhir)}</td>
                                            <td>${getTanggal(res.data[i].deadline)}</td>

                                        </tr>
                            `)
                });
                $.each(res.data2, (i, item) => {
                    res.data2[i].nama_pegawai
                    $('#table-body2').append(`<tr>
                                            <td>${res.data2[i].id}</td>
                                            <td>${res.data2[i].nama_pegawai}</td>
                                            <td>${getTanggal(res.data2[i].kgb_terakhir)}</td>
                                            <td>${getTanggal(res.data2[i].deadline)}</td>

                                        </tr>
                            `)
                });
            });
        });


        const getTanggal = (data) => {
            let tanggal = data.slice(8, 10)
            let bulan = data.slice(5, 7)
            let tahun = data.slice(0, 4)
            let bulanIndo

            switch (bulan) {
                case '01':
                    bulanIndo = 'Jan'
                    break;
                case '02':
                    bulanIndo = 'Feb'
                    break;
                case '03':
                    bulanIndo = 'Mar'
                    break;
                case '04':
                    bulanIndo = 'Apr'
                    break;
                case '05':
                    bulanIndo = 'Mei'
                    break;
                case '06':
                    bulanIndo = 'Jun'
                    break;
                case '07':
                    bulanIndo = 'Jul'
                    break;
                case '08':
                    bulanIndo = 'Agu'
                    break;
                case '09':
                    bulanIndo = 'Sep'
                    break;
                case '10':
                    bulanIndo = 'Okt'
                    break;
                case '11':
                    bulanIndo = 'Nov'
                    break;
                case '12':
                    bulanIndo = 'Des'
                    break;

                default:
                    break;
            }

            return `${tanggal}-${bulanIndo}-${tahun}`
        }
    </script>
@endpush

@endsection
