@extends('layouts.app')

@push('addon-style')
    <link href="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
     @if (session()->has('message'))
        <div class="alert alert-success">
        {{ session('message') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <div class="card">
        <h1>Daftar Paket</h1>
        <div class="card-body">
                <a class="btn btn-success mb-3" href="{{ route('tambah-paket') }}">Tambah Paket</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableBarang" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Paket</th>
                            <th>Nama Paket</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('edit-paket',$item->id) }}">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>                  
                    @endforeach 
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ url('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
        $("#dataTableBarang").DataTable({
        ordering: true,
    });
});
    </script>
@endpush