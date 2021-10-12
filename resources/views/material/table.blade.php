@extends('mylayout.layout')

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
                            <button id="semua" class="edit btn btn-success btn-sm"> <i
                                    class="material-icons">picture_as_pdf</i>
                                Semua </button>
                            <button id="deadline" class="edit btn btn-success btn-sm"> <i
                                    class="material-icons">picture_as_pdf</i> Dealine </button>
                            <button id="aktif" class="edit btn btn-success btn-sm"> <i
                                    class="material-icons">picture_as_pdf</i>
                                Aman </button>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <div id="tableku">
                            <table id="myTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Pangkat/Gol</th>
                                        <th>TMT KGB</th>
                                        <th>KGB Selanjutnya</th>
                                        <th>Status</th>
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
                        <div class="mb-3">
                            <label class="form-label"> Nama </label>
                            <input id="nama_pegawai" type="text" class="form-control" name="nama_pegawai">
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
                                <option value="Belum Diverifikasi">Belum Diverifikasi</option>
                                <option value="Sudah Diverifikasi">Sudah Diverifikasi</option>
                            </select>
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
                                <center><button id="add-submit" type="submit" class="btn btn-primary">Simpan Data</button>
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

@push('scriptku')
    <script type="text/javascript">
        $(document).ready(function() {
            getDataTables('/ekgb/get');
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
                            $(row).addClass("bg-info text-white");
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
                            data: 'kgb_terakhir',
                        },
                        {
                            data: 'deadline',
                        },
                        {
                            data: 'status',
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
                if (cek.length <= 1) {
                    $('#add-alert').empty();
                }
            });
        });

        //Handler add Data
        $(document).ready(function() {
            $('#add-button').on('click', function() {
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

                let hasil = $(".form-control");

                if (validator(hasil, 'all')) {
                    // $('#add-submit').on('click').prop('disabled', true);
                    let form = $('#add-form')[0];
                    let data = new FormData(form);
                    tambaData(data, '/ekgb/post', true, 'Penambahan Data');
                } else {
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
                    (!!data[5].value)
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
                    (!!data[7].value)
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
                    console.log(data.status);
                    $('#add-alert').empty();
                    $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                    ${text} ${data.status}
                                </div>`);
                    clear ? clearInput() : null;
                    // clearInput();
                    getDataTables('/ekgb/get');

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
            $('#myTable').on('click', '.edit-button-table', function() {
                $(".form-control")[6].value = '';
                $(".form-control")[7].value = '';
                $('#add-alert').empty();
                $('#file-uploader').hide();
                $('#reset').hide();
                $('#add-submit').on('click').prop('disabled', false);
                $('#add-modal').modal('show');
                $('#finish-button').empty().append(`
                                <center><button id="submitku" type="submit" class="btn btn-primary">Update Data</button>
                                </center>
                                `);

                $('.modal-header').html(`<h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>`);

                let id = '';
                id = $(this).attr("value");
                clearInput();
                $.get(`ekgb/edit-get/${id}`, (res) => {
                    $("#nip").val(res.data.nip);
                    $("#nama_pegawai").val(res.data.nama_pegawai);
                    $("#jabatan").val(res.data.jabatan);
                    $("#pangkat").val(res.data.pangkat);
                    $("#kgb_terakhir").val(res.data.kgb_terakhir);
                    $("#status").val(res.data.status);
                    // $(".form-control")[6].value = res.data.pendukung;
                    // $(".form-control")[7].value = res.data.pendukung2;

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

                    $('#submitku').on('click').prop('disabled', true);
                    let hasil = $(".form-control");

                    if (validator(hasil, 'part')) {
                        let form = $('#add-form')[0];
                        let data = new FormData(form);
                        data.append('id', id);
                        tambaData(data, '/ekgb/edit', false, 'Update Data');
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
        // ---------------- Bagian Hapus Table -----------------------------
        // ----------------------------------------------------------------

        $(document).ready(function() {
            $('#myTable').on('click', '.delete', function() {
                $('#modal-hapus').modal('show');
                id = $(this).attr("value");
                $('#delete-confirm').on('click', function() {
                    $.get(`ekgb/delete/${id}`, (res) => {
                        $('#modal-hapus').modal('hide');
                        getDataTables('/ekgb/get');
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
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th>TMT KGB</th>
                                    <th>KGB Selanjutnya</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>`);
                getDataTables('/ekgb/get');
            });
        });
        $(document).ready(function() {
            $('#deadline').on('click', function() {
                $('#tableku').html(`<table id="myTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th>TMT KGB</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>`);

                $('#myTable').DataTable({
                    processing: true,
                    bDestroy: true,
                    serverSide: true,
                    ajax: '/ekgb/deadline',
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
                            data: 'kgb_terakhir',
                        },
                        {
                            data: 'status',
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
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th>TMT KGB</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>`);

                $('#myTable').DataTable({
                    processing: true,
                    bDestroy: true,
                    serverSide: true,
                    ajax: '/ekgb/aktif',
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
                            data: 'kgb_terakhir',
                        },
                        {
                            data: 'status',
                        },
                        {
                            data: 'action',
                        },
                    ]
                });
            });
        });
    </script>
@endpush

@endsection
