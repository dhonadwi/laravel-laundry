@extends('layouts.app')

@section('content')
    <div class="card">
        <h5>Tambah Data Paket</h5>
        <div class="card-body">
            <form action="{{ route('simpan-paket') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-4">
                        <label for="nik">Kode Paket</label>
                        <input type="text" name="code" class="form-control" required placeholder="Kode Paket">
                    </div>
                    <div class="form-group col-4">
                        <label for="nik">Nama Paket</label>
                        <input type="text" name="name" class="form-control" required placeholder="Nama Paket">
                    </div>
                    <div class="form-group col-4">
                        <label for="nik">Keterangan</label>
                        <input type="text" name="description" class="form-control" required placeholder="Keterangan">
                    </div>
                    <div class="form-group col-4">
                        <label for="nik">Harga</label>
                        <input type="number" name="price" class="form-control" required placeholder="Harga">
                    </div>
                </div>
                {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
                 <a class="btn btn-success" href="#" data-toggle="modal" data-target="#submitModal">
                    Simpan
                </a>
                    @livewire('modal', [
                        'params' => [
                            'name' => 'submitModal',
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
    async function getUser(id)
    {
        const url = `{{ url('api/user/${id}') }}`
        const findUser = await fetch(url)
        const dataUser = await findUser.json()
        document.querySelector('#name').value = dataUser.user.name
        document.querySelector('#nameHidden').value = dataUser.user.name
        document.querySelector('#departemen').value = dataUser.user.departemen
        document.querySelector('#departemenHidden').value = dataUser.user.departemen
    }

    function cek() {
        const id = document.querySelector('#nik').value;
        const nik = id.split(',');
        if(id){
            getUser(nik[0]);
        } else {
            document.querySelector('#name').value = ""
            document.querySelector('#departemen').value = ""
        }
    }
</script>
    
@endpush

