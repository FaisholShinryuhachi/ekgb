@extends('mylayout.layout')

@section('sidebar')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active ">
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
            <li class="nav-item ">
                <a class="nav-link" href="{{route('user-table')}}">
                    <i class="material-icons">switch_account</i>
                    <p>User</p>
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    {{-- Bagin Atas --}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <p class="card-category">Deadline</p>
                    <div id="deadline">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i>
                        <a href="javascript:;">Get More Space...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <p class="card-category">Diproses</p>
                    <div id="proses">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i>
                        <a href="javascript:;">Get More Space...</a>
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
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Employees Stats</h4>
                    <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
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
    </div>
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
                                            <td>${res.data[i].kgb_terakhir}</td>
                                            <td>${res.data[i].deadline}</td>
                                        </tr>
                            `)
                    });
                });
            });
        </script>
    @endpush

@endsection