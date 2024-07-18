<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial';
            font-size: 17px;
            margin: 20px;
        }
        .kop-surat img {
            width: 100%;
            height: auto;
            margin-left: 2px;
        }
        .content {
            margin-top: 10px;
        }
        .content h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        .content p, .content ul {
            margin-left: 40px;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .date-location {
            text-align: right;
            margin-right: 40px;
        }
        .tujuan-location {
            text-align: left;
            margin-right: 40px;
            margin-bottom: 0px;
        }
        .surat-pengantar {
            text-align: center;
            margin-bottom: 50px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 93%;
            margin-left: 20px;
            margin-bottom: 100px;
        }

        th, td {
            border: 1px solid #000000;
            padding: 8px;
            vertical-align: top; /* Align text to the top */
        }

        th {
            text-align: center; /* Center align text in header */
        }

        td {
            text-align: justify;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .no-bullets {
            list-style-type: none;
            padding: 0;
        }
        .ttd_kadis {
            float: right;  /* Memindahkan div ke pojok kanan */
            text-align: left;  /* Teks rata kiri */
            margin-right: 40px;
            width: 300px; /* Sesuaikan lebar sesuai kebutuhan Anda */
        }
        .ttd_sekre {
            float: right;  /* Memindahkan div ke pojok kanan */
            text-align: left;  /* Teks rata kiri */
            margin-right: 40px;
            width: 300px; /* Sesuaikan lebar sesuai kebutuhan Anda */
        }
        .ttd_penerima {
            float: left;  /* Memindahkan div ke pojok kanan */
            text-align: left;  /* Teks rata kiri */
            margin-right: 40px;
            width: 300px; /* Sesuaikan lebar sesuai kebutuhan Anda */
        }
    </style>

    <title>Surat Pengantar</title>
</head>
<body>
    <img src="{{ asset('/storage/gambar/kop.png') }}" alt="Logo" width="900" height="150">
    <div class="content">
        <div class="date-location">
            <p>Ranai, {{ \Carbon\Carbon::parse($pengajuan->tanggal_surat)->isoFormat('D MMMM YYYY') }}</p>
        </div>
        <div class="tujuan-location">
            &nbsp;&nbsp; Yth. Kepala Badan Kepegawaian dan Pengembangan 
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sumber Daya Manusia (BKPSDM) Kab. Natuna</p>
            <p>&nbsp;&nbsp;di -</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat</p>
        </div>
        <h3>SURAT PENGANTAR</h3>
        <div class="surat-pengantar">
            Nomor: {{ $pengajuan->nomor_surat }}
        </div>
        <table>
            <tr>
                <th width="60px">No</th>
                <th width="550px">Jenis Yang Dikirim</th>
                <th width="90px">Banyaknya</th>
                <th width="550px">Keterangan</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Bersama ini disampaikan Usulan Kenaikan Gaji Berkala Dinas Pekerjaan Umum dan Penataan Ruang Kab. Natuna atas nama :
                    <ul class="no-bullets">
                        @foreach (json_decode($pengajuan->daftar_pegawai) as $index => $pegawaiId)
                        @php
                            $pegawai = App\Models\User::find($pegawaiId); // Ganti sesuai dengan model pegawai Anda
                        @endphp
                        @if ($pegawai)
                            <li>{{ $index + 1 }}. {{ $pegawai->name }}</li>
                        @endif
                    @endforeach
                    </ul>
                </td>
                <td>2 Rangkap</td>
                <td>Demikian disampaikan untuk dapat diproses, atas perhatiannya diucapkan terimakasih.</td>
            </tr>
        </table>

        <div class="ttd_penerima">
            <p>Diterima tanggal,
            <br>Penerima
            <br>Nama Jabatan:
            <br><br><br><br>
            <br>Nama :
            <br>Pangkat/Gol:
            <br>NIP :
        </div>

 @if ($pengajuan->penanda_tangan == 'Drs. H. AGUS SUPARDI, M.Si')
    <div class="ttd_kadis">
        <p>Pengirim
        <br>Kepala Dinas
        <br><br><br><br><br>
        <br>{{ $pengajuan->penanda_tangan }}
        <br>Pembina Utama Muda/IV.C
        <br>NIP. 197004191990031003
    </div>
    @else
    <div class="ttd_sekre">
        <p>Pengirim
        <br>an. Kepala Dinas
        <br>Sekretaris
        <br><br><br><br><br>
        <br>{{ $pengajuan->penanda_tangan }}
        <br>Pembina Tk. I/IV.b
        <br>NIP. 19730614 200012 2 004
    </div>
    @endif
    </div>

</body>
</html>
