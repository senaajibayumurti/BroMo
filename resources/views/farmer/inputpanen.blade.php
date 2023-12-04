<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">INPUT PANEN</span>
    @endpush
    <form class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-36 bm-font-bold1 text-center mb-5">
            <span class="bm-font-36 bm-font-bold1" >Riwayat Panen</span>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Nama Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail">
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Tanggal Mulai</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="date" class="form-control-plaintext p-0" id="staticEmail">
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Tanggal Panen</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="date" class="form-control-plaintext p-0" id="staticEmail">
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Jumlah Panen</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                <label>ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Total Ayam Hidup</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                <label>ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Total Ayam Mati</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                <label>ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Bobot Total</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                <label>kg</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <button id="btn-danger-bm" class="btn btn-lg btn-block me-4" type="submit">Hapus</button>
            <button id="btn-success-bm" class="btn btn-lg btn-block" type="submit">Simpan</button>
        </div>
    </form>
</x-app-layout>