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
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('ekgb') }}">
                    <i class="material-icons">content_paste</i>
                    <p>E-kgb</p>
                </a>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" href="{{ route('user-table') }}">
                    <i class="material-icons">switch_account</i>
                    <p>User</p>
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
                            <h4 class="card-title mt-0"> Daftar Table User</h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header card-header-primary pb-2 pt-2">
                            <button id="add-button" class="edit btn btn-primary btn-sm"> <i
                                    class="material-icons">add_circle</i>
                            </button>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
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
                            <label class="form-label"> Nama </label>
                            <input id="nama" type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Email </label>
                            <input id="email" type="text" class="form-control" name="email">
                        </div>
                        <div id="button-password">
                            <div class="mb-3">
                                <button id="show-password" type="button" class="btn btn-danger">Ubah Password</button>
                            </div>
                        </div>
                        <div id="password-panel">
                            <div class="mb-3">
                                <label class="form-label"> Password </label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Konfirmasi Password</label> </label>
                                <input id="konfirmasi-password" type="password" class="form-control"
                                    name="konfirmasi-password">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Role </label>
                            <select id="role" name="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="pegawai">Pegawai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div id="pdf-preview">
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
            getDataTables('api/user/get');

            // ----------------------------------------------------------------
            // ---------------- Bagian untuk add ------------------------------
            // ----------------------------------------------------------------

            // Handler Tombol Add {
            $('#add-button').on('click', function() {
                $('#add-alert').empty();
                $('#password-panel').show();
                $('#button-password').hide();
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

            // Handler Tombol Submit
            $(document).on('click', '#add-submit', function(e) {
                e.preventDefault();
                $('#add-submit').on('click').prop('disabled', true);
                $('#add-alert').empty();

                let nama = $('#nama').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let konfirmasi_password = $('#konfirmasi-password').val();
                let roles = $('#role').val();
                let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                let validatorEmail;
                let validatorPassword;
                let validatorNull;

                if ((nama == '') ||
                    (email == '') ||
                    (password == '') ||
                    (konfirmasi_password == '') ||
                    (roles == '')
                ) {
                    validatorNull = false;
                    $('#add-alert').append(`<div class="alert alert-danger mt-3" role="alert">
                                 Form Tidak Bolek Kosong
                                </div>`);
                } else {
                    validatorNull = true;
                }

                if (password != konfirmasi_password) {
                    validatorPassword = false;
                    $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                 Password Harus Sama
                                </div>`);
                } else {
                    validatorPassword = true;
                }

                if (!pattern.test(email)) {
                    validatorEmail = false;
                    $('#add-alert').append(`<div class="alert alert-info mt-3" role="alert">
                                 Email TIdak Valid
                                </div>`);
                } else {
                    validatorEmail = true;
                }

                if (validatorEmail && validatorNull && validatorPassword) {
                    let form = $('#add-form')[0];
                    let data = new FormData(form);
                    tambaData(data, '{{ route('api-post-user') }}', true);
                }

            });

            // ----------------------------------------------------------------
            // ---------------- Bagian untuk Edit -----------------------------
            // ----------------------------------------------------------------

            // Button Edit
            $(document).on('click', '.edit-button-table', function() {
                $('#password-panel').hide();
                $('#button-password').show();
                $('#add-alert').empty();
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
                // console.log(id)
                clearInput();
                $.get(`api/user/edit-get/${id}`, (res) => {
                    $("#nama").val(res.data.name);
                    $("#email").val(res.data.email);

                    if (res.data.role == 'pegawai') {
                        $("#role").val("pegawai").attr('selected', 'selected');
                    } else {
                        $("#role").val("admin").attr('selected', 'selected');
                    }

                });

                // Handler Tombol Submit
                $('#submitku').on('click', function(e) {
                    e.preventDefault();
                    $('#submitku').prop('disabled', true);
                    $('#add-alert').empty();


                    let nama = $('#nama').val();
                    let email = $('#email').val();
                    let password = $('#password').val();
                    let konfirmasi_password = $('#konfirmasi-password').val();
                    let roles = $('#role').val();
                    let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                    let validatorEmail;
                    let validatorPassword;
                    let validatorNull;

                    if ($('#password-panel').is(":visible")) {
                        if ((nama == '') ||
                            (email == '') ||
                            (password == '') ||
                            (konfirmasi_password == '') ||
                            (roles == '')
                        ) {
                            validatorNull = false;
                            $('#add-alert').append(`<div class="alert alert-danger mt-3" role="alert">
                                 Form Tidak Bolek Kosong
                                </div>`);
                        } else {
                            validatorNull = true;
                        }

                        if (password != konfirmasi_password) {
                            validatorPassword = false;
                            $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                 Password Harus Sama
                                </div>`);
                        } else {
                            validatorPassword = true;
                        }

                        if (!pattern.test(email)) {
                            validatorEmail = false;
                            $('#add-alert').append(`<div class="alert alert-info mt-3" role="alert">
                                 Email TIdak Valid
                                </div>`);
                        } else {
                            validatorEmail = true;
                        }
                    } else {
                        validatorPassword = true;

                        if ((nama == '') ||
                            (email == '') ||
                            (roles == '')
                        ) {
                            validatorNull = false;
                            $('#add-alert').append(`<div class="alert alert-danger mt-3" role="alert">
                                 Form Tidak Bolek Kosong
                                </div>`);
                        } else {
                            validatorNull = true;
                        }


                        if (!pattern.test(email)) {
                            validatorEmail = false;
                            $('#add-alert').append(`<div class="alert alert-info mt-3" role="alert">
                                 Email TIdak Valid
                                </div>`);
                        } else {
                            validatorEmail = true;
                        }
                    }

                    if (validatorEmail && validatorNull && validatorPassword) {
                        let form = $('#add-form')[0];
                        let data = new FormData(form);
                        data.append('id', id);
                        tambaData(data, '{{ route('api-edit-user') }}', false, 'Update Data');
                    }

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
                        $.get(`user/delete/${id}`, (res) => {
                            $('#modal-hapus').modal('hide');
                            getDataTables('api/user/get');
                        });
                    })
                });
            });


        });

        //Show button password confirmation
        $(document).ready(function() {
            $(document).on('click', '#show-password', function() {
                $('#password-panel').show();
            });
        });

        // Untuk Focused Form
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

        // function get untuk data tables
        const getDataTables = (url) => {
            $(document).ready(function() {
                $('#myTable').DataTable({
                    processing: true,
                    bDestroy: true,
                    serverSide: true,
                    ajax: url,
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
                            data: 'role',
                        },
                        {
                            data: 'action',
                        },
                    ]
                });
            });
        }

        // Clear input
        clearInput = () => {
            $('.form-control')[0].value = '';
            $('.form-control')[1].value = '';
            $('.form-control')[2].value = '';
            $('.form-control')[3].value = '';
            $('.form-control')[4].value = 'pegawai';
        }

        // Function tambah data
        const tambaData = (data, url, clear, text) => {
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
                    $('#add-alert').empty();
                    $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                    ${data.status}
                                </div>`);
                    if (data.code == '02') {
                        clear ? clearInput() : null;
                    }
                    // clearInput();
                    getDataTables('api/user/get');

                },
                error: function(e) {
                    $('#add-alert').append(`<div class="alert alert-warning mt-3" role="alert">
                                    ${e}
                                </div>`);
                }
            });
        }
    </script>
@endpush

@endsection
