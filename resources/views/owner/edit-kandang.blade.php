<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">
    
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">KANDANG</span>
    @endpush

    <div id="card" class="bm-border4 d-flex flex-row justify-content-start align-items-center py-2 w-100 px-5">
        <div><i class="bm-font-96 bi bi-bank"></i></div>
        <div class="d-flex flex-column justify-content-between w-50 ms-5">
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Nama Kandang</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <span>Kandang 1</span>
                </div>
            </div>
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Tanggal Mulai</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <span>dd/mm/yyyy</span>
                </div>
            </div>
        </div>
    </div>
    <form id="card" class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Nama Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Tanggal Mulai</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="date" class="form-control-plaintext p-0" id="staticEmail" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Pekerja</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Luas Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail" placeholder="...">
                <label>m²</label>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Populasi Awal</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail" placeholder="...">
                <label>ekor</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between w-25 ms-auto mt-5">
            <div class="d-flex flex-row justify-content-end">
                <button id="btn-success-bm" class="btn btn-lg btn-block" type="submit">Simpan</button>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <a id="btn-success-bm" class="btn btn-lg btn-block" href="{{url('/kandang')}}">Kembali</a>
            </div>
        </div>
    </form>
</x-app-layout>