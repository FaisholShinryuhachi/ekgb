<!doctype html>
<html lang="en">
  <head>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


    
    <title>Sikab</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SIKAB</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('tampil') }}">Data</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Tentang</a>
              </li>
            </ul>
            <h5>Hai, <strong>{{ Auth::user()->name }}&nbsp;&nbsp;</strong></h5>
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </nav>
    <center><h1>SISTEM KGB</h1></center>
    
    <div class="container">
        <div class="col-md-16 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Data Pegawai</h3>
                </div>
                <div class="card-body">
                
                    
                    <p> <a href="{{ route('tampil.create') }}" class="btn btn-primary"> Entry Data Baru </a> </p>
                    <table id="tabelku" class="table">


                        

                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Pangkat</th>
                                <th>Last KGB</th>
                                <th>Deadline</th>
                                
                                <th>File</th>
                                <th>Update</th>
                                <th width="160px">Action</th>
                            </tr>
                        </thead>
                        <body>
                          

                           
                            @foreach ($kgb as $index=> $data )
                
                            <tr>
                                <td scope="row">{{ $index+1 }}</td>
                                <td>{{ $data->nip }} </td>
                                <td>{{ $data->nama_pegawai }} </td>
                                <td>{{ $data->jabatan }} </td>
                                <td>{{ $data->pangkat }} </td>
                                <td>{{ date('d-M-Y',strtotime($data->kgb_terakhir)) }} </td>
                                <td>{{ 'Rumus' }} </td>
                                <td><a href="{{ asset('storage/gambar/' .$data->pendukung) }}">Data </a></td>
                                <td>{{ date('d-M-Y',strtotime($data->updated_at)) }} </td>
                                <td><a href="{{ route('tampil.edit',$data->id) }}" class="btn btn-success">Ubah</a>
                                    <a href="#" class="btn btn-danger">Hapus</a> </td>
                            </tr>
                        @endforeach
                       
                        </body>
                    </table>

                </div>
            </div>
        </div>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  
    </script>
 
  </body>
</html>