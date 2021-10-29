@extends('mylayout.layout')

@section('sidebar')
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{route('pegawai')}}">
                    <i class="material-icons">dashboard</i>
                    <p>DATA KGB PEGAWAI</p>
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    {{-- Bagin Atas --}}
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="card card-profile">
                <div class="card_image"><img src="https://picsum.photos/500/300/?image=10" width="100%"></div>

                <div class="card-avatar">
                    <a href="javascript:;">
                        <img class="img" src="{{ asset('material/assets/img/profile.jpeg') }}" />
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Sistem Monitoring Kenaikan Gaji Berkala E-KGB - Version 1.0 (28 Oktober 2021)</h6>
                    <h6 class="card-title"></h6>
                    <h6 class="card-title">Developer :</h6>
                    <h6 class="card-category text-gray">Pranata Komputer Ahli Pertama</h6>
                    <h4 class="card-title">Adhitya Pratama, S.Kom</h4>
                    <h4 class="card-title">NIP. 19940715 202012 1 009</h4>
                    <p class="card-description">
                        Instansi : Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Natuna
                    </p>
                    <a href="https://dpupr.natunakab.go.id/" class="btn btn-primary btn-round">Website Dinas</a>
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

{{-- End Bagian Bawah --}}
@push('scriptku')
    <script type="text/javascript">

    </script>
@endpush

@endsection
