@extends('mylayout.layout')

@section('sidebar')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active ">
                <a class="nav-link" href="{{ route('pegawai') }}">
                    <i class="material-icons">dashboard</i>
                    <p>DATA KGB PEGAWAI</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="material-icons">logout</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row flex-column-reverse flex-lg-row">
        <div class="col-md-8">

        </div>
        {{-- Bagian Foto --}}

        <div class="col-md-4">
            {{-- <div class="card card-profile">
                <div class="card-avatar">
                    <img class="img" src="https://ui-avatars.com/api/?name=Rani&size=128" />
                </div>
                <div class="card-body">
                    <h4 class="card-title">Rani Telek</h4>
                    <button type="button" class="foto file-button-2 btn btn-warning btn-round"> Upload </button>
                </div>
            </div> --}}
        </div>

        {{-- End Bagian Foto --}}
    </div>
@section('footer')
    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="{{ route('pegawai') }}">
                            Data KGB Pegawai
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pegawai-about') }}">
                            About
                        </a>
                    </li>

                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Adhitya Pratama, S.Kom & Team
            </div>
        </div>
    </footer>
@endsection
@section('modal')
    <!-- [ Modal Add ] start -->
    <div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body pl-5 pr-5">
                    <form id="add-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div id="file-uploader">
                            </div>
                            <div id="add-alert">
                            </div>
                            <div id="finish-button" class="mt-3">
                                <center><button id="submit" type="submit" class="btn btn-primary">Simpan Data</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer align-center">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    {{-- <button type="button" class="btn btn-danger" id="confirm">Ya</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- [ Modal Add ] end -->
@endsection

