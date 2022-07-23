<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link href="{{ url('assets/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
</head>

<body>
<p class="font-italic">Tanggal Cetak : {{ $transaction->tgl_cetak }}</p>
<div class="container">
    <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
              <tr>
                <th>Kode</th>
                <th colspan="4">{{ $transaction->code_transaction }}</th>
              </tr>
              <tr>
                <th>NIK</th>
                <td colspan="4">{{ $transaction->nik }}</td>
              </tr>
              <tr>
                <th>Nama</th>
                <td colspan="4">{{ $transaction->name }}</td>
              </tr>
              <tr>
                <th>Departemen</th>
                <td colspan="4">{{ $transaction->departemen }}</td>
              </tr>
              <tr>
                <th>Tanggal Permintaan</th>
                <td colspan="4">{{ \Carbon\Carbon::parse($transaction->tanggal)->format('d-m-Y H:i:s') }}</td>
              </tr>
              <tr>
                <th>Tanggal Input</th>
                <td colspan="4">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y H:i:s') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-body">
          <h4>Detail Barang</h4>
          <table class="table" id="dataTableDetail">
              <thead>
                  <th>Nama Barang</th>
                  <th>Lokasi</th>
                  <th>Kuantiti</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
              </thead>
              <tbody>
                  @foreach ($transaction->details as $detail)
                  <tr>
                      <td>{{ $detail->nama_barang }}</td>
                      <td>{{ $detail->lokasi }}</td>
                      <td>{{ $detail->kuantiti }}</td>
                      <td>{{ $detail->satuan }}</td>
                      <td>{{ $detail->keterangan }}</td>
                  </tr>
              @endforeach          
              </tbody>
          </table>
        </div>
      </div>
      <div class="card">
    </div>
</div>
</html>