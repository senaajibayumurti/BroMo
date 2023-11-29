<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">KLASIFIKASI</span>
    @endpush
    <form class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-36 bm-font-bold1 text-center mb-5">Status:
            <span class="bm-font-36 bm-font-bold1" >Abnormal</span>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Nama Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="Kandang 1">
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Kelembaban</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="30">
                <label>%</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Suhu</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="24">
                <label>°c</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Amonia</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="6">
                <label>ppm</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Pakan</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="2,5">
                <label>kg</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Minum</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="3">
                <label>liter</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Bobot</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="800">
                <label>gr/ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Populasi</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="200">
                <label>ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Luas Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="300">
                <label>m²</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <a id="btn-success-bm" class="btn btn-lg btn-block" href="{{url('/forecasting')}}">Kembali</a>
        </div>
    </form>
</x-app-layout>