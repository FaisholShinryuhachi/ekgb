@extends('pegawai.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>E-KGB</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pegawai.create') }}">New Data Pegawai</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Pangkat</th>
            <th>TMT KGB Terakhir</th>
            <th>KGB Selanjutnya</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pegawai as $kgb)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $kgb->nip }}</td>
            <td>{{ $kgb->nama }}</td>
            <td>{{ $kgb->jabatan }}</td>
            <td>{{ $kgb->pangkat }}</td>
            <td>{{ $kgb->kgb_terakhir }}</td>
            <td>{{ $kgb->status }}</td>
            <td>
                <form action="{{ route('pegawai.destroy',$kgb->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pegawai.show',$kgb->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('pegawai.edit',$kgb->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $pegawai->links() !!}
      
@endsection