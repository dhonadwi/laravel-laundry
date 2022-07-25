@extends('layouts.app')

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
        <h5>Tambah Transaksi</h5>
            <div class="card-body">
            <form action="{{ route('simpan-transaksi') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nik">Nama</label>
                        <input type="text" name="name" class="form-control" required placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group col-6">
                        <label for="nik">Nomor HP</label>
                        <input type="tel" name="hp" class="form-control" required placeholder="Nomor HP">
                    </div>
                    <div class="form-group col-6">
                        <label for="nik">Alamat</label>
                        <textarea name="address" id="" cols="30" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="form-group col-6">
                        <label for="nik">Total Harga</label>
                        <input type="text" name="total" id="total" required readonly class="form-control" value="@rupiah(0)">
                    </div>
                </div>
                <hr class="sidebar-divider">
                <h5>Pilih Paket</h5>
                <div class="table-responsive">
                    <div class="table">
                        <div class="row mb-3">
                            <div class="col-1">#</div>
                            <div class="col-2">Nama Paket</div>
                            <div class="col-2">Harga</div>
                            <div class="col-2">Berat (KG)</div>
                            <div class="col-2">Jumlah</div>
                            <div class="col">Keterangan</div>
                            <div class="col-1">*</div>
                        </div>
                        <div>
                            @livewire('paket-transaksi')
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="form-group col-6">
                        {{-- <label for="nik">Total Bayar</label> --}}
                        <input type="text" name="bayar" class="form-control" required placeholder="Total Bayar">
                    </div>
                    <div class="form-group col-6">
                        <a class="btn btn-success form-control" href="#" data-toggle="modal" data-target="#transaksiModal">
                            Simpan
                        </a>
                    </div>
                </div>
                    @livewire('modal', [
                        'params' => [
                            'name' => 'transaksiModal',
                            'title' => 'Apakah data sudah sesuai?',
                            'description' => 'Tekan tombol Yes untuk memproses.'
                        ]
                    ])
            </form>
        </div>
    </div>
@endsection



@push('addon-script')
<script>
    async function getPaket(id)
    {
        // const url = `{{ url('api/user/${id}') }}`
        // const findUser = await fetch(url)
        // const dataUser = await findUser.json()
        // document.querySelector('#name').value = dataUser.user.name
        // document.querySelector('#nameHidden').value = dataUser.user.name
        // document.querySelector('#departemen').value = dataUser.user.departemen
        // document.querySelector('#departemenHidden').value = dataUser.user.departemen
    }

    function cek() {
        // const id = document.querySelector('#nik').value;
        // const nik = id.split(',');
        // if(id){
        //     getPaket(nik[0]);
        // } else {
        //     document.querySelector('#name').value = ""
        //     document.querySelector('#departemen').value = ""
        // }
    }
</script>
    
@endpush

