{{-- If your happiness depends on money, you will never be happy with yourself. --}}
<div>
    @foreach ($inputs as $key => $value)
    <div class="row">
            <div class="col-1">
                {{ $value }}
            </div>
            <div class="col-2">
                <select id="nama_paket_{{ $value }}" class="form-control nama_paket" name="package_name[]" onchange="searchItem({{ $value }})" required>
                    <option value="" selected disabled>Pilih</option>
                    @foreach ($packages as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <input type="number" name="package_price[]" id="package_price{{ $value }}" class="form-control" readonly>
            </div>
            <div class="col-2">
                <input type="number" id="berat{{ $value }}" class="form-control" placeholder="Berat (KG)" onkeyup="hitung({{ $value }})" required>
            </div>
            <div class="col-2">
                <input type="number" id="jumlah{{ $value }}" name="jumlah" class="form-control"  value="" required
                placeholder="Jumlah" readonly
                >
            </div>
            <div class="col">
                {{-- <input type="text" class="form-control" name="description[]" id="description{{ $value }}" placeholder="keterangan" required> --}}
                <textarea  name="description[]" id="description{{ $value }}" cols="30" rows="3" class="form-control" required></textarea>
            </div>
            <div class="col-1">
                <button class="btn btn-danger mb-3" wire:click.prevent="remove({{$key}})">-</i></button>
            </div>
        </div>
        @endforeach
        <div class="row align-items-right">
            <div class="col-12 ps-0">
                    <button type="button" class="btn btn-primary float-right mr-4" wire:click.prevent="add({{ $i }})">+</button>
            </div>
        </div>
</div>

@push('prepend-script')
<script>
    async function getPackage(idItem, id)
    {
        const url = `{{ url('api/v1/paket/${id}') }}`
        const findItem = await fetch(url)
        const dataItem = await findItem.json()
        document.querySelector(`#package_price${idItem}`).value = dataItem.data.price
        document.querySelector(`#description${idItem}`).value = dataItem.data.description
        // document.querySelector(`#tersedia${idBarang}`).value = dataItem.item.tersedia
        // document.querySelector(`#satuan${idBarang}`).value = dataItem.item.satuan
        
        document.querySelector(`#total`).value = 123
        console.log(dataItem);
    }

    function searchItem(idItem)
    {
        const options = document.querySelector(`#nama_paket_${idItem}`).value;
        // const id = options.split("_")
        getPackage(idItem,options);
        // console.log(options);
    }

    function hitung(idItem) 
    {
        let price = document.querySelector('#package_price')
    }
</script>
    
@endpush