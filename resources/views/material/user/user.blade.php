@extends('mylayout.layout')

@section('sidebar')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active ">
                <a class="nav-link" href="#">
                    <i class="material-icons">dashboard</i>
                    <p>Profile</p>
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Profile</h4>
                    <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> ID </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> NIP </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> Nama Lengkap </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> Jabatan </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> Pangkat </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> KGB Terakhir </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> Status </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" d-flex align-items-center">
                            <label class="form-label"> Pegawai </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>This is a plain notification</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="form-label"> Pendukung 1 </label>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-info">
                                <span>Lihat</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a target="_blank" rel="noopener noreferrer" href="file/${res.data.pendukung}"><button
                                    type="button" class="btn btn-success"> Upload </button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="form-label"> Pendukung 2 </label>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-info">
                                <span>Lihat</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a target="_blank" rel="noopener noreferrer" href="file/${res.data.pendukung}"><button
                                    type="button" class="btn btn-success"> Upload </button></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- Bagian Foto --}}
        {{-- <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="javascript:;">
                        <img class="img" src="../assets/img/faces/marc.jpg" />
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                    <h4 class="card-title">Alec Thompson</h4>
                    <p class="card-description">
                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you
                        like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                    </p>
                    <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
            </div>
        </div> --}}
        {{-- End Bagian Foto --}}
    </div>

@section('modal')
    <!-- [ Modal Add ] start -->

    <!-- [ Modal Add ] end -->

@endsection

@section('modal-hapus')
    <!-- [ Modal Delete ] start -->

    <!-- [ Modal Delete ] end -->
@endsection

@push('scriptku')
    <script type="text/javascript">
        $(document).ready(function() {
            $.get(`api/pegawai/get`, (res) => {
                console.log(res.kgb)
                if (res.kgb == null) {
                    $(".card-body").html(`<div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="form-label"> Pesan </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>KGB Belum Di Buat Hubungi Admin</span>
                            </div>
                        </div>
                    </div>`);
                } else {
                    let pendukung1Html = res.kgb.pendukung == "" ? "<span>Kosong</span>" :
                        `<a target="_blank" rel="noopener noreferrer" href="file/${res.kgb.pendukung}">Lihat</a>`
                    let pendukung2Html = res.kgb.pendukung2 == "" ? "<span>Kosong</span>" :
                    `<a target="_blank" rel="noopener noreferrer" href="file/${res.kgb.pendukung2}">Lihat</a>`;

                    let pendukung1button = res.kgb.pendukung == "" ? `<a target="_blank" rel="noopener noreferrer" href=""><button
                                    type="button" class="btn btn-success"> Upload </button></a>` : `<a target="_blank" rel="noopener noreferrer" href=""><button
                                    type="button" class="btn btn-success"> Update </button></a>`;
                    let pendukung2button = res.kgb.pendukung2 == "" ? `<a target="_blank" rel="noopener noreferrer" href=""><button
                                    type="button" class="btn btn-success"> Upload </button></a>` : `<a target="_blank" rel="noopener noreferrer" href=""><button
                                    type="button" class="btn btn-success"> Update </button></a>`;;

                    $(".card-body").html(`
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="form-label"> ID </label>
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
                            <label class="form-label"> Nama Lengkap </label>
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
                            <label class="form-label"> Pangkat </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>${res.kgb.pangkat}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="form-label"> KGB Terakhir </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>${res.kgb.kgb_terakhir}</span>
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
                            <label class="form-label"> Gaji </label>
                        </div>
                        <div class="col-md-8">
                            <div class="alert alert-info">
                                <span>${res.kgb.gaji}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col-md-4 ">
                            <label class="form-label"> Pendukung 1 </label>
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
                            <label class="form-label"> Pendukung 2 </label>
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
                `);
                }
            });
        });
    </script>
@endpush

@endsection
