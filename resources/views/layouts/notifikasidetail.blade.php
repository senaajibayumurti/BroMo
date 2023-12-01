<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">NOTIFIKASI</span>
    @endpush
    {{-- LIST CARD PEKERJA  --}}
    <div class="my-3 p-3 bg-white rounded box-shadow mx-5">
        {{-- CARD PEKERJA  --}}
        <div id="card" class="media text-muted d-flex flex-row justify-content-between p-3 m-3">
            <div class="media-body pb-3 mb-0 small lh-125 me-auto">
                <div class="bm-font-24 d-flex flex-column justify-content-between align-items-start w-100">
                    <span class="bm-font-36 bm-font-bold1 bm-font-clr3 text-gray-dark">
                        Prediksi ayam mati lebih dari 10
                    </span>
                    <span class="bm-font-16 d-block">
                        Diperkirakan ayam mati lebih dari 10, penyebab ayam mati diperkirakan adalah
                        peningkatan kadar amonia dikandang yang melebihi batas normal atau aman
                        yaitu 6ppm. Suhu didalam kandang juga dinyatakan dalam keadaan waspada  
                        yaitu 25°c. Kelembaban udara kandang masih aman yaitu 60%.
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>