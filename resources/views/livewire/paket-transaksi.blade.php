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
                        <option value="{{ $item->id.','.$item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <input type="number" name="package_price[]" id="package_price{{ $value }}" class="form-control" readonly>
            </div>
            <div class="col-2">
                <input type="number" id="berat{{ $value }}" name="berat[]" class="form-control" placeholder="Berat (KG)" onkeyup="hitung({{ $value }})" required value="0" step=".1" >
            </div>
            <div class="col-2">
                <input type="number" id="jumlah{{ $value }}" name="jumlah[]" class="form-control jumlah"  value="0" required
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

        hitung(idItem)
        // console.log(dataItem);
    }

    function searchItem(idItem)
    {
        const options = document.querySelector(`#nama_paket_${idItem}`).value;
        const id = options.split(",")
        console.log(id);
        getPackage(idItem,id[0]);
        // console.log(options);
    }

    function hitung(idItem) 
    {
        let price = document.querySelector(`#package_price${idItem}`)
        let berat = document.querySelector(`#berat${idItem}`)
        let jumlah = document.querySelector(`#jumlah${idItem}`)
        let allJumlah = document.querySelectorAll('.jumlah')
        let total =  document.querySelector(`#total`);

        // console.log(price.value);
        // console.log(berat.value);
        
        let hasil = parseInt(price.value) * berat.value;
        jumlah.value = hasil

        let berapa = 0;
        allJumlah.forEach(el => {
            berapa += parseInt(el.value) 
            // console.log(el.value)
            // total.value = berapa
        });
        // console.log(berapa)
        total.value = berapa
    }
</script>
    
@endpush