@section('modal-hapus')
    <!-- [ Modal Delete ] start -->
    <div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body pl-5 pr-5">
                    Peringatan
                </div>
                <div class="modal-footer align-center">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                    {{-- <button type="button" class="btn btn-danger" id="confirm">Ya</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- [ Modal Delete ] end -->
@endsection

@push('scriptku')
    <script type="text/javascript">
        $(document).ready(function() {
            $.get(`api/pegawai/get`, (res) => {

                if( res.stats == true && res.stats != null ) {
                    $('#alert').modal('show');
                } 

                let url = '{{ url('/') }}'
                console.log(res.profile)
                if (res.profile.profile == null) {
                    $('.col-md-4').html(`<div class="card card-profile">
                        <div class="card_image"><img src="{{ asset('material/assets/img/natuna.jpg') }}" width="100%"></div>
                                            <div class="card-avatar">
                                                <img class="img" src="https://ui-avatars.com/api/?name=${res.profile.name}&size=128" />
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">${res.profile.name}</h4>
                                                <button type="button" class="foto file-button-2 btn btn-warning btn-round"> Upload </button>
                                            </div>
                                        </div>
                                        `)
                } else {
                    $('.col-md-4').html(`<div class="card card-profile">
                        <div class="card_image"><img src="{{ asset('material/assets/img/natuna.jpg') }}" width="100%"></div>
                                            <div class="card-avatar">
                                                <img class="img" src="${url}/file/${res.profile.profile}" />
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">${res.profile.name}</h4>
                                                <button type="button" class="foto file-button-2 btn btn-warning btn-round"> Upload </button>
                                            </div>
                                        </div>
                                        `)
                }


                if (res.kgb == null) {
                    $(".col-md-8").html(`<div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Upload Berkas</h4>
                           <marquee> <p class="card-category">Lengkapi Berkas Anda</p> </marquee>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Pesan :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>E-Kgb belum dibuat, hubungi admin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
                } else {
                    let pendukung1Html = res.kgb.pendukung == "" ? "<span>Kosong</span>" :
                        `<a target="_blank" rel="noopener noreferrer" href="file/${res.kgb.pendukung}">Lihat</a>`
                    let pendukung2Html = res.kgb.pendukung2 == "" ? "<span>Kosong</span>" :
                        `<a target="_blank" rel="noopener noreferrer" href="file/${res.kgb.pendukung2}">Lihat</a>`;

                    let pendukung1button = res.kgb.pendukung == "" ? `<button
                                        type="button" class="file-button btn btn-success"> Upload </button>` : `<button
                                        type="button" class="file-button btn btn-success"> Update </button>`;
                    let pendukung2button = res.kgb.pendukung2 == "" ? `<button
                                        type="button" class="file-button-2 btn btn-success"> Upload </button>` : `<button
                                        type="button" class="file-button-2 btn btn-success"> Update </button>`;;
                    let stats = res.kgb.stats == true ? `alert alert-danger` : `alert alert-success`
                    $(".col-md-8").html(`
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Upload Berkas</h4>
                           <marquee> <p class="card-category">Lengkapi Berkas Anda</p> </marquee>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> ID Ekgb :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.id}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> NIP </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.nip}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Nama Pegawai </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.nama_pegawai}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Jabatan </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.jabatan}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Pangkat/Golongan </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.pangkat}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> TMT KGB </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${getTanggal(res.kgb.kgb_terakhir)}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> KGB yang akan datang</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="${stats}">
                                        <span>${getTanggal(res.kgb.deadline)}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Status </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.status}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Gaji Pokok </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.gaji}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class="col-md-4 ">
                                    <label class="form-label"> File SK Kenaikan Pangkat Terakhir</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-info">
                                        ${pendukung1Html}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    ${pendukung1button}
                                </div>
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class="col-md-4 ">
                                    <label class="form-label">  File KGB Terakhir</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-info">
                                        ${pendukung2Html}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    ${pendukung2button}
                                </div>
                            </div>
                        </div>
                    </div>
                    `);
                }

                $(document).on('click', '#submit', function(e) {
                    e.preventDefault();
                    $('#submit').prop('disabled', true);
                    if (($('#pendukung').val() == '') || ($('#pendukung2').val() == '') || ($(
                            '#pendukung3').val() == '')) {
                        $('#add-alert').empty();

                        $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                        Form Tidak Boleh Kosong
                                    </div>`);
                        $('#submit').prop('disabled', true);
                    } else {
                        let form = $('#add-form')[0];
                        let data = new FormData(form);
                        data.append('id', res.id);

                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: '{{ route('api-file-pegawai') }}',
                            data: data,
                            processData: false,
                            contentType: false,
                            cache: false,
                            timeout: 800000,
                            success: function(data) {
                                $('#add-alert').empty();
                                $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                            ${data.status}
                                        </div>`);
                                $('#submit').prop('disabled', true);
                                getData();
                            },
                            error: function(e) {

                            }
                        });
                    }
                });
            });

        });

        // Show Modal
        $(document).ready(function() {
            $(document).on('click', '.file-button', function() {
                $('#file').modal('show');
                $('#add-alert').empty();
                $('.modal-header').html(`<h5 class="modal-title" id="exampleModalLongTitle">SK Pangkat Terakhir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
                $('#file-uploader').html(`<div id="file-uploader">
                                <label class="form-label">Upload SK Pangkat Terakhir</label>
                                <div class="col-xs-8">
                                    <input id="pendukung" class="form-control" type="file" name="pendukung">
                                </div>
                            </div>`);
                $('#submit').on('click').prop('disabled', true);
            });

            $(document).on('click', '.file-button-2', function() {
                $('#file').modal('show');
                $('#add-alert').empty();
                $('.modal-header').html(`<h5 class="modal-title" id="exampleModalLongTitle">KGB Terakhir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
                $('#file-uploader').html(`<div id="file-uploader">
                                <label class="form-label">Upload KGB Terakhir</label>
                                <div class="col-xs-8">
                                    <input id="pendukung2" class="form-control" type="file" name="pendukung2">
                                </div>
                            </div>`);
                $('#submit').on('click').prop('disabled', true);
            });

            $(document).on('click', '.foto', function() {
                $('#file').modal('show');
                $('#add-alert').empty();
                $('.modal-header').html(`<h5 class="modal-title" id="exampleModalLongTitle">Update Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
                $('#file-uploader').html(`<div id="file-uploader">
                                <label class="form-label">Update Foto</label>
                                <div class="col-xs-8">
                                    <input id="pendukung3" class="form-control" type="file" name="pendukung3">
                                </div>
                            </div>`);
                $('#submit').on('click').prop('disabled', true);
            });
        });

        // submit File
        const getData = () => {
            $.get(`api/pegawai/get`, (res) => {
                let url = '{{ url('/') }}'

                if (res.profile.profile == null) {
                    $('.col-md-4').html(`<div class="card card-profile">
                                            <div class="card_image"><img src="{{ asset('material/assets/img/natuna.jpg') }}" width="100%"></div>
                
                                            <div class="card-avatar">
                                                <img class="img" src="https://ui-avatars.com/api/?name=${res.profile.name}&size=128" />
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">${res.profile.name}</h4>
                                                <button type="button" class="foto file-button-2 btn btn-warning btn-round"> Upload </button>
                                            </div>
                                        </div>
                                        `)
                } else {
                    $('.col-md-4').html(`<div class="card card-profile">
                        <div class="card_image"><img src="{{ asset('material/assets/img/natuna.jpg') }}" width="100%"></div>
                
                                            <div class="card-avatar">
                                                <img class="img" src="${url}/file/${res.profile.profile}" />
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">${res.profile.name}</h4>
                                                <button type="button" class="foto file-button-2 btn btn-warning btn-round"> Upload </button>
                                            </div>
                                        </div>
                                        `)
                }


                if (res.kgb == null) {
                    $(".col-md-8").html(`<div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Upload Berkas</h4>
                           <marquee> <p class="card-category">Lengkapi Berkas Anda</p> </marquee>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Pesan :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>E-Kgb belum dibuat, hubungi admin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
                } else {
                    let pendukung1Html = res.kgb.pendukung == "" ? "<span>Kosong</span>" :
                        `<a target="_blank" rel="noopener noreferrer" href="file/${res.kgb.pendukung}">Lihat</a>`
                    let pendukung2Html = res.kgb.pendukung2 == "" ? "<span>Kosong</span>" :
                        `<a target="_blank" rel="noopener noreferrer" href="file/${res.kgb.pendukung2}">Lihat</a>`;

                    let pendukung1button = res.kgb.pendukung == "" ? `<button
                                        type="button" class="file-button btn btn-success"> Upload </button>` : `<button
                                        type="button" class="file-button btn btn-success"> Update </button>`;
                    let pendukung2button = res.kgb.pendukung2 == "" ? `<button
                                        type="button" class="file-button-2 btn btn-success"> Upload </button>` : `<button
                                        type="button" class="file-button-2 btn btn-success"> Update </button>`;;
                    let stats = res.kgb.stats == true ? `alert alert-danger` : `alert alert-success`
                    $(".col-md-8").html(`
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Upload Berkas</h4>
                           <marquee> <p class="card-category">Lengkapi Berkas Anda</p> </marquee>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> ID Ekgb :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.id}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> NIP </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.nip}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Nama Pegawai </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.nama_pegawai}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Jabatan </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.jabatan}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Pangkat/Golongan </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.pangkat}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> TMT KGB </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${getTanggal(res.kgb.kgb_terakhir)}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> KGB yang akan datang</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="${stats}">
                                        <span>${getTanggal(res.kgb.deadline)}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Status </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.status}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                    <label class="form-label"> Gaji Pokok </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <span>${res.kgb.gaji}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class="col-md-4 ">
                                    <label class="form-label"> File SK Kenaikan Pangkat Terakhir</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-info">
                                        ${pendukung1Html}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    ${pendukung1button}
                                </div>
                            </div>
                            <div class="row d-flex align-items-center">
                                <div class="col-md-4 ">
                                    <label class="form-label">  File KGB Terakhir</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-info">
                                        ${pendukung2Html}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    ${pendukung2button}
                                </div>
                            </div>
                        </div>
                    </div>
                    `);
                }
            });
        }

        $(document).ready(function() {
            // $('.form-control').focus(() => {
            $(document).on('focus', '.form-control', () => {
                if ($('#submit').on('click').prop('disabled') === true) {
                    $('#submit').on('click').prop('disabled', false)
                }

                let cek = $('#add-alert').find('.alert');
                if (cek.length >= 1) {
                    $('#add-alert').empty();
                }
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
