<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">INPUT DATA</span>
    @endpush
        <form class="form-klasifikasi w-100 m-auto p-4">
            <div class="bm-font-36 bm-font-bold1 text-center mb-5">
                Data Kandang
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Nama Kandang</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="staticEmail">
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Waktu</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="datetime-local" class="form-control-plaintext p-0" id="staticEmail">
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Pakan</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                    <label>kg</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Minum</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                    <label>liter</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Bobot</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                    <label>g/ekor</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Populasi</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                    <label>ekor</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Jumlah Ayam Mati</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                    <label>ekor</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Luas Kandang</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                    <label>m²</label>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-end mt-5">
                <button id="btn-success-bm" class="btn btn-lg btn-block" type="submit">Kembali</button>
            </div>
        </form>
</x-app-layout>