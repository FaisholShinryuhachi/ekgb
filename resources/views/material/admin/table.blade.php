@extends('mylayout.layout')

@section('sidebar')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  ">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" href="{{ route('ekgb') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Ekgb</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('user-table') }}">
                    <i class="material-icons">switch_account</i>
                    <p>User</p>
                </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Daftar Table EKGB</h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header card-header-primary pb-2 pt-2">
                            <button id="add-button" class="edit btn btn-primary btn-sm"> <i
                                    class="material-icons">add_circle</i>
                            </button>
                            <button id="semua" class="edit btn btn-success btn-sm"> <i class="material-icons">toc</i>
                                Semua </button>
                            <button id="deadline" class="edit btn btn-success btn-sm"> <i
                                    class="material-icons">disabled_by_default</i> Dealine </button>
                            <button id="aktif" class="edit btn btn-success btn-sm"> <i
                                    class="material-icons">check_circle</i>
                                Aktif </button>
                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="tableku">
                                <table id="myTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Pangkat/Gol</th>
                                            <th width="100px">TMT KGB</th>
                                            <th width="100px">KGB Selanjutnya</th>
                                            <th>Status</th>
                                            <th>Gaji</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
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
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Adhitya Pratama, S.Kom & Team - Version 1.0
            </div>
        </div>
    </footer>
    @endsection
    @section('modal')
        <!-- [ Modal Add ] start -->
        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body pl-5 pr-5">
                        <form id="add-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"> NIP </label>
                                <input id="nip" type="text" class="form-control" name="nip">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    {{-- <div class="mb-3">
                                    <label class="form-label"> Nama </label>
                                    <input placeholder="" disabled="true" id="nama_pegawai" type="text" class="form-control"
                                        name="nama_pegawai">
                                </div> --}}
                                    <label class="form-label"> Nama Pegawai </label>
                                    {{-- <div id="nama_pegawai" class="mb-3">
                                    <select id="status" name="status" class="form-control">
                                        <option value="Belum Diproses">Belum Diproses</option>
                                        <option value="Sudah Diproses">Sudah Diproses</option>
                                    </select>
                                </div> --}}
                                    <select id="nama_pegawai" name="id_user" class="form-control">
                                        {{-- <option selected='true' value="2">${res.data.name}</option> --}}
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <button id="show-user" type="button" class="btn btn-danger">Pilih</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Jabatan </label>
                                <input id="jabatan" type="text" class="form-control" name="jabatan">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Pangkat/Golongan </label>
                                <input id="pangkat" type="text" class="form-control" name="pangkat">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> TMT KGB Terakhir </label>
                                <input id="kgb_terakhir" type="date" class="form-control" name="kgb_terakhir">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Status </label>
                                <select id="status" name="status" class="form-control">
                                    <option value="Belum Diproses">Belum Diproses</option>
                                    <option value="Sudah Diproses">Sudah Diproses</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Gaji </label>
                                <input id="gaji" type="number" class="form-control" name="gaji">
                            </div>
                            <div class="mb-3">
                                <div id="pdf-preview">
                                </div>
                                <div id="file-uploader">
                                    <label class="form-label">Pendukung</label>
                                    <div class="col-xs-8">
                                        <input id="pendukung" class="form-control" type="file" name="pendukung">
                                    </div>
                                    <label class="form-label">Pendukung 2</label>
                                    <div class="col-xs-8">
                                        <input id="pendukung2" class="form-control" type="file" name="pendukung2">
                                    </div>
                                </div>
                                <div id="add-alert">
                                </div>
                                <div id="finish-button" class="mt-3">
                                    <center><button id="add-submit" type="submit" class="btn btn-primary">Simpan
                                            Data</button>
                                    </center>
                                </div>
                                <div class="mt-3" id="reset">
                                    <center><button type="reset" class="btn btn-danger">Reset</button></center>
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
        <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Anda Yakin ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                        <button id="delete-confirm" type="button" class="btn btn-danger" id="confirm">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Modal Delete ] end -->
    @endsection

    @section('modal-user')
        <!-- [ Modal User ] start -->
        <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLongTitle">Pilih User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
                    </div>
                    <div class="modal-body pl-5 pr-5">
                        <div class="table-responsive">
                            <div>
                                <table id="user-table" class="table table-striped table-bordered" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    {{-- <div class="modal-footer align-center">
                    <button type="button" class="btn btn-warning tutup" data-dismiss="modal">Tutup</button>
                    {{-- <button type="button" class="btn btn-danger" id="confirm">Ya</button> --}}
                </div> --}}
            </div>
        </div>
    </div>
    <!-- [ Modal User ] end -->
