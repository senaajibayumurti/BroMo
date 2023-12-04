<x-app-layout>
    <link rel="stylesheet" href="/css/forecasting.css">
    <link rel="stylesheet" href="/css/chart.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">FORECASTING</span>
    @endpush
    <div id="info" class="d-flex flex-column justify-content-around h-100">
        <div class="d-flex flex-row justify-content-between h-auto">
            <div id="card" class="d-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div class="pie" >25%</div>
                <div class="bm-font-24 bm-font-semibold">Suhu</div>
            </div>
            <div id="card" class="d-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div class="pie" style="--p:50">50%</div>
                <div class="bm-font-24 bm-font-semibold">Kelembaban</div>
            </div>
            <div id="card" class="d-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div class="pie" style="--p:100">100%</div>
                <div class="bm-font-24 bm-font-semibold">Amonia</div>
            </div>
        </div>
        <!-- INFO FORECASTING -->
        <div class="d-flex flex-row align-items-center">
            <div id="card" class="bm-border1 d-inline-flex flex-row me-5">
                <div class="d-inline-flex flex-column justify-content-between align-items-center p-2">
                    <div class="d-flex flex-column justify-content-between p-3">
                        <div class="bm-font-16 bm-font-bold1">Pilih Tanggal:</div>
                        <div class="d-inline-flex flex-row align-items-center py-2">
                            <i class="bm-font-24 bi bi-calendar"></i>
                            <span class="bm-font-24 px-3">31 Oktober 2023</span>
                        </div>
                        <div class="d-inline-flex flex-row align-items-center py-2">
                            <i class="bm-font-24 bi bi-clock"></i>
                            <span class="bm-font-24 px-3">07.00</span>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex flex-column justify-content-between align-items-center p-2">
                    <div class="d-flex flex-column justify-content-between p-3">
                        <div class="bm-font-16 bm-font-bold1">Prediksi ayam mati:</div>
                        <p class="bm-font-36 bm-font-bold2"><span class="bm-font-bold2">10</span> ekor</p>
                    </div>
                </div>
            </div>
            <div>
                <a id="btn-success-bm" class="btn btn-lg btn-block w-100" href="{{url('/forecasting/klasifikasi')}}">Klasifikasi Detail</a>
            </div>
        </div>
    </div>
</x-app-layout>