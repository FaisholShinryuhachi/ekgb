@extends('mylayout.layout')

@section('sidebar')
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item">
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
        <li class="nav-item active">
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
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Data Pengajuan</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pengajuanTable" class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40px">No</th>
                                    <th width="300px">Nomor Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Penanda Tangan</th>
                                    <th>Pegawai</th>
                                    <th width="300px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pengajuan as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nomor_surat }}</td>
                                    <td>{{ $item->tanggal_surat }}</td>
                                    <td>{{ $item->penanda_tangan }}</td>
                                    <td>
                                        <ul class="list-group list-group-flush">
                                            @foreach (json_decode($item->daftar_pegawai) as $pegawaiId)
                                            @php
                                                $pegawai = App\Models\User::find($pegawaiId);
                                            @endphp
                                            @if ($pegawai)
                                            <li class="list-group-item">{{ $loop->iteration }}. {{ $pegawai->name }}</li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                        <td>
                                            <form action="{{ route('pengajuan.destroy', $item->id_pengajuan) }}" method="GET" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">
                                                    <i class="material-icons">delete</i>Hapus
                                                </button>
                                            </form>
                                            <a href="{{ route('pengajuan.suratPengantar', $item->id_pengajuan) }}" class="btn btn-primary btn-sm">
                                                <i class="material-icons">print</i> Print
                                            </a>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPengajuanModal" data-id="{{ $item->id_pengajuan }}">
                                                <i class="material-icons">edit</i> Edit
                                            </button>
                                            
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                                <a href="{{ route('admin.pengajuan.tampilPengajuanKGB') }}">History Pengajuan KGB</a>
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

@section('modal-form-pengajuan')
<!-- Modal Edit Pengajuan -->
<!-- Modal Edit Pengajuan -->
<!-- Modal Edit Pengajuan -->
<div class="modal fade" id="editPengajuanModal" tabindex="-1" role="dialog" aria-labelledby="editPengajuanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPengajuanModalLabel">Edit Pengajuan KGB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditPengajuan" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="edit_nomor_surat" name="nomor_surat" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" id="edit_tanggal_surat" name="tanggal_surat" value="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="edit_penanda_tangan">Penanda Tangan</label>
                            <select class="form-control" id="edit_penanda_tangan" name="penanda_tangan" required>
                                <option value="Drs. H. AGUS SUPARDI, M.Si">Drs. H. AGUS SUPARDI, M.Si</option>
                                <option value="NILA MISDARTIANA, SH, M.A.P">NILA MISDARTIANA, SH, M.A.P</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_daftar_pegawai">Pilih Pegawai:</label>
                        <select class="form-control" id="edit_daftar_pegawai" name="daftar_pegawai[]" multiple required style="height: 150px;">
                            <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
            <script>
                $(document).ready(function() {
                    $('#pengajuanTable').DataTable();
                });

                $('#editPengajuanModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var pengajuanId = button.data('id');

        // Lakukan AJAX request untuk mendapatkan data pengajuan
        $.ajax({
            url: '/pengajuan/' + pengajuanId + '/edit',
            method: 'GET',
            success: function(response) {
                $('#formEditPengajuan').attr('action', '/pengajuan/' + response.pengajuan.id_pengajuan);
                $('#edit_nomor_surat').val(response.pengajuan.nomor_surat);
                $('#edit_tanggal_surat').val(response.pengajuan.tanggal_surat);
                $('#edit_penanda_tangan').val(response.pengajuan.penanda_tangan);

                // Populate select box for daftar pegawai
                var daftarPegawai = JSON.parse(response.pengajuan.daftar_pegawai);
                $('#edit_daftar_pegawai').empty();
                daftarPegawai.forEach(function(pegawaiId) {
                    $('#edit_daftar_pegawai').append('<option value="' + pegawaiId + '" selected>' + pegawaiId + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
            </script>
        </div>
    </div>
</div>
@endsection
