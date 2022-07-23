@extends('layouts.app')

@push('addon-style')
    <link href="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    @php
      $encrypted = Crypt::encrypt($transaction->id);
    @endphp
      <a href="{{ route('cetak-pdf', $encrypted)  }}" class="btn btn-primary mb-3">Cetak</a>
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

      <a href="{{ route('histori-request') }}" class="btn btn-danger mt-3 mb-3">Kembali</a>
@endsection

@push('addon-script')
    <script src="{{ url('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
        $("#dataTableDetail").DataTable({
        ordering: true,
    });
});
    </script>
@endpush