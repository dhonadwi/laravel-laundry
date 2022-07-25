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
                <th colspan="4">{{ $transaction->code }}</th>
              </tr>
              <tr>
                <th>Nama</th>
                <td colspan="4">{{ $transaction->name }}</td>
              </tr>
              <tr>
                <th>No Handphone</th>
                <td colspan="4">{{ $transaction->hp }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td colspan="4">{{ $transaction->address }}</td>
              </tr>
              <tr>
                <th>Tanggal Cuci</th>
                <td colspan="4">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y H:i:s') }}</td>
              </tr>
              <tr>
                <th>Tanggal Selesai</th>
                {{-- {{ \Carbon\Carbon::parse($transaction->finish_date)->format('d-m-Y H:i:s') }} --}}
                <td colspan="4">{{ $transaction->finish_date==NULL ? '-' : \Carbon\Carbon::parse($transaction->finish_date)->format('d-m-Y H:i:s') }}</td>
              </tr>
              <tr>
                <th>Tanggal Ambil</th>
                <td colspan="4">{{ $transaction->pick_up_date==NULL ? '-' : \Carbon\Carbon::parse($transaction->pick_up_date)->format('d-m-Y H:i:s') }}</td>
              </tr>
              <tr>
                <th>Total</th>
                <td colspan="4">@rupiah($transaction->total) </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-body">
          <h4>Detail Barang</h4>
          <table class="table" id="dataTableDetail">
              <thead>
                  <th>Nama Paket</th>
                  <th>Harga</th>
                  <th>Berat (Kg)</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
              </thead>
              <tbody>
                @foreach ($transaction->details as $detail)
                  <tr>
                      <td>{{ $detail->package_name }}</td>
                      <td>@rupiah($detail->package_price)</td>
                      <td>{{ $detail->berat }}</td>
                      <td>@rupiah($detail->jumlah)</td>
                      <td>{{ $detail->description }}</td>
                  </tr>
              @endforeach          
              </tbody>
          </table>
        </div>
      </div>
      <div class="card">
    </div>

      <a href="{{ route('transaksi') }}" class="btn btn-danger mt-3 mb-3">Kembali</a>
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