@endsection

@push('scriptku')
    <script type="text/javascript">
        $(document).ready(function() {
            getDataTables('{{ route('api-get-ekgb') }}');
        });


        // function get untuk data tables
        const getDataTables = (url) => {
            $(document).ready(function() {
                $('#myTable').DataTable({
                    processing: true,
                    bDestroy: true,
                    serverSide: true,
                    
                    ajax: url,
                    "createdRow": function(row, data, dataIndex) {
                        if (data['stats'] === true) {
                            // $(row).css("background-color", "Orange");
                            $(row).addClass("bg-danger text-white");
                        }
                    },
                    columns: [{
                            data: 'id',
                        },
                        {
                            data: 'nip',
                        },
                        {
                            data: 'nama_pegawai',
                        },
                        {
                            data: 'jabatan',
                        },
                        {
                            data: 'pangkat',
                        },
                        {
                            data: function(data) {
                                return getTanggal(data.kgb_terakhir)
                            },

                        },
                        {
                            data: function(data) {
                                return getTanggal(data.deadline)
                            },

                        },
                        {
                            data: 'status',
                        },
                        {
                            data: 'gaji',
                        },
                        {
                            data: 'action',
                        },
                    ]
                });
            });
        }

        // ----------------------------------------------------------------
        // ---------------- Bagian untuk add ------------------------------
        // ----------------------------------------------------------------

        $(document).ready(function() {
            $('.form-control').focus(() => {
                if ($('#add-submit').on('click').prop('disabled') === true) {
                    $('#add-submit').on('click').prop('disabled', false)
                }
                if ($('#submitku').on('click').prop('disabled') === true) {
                    $('#submitku').on('click').prop('disabled', false)
                }
                let cek = $('#add-alert').find('.alert');
                if (cek.length >= 1) {
                    $('#add-alert').empty();
                }
            });
        });

        //Handler add Data
        $(document).ready(function() {
            $('#add-button').on('click', function() {
                $('#nama_pegawai').attr('disabled', true);
                $('#add-alert').empty();
                $('#finish-button').empty().append(`<center><button id="add-submit" type="submit" class="btn btn-primary">Simpan Data</button>
                                </center>`);
                $('#add-submit').on('click').prop('disabled', false);
                $('#file-uploader').show();
                $('#reset').show();
                $('#pdf-preview').empty();
                clearInput();
                $('.modal-header').html(`<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);
                $('#add-modal').modal('show');
            });
        });

        //Handler add submit
        $(document).ready(function() {
            $(document).on('click', '#add-submit', function(e) {
                e.preventDefault();
                $('#add-submit').on('click').prop('disabled', true);
                $('#nama_pegawai').removeAttr('disabled')

                let hasil = $(".form-control");

                if (validator(hasil, 'all')) {
                    // $('#add-submit').on('click').prop('disabled', true);
                    let form = $('#add-form')[0];
                    let data = new FormData(form);
                    tambaData(data, '{{ route('api-post-ekgb') }}', true, 'Penambahan Data');
                } else {
                    $('#nama_pegawai').attr('disabled', true);
                    $('#add-submit').on('click').prop('disabled', true);
                    $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                    Form Tidak Bolek Kosong
                                </div>`);
                }
            });
        });

        //Function validator function
        validator = (data, state) => {

            if (state === 'part') {
                if ((!!data[0].value) &&
                    (!!data[1].value) &&
                    (!!data[2].value) &&
                    (!!data[3].value) &&
                    (!!data[4].value) &&
                    (!!data[5].value) &&
                    (!!data[6].value)
                ) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ((!!data[0].value) &&
                    (!!data[1].value) &&
                    (!!data[2].value) &&
                    (!!data[3].value) &&
                    (!!data[4].value) &&
                    (!!data[5].value) &&
                    (!!data[6].value) &&
                    (!!data[7].value) &&
                    (!!data[8].value)
                ) {
                    return true;
                } else {
                    return false;
                }
            }



        }

        // Clear input
        clearInput = () => {
            $("#nip").val('');
            $("#nama_pegawai").val('');
            $("#jabatan").val('');
            $("#pangkat").val('');
            $("#kgb_terakhir").val('');
            $("#status").val('');
            $("#gaji").val('');
            $("#pendukung").val('');
            $("#pendukung2").val('');
        }

        // Function tambah data
        tambaData = (data, url, clear, text) => {
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: url,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                success: function(data) {
                    $('#nama_pegawai').attr('disabled', true);
                    $('#add-alert').empty();
                    $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                    ${data.status}
                                </div>`);
                    $('#add-submit').on('click').prop('disabled', true);
                    if (data.code == '02') {
                        clear ? clearInput() : null;
                        getDataTables('{{ route('api-get-ekgb') }}');
                    }
                },
                error: function(e) {
                    $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                    ${e}
                                </div>`);
                }
            });
        }

        // ----------------------------------------------------------------
        // ---------------- Bagian Edit Table -----------------------------
        // ----------------------------------------------------------------

        // Handler button edit
        $(document).ready(function() {
            // $('#myTable').on('click', '.edit-button-table', function() {
            $(document).on('click', '.edit-button-table', function() {
                $('#nama_pegawai').attr('disabled', true);
                $(".form-control")[7].value = '';
                $(".form-control")[8].value = '';
                $('#add-alert').empty();
                $('#file-uploader').hide();
                $('#reset').hide();
                // $('#add-submit').on('click').prop('disabled', false);
                $('#add-modal').modal('show');
                $('#finish-button').empty().append(`
                                <center><button id="submitku" type="submit" class="btn btn-primary">Update Data</button>
                                </center>
                                `);
                $('#submitku').prop('disabled', true);
                $('.modal-header').html(`<h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);

                let id = '';
                id = $(this).attr("value");
                clearInput();
                $.get(`api/ekgb/edit-get/${id}`, (res) => {
                    let gaji = res.data.gaji;
                    gaji = gaji.substring(3, gaji.length)
                    gaji = gaji.substring(0, (gaji.length - 3))
                    gaji = gaji.replaceAll('.', "")

                    $("#nip").val(res.data.nip);
                    $("#nama_pegawai").val(res.data.nama_pegawai);
                    $("#jabatan").val(res.data.jabatan);
                    $("#pangkat").val(res.data.pangkat);
                    $("#gaji").val(gaji);


                    $('.form-control')[4].value = res.data.kgb_terakhir;

                    if (res.data.status == 'Belum Diproses') {
                        $("#status").val("Belum Diproses").attr('selected', 'selected');
                    } else {
                        $("#status").val("Sudah Diproses").attr('selected', 'selected');
                    }
                    $("#nama_pegawai").html(
                        `<option selected='true' value="${res.data.id_user}">${res.data.nama_pegawai}</option>`
                    );

                    $('#pdf-preview').empty().append(`<div class="row mt-3 mb-3">
                                    <div class="col-md-4">
                                        <a target="_blank" rel="noopener noreferrer" href="file/${res.data.pendukung}"><button type="button" class="btn btn-success"> Pendukung 1 </button></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a target="_blank" rel="noopener noreferrer" href="file/${res.data.pendukung2}"><button type="button" class="btn btn-warning"> Pendukung 2 </button></a>
                                    </div>
                                    <div class="col-md-4">
                                        <button id="show-pendukung" type="button" class="btn btn-danger">Edit</button>
                                    </div>
                                </div>`);
                });


                $('#submitku').on('click', function(e) {
                    e.preventDefault();
                    $('#nama_pegawai').removeAttr('disabled')

                    $('#submitku').on('click').prop('disabled', true);
                    let hasil = $(".form-control");

                    if (validator(hasil, 'part')) {
                        let form = $('#add-form')[0];
                        let data = new FormData(form);
                        data.append('id', id);
                        tambaData(data, '{{ route('api-edit-ekgb') }}', false, 'Update Data');
                    } else {
                        $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                    Form Tidak Bolek Kosong
                                </div>`);
                    }
                });
            });
        });

        //Hadler untuk button shown edit pendukung
        $(document).ready(function() {
            $(document).on('click', '#show-pendukung', function() {
                $('#file-uploader').show();
            });
        });

        // ----------------------------------------------------------------
        // ---------------- Bagian User Handler Table ---------------------
        // ----------------------------------------------------------------

        // Untuk show modal pilih user
        $(document).ready(function() {
            $(document).on('click', '#show-user', function() {
                $('#add-modal').modal('hide');
                setTimeout(function() {
                    $('.modal-header').eq(1).html(`<h5 class="modal-title" id="exampleModalLongTitle">Pilih User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>`);
                    $('#modal-user').modal('show');
                    setTimeout(function() {

                        // function get untuk data tables
                        $('#user-table').DataTable({
                            processing: true,
                            bDestroy: true,
                            serverSide: true,
                            pageLength: 5,
                            lengthChange: false,
                            ajax: '{{ route('api-get-kgb-user') }}',
                            columns: [{
                                    data: 'id',
                                },
                                {
                                    data: 'name',
                                },
                                {
                                    data: 'email',
                                },
                                {
                                    data: 'action',
                                },
                            ]
                        });
                    }, 200);
                }, 300);

                $('#modal-user').on('click', '.pilih-user', function() {
                    $('#modal-user').modal('hide');
                    $('#add-submit').on('click').prop('disabled', false);
                    $('#submitku').prop('disabled', false);
                    $('#add-alert').empty();

                    id = $(this).attr("value");

                    $.get(`api/user/edit-get/${id}`, (res) => {
                        $("#nama_pegawai").html(
                            `<option selected='true' value="${res.data.id}">${res.data.name}</option>`
                        );
                    });
                    setTimeout(function() {
                        $('#add-modal').modal('show');
                    }, 300);
                });
            });
        });

        // Untuk close table user 
        $(document).ready(function() {
            $('#modal-user').on('click', '.close', function() {
                setTimeout(function() {
                    $('#add-modal').modal('show');
                }, 300);

            });
        });


        // ----------------------------------------------------------------
        // ---------------- Bagian Hapus Table -----------------------------
        // ----------------------------------------------------------------

        $(document).ready(function() {
            $('#myTable').on('click', '.delete', function() {
                $('#modal-hapus').modal('show');
                id = $(this).attr("value");
                $('#delete-confirm').on('click', function() {
                    $.get(`ekgb/delete/${id}`, (res) => {
                        $('#modal-hapus').modal('hide');
                        getDataTables('{{ route('api-get-ekgb') }}');
                    });
                })
            });
        });

        // ----------------------------------------------------------------
        // ---------------- Fitur Khusus -----------------------------
        // ----------------------------------------------------------------

        $(document).ready(function() {
            $('#semua').on('click', function() {
                $('#tableku').html(`<table id="myTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th width="100px">TMT KGB</th>
                                    <th width="100px">KGB Selanjutnya</th>
                                    <th>Status</th>
                                    <th>Gaji</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>`);
                getDataTables('{{ route('api-get-ekgb') }}');
            });
        });
        $(document).ready(function() {
            $('#deadline').on('click', function() {
                $('#tableku').html(`<table id="myTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th width="100px">TMT KGB</th>
                                    <th width="100px">KGB Selanjutnya</th>
                                    <th>Status</th>
                                    <th>Gaji</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>`);

                $('#myTable').DataTable({
                    processing: true,
                    bDestroy: true,
                    serverSide: true,
                    ajax: '{{ route('api-khusus-deadline') }}',
                    columns: [{
                            data: 'id',
                        },
                        {
                            data: 'nip',
                        },
                        {
                            data: 'nama_pegawai',
                        },
                        {
                            data: 'jabatan',
                        },
                        {
                            data: 'pangkat',
                        },
                        {
                            data: function(data) {
                                return getTanggal(data.kgb_terakhir)
                            },

                        },
                        {
                            data: function(data) {
                                return getTanggal(data.deadline)
                            },

                        },

                        {
                            data: 'status',
                        },
                        {
                            data: 'gaji',
                        },
                        {
                            data: 'action',
                        },
                    ]
                });
            });
        });

        $(document).ready(function() {
            $('#aktif').on('click', function() {
                $('#tableku').html(`<table id="myTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th width="100px">TMT KGB</th>
                                    <th width="100px">KGB Selanjutnya</th>
                                    <th>Status</th>
                                    <th>Gaji</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>`);

                $('#myTable').DataTable({
                    processing: true,
                    bDestroy: true,
                    serverSide: true,
                    ajax: '{{ route('api-khusus-aktif') }}',
                    columns: [{
                            data: 'id',
                        },
                        {
                            data: 'nip',
                        },
                        {
                            data: 'nama_pegawai',
                        },
                        {
                            data: 'jabatan',
                        },
                        {
                            data: 'pangkat',
                        },
                        {
                            data: function(data) {
                                return getTanggal(data.kgb_terakhir)
                            },

                        },
                        {
                            data: function(data) {
                                return getTanggal(data.deadline)
                            },

                        },

                        {
                            data: 'status',
                        },
                        {
                            data: 'gaji',
                        },
                        {
                            data: 'action',
                        },
                    ]
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
