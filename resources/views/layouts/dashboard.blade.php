<x-app-layout>
    <div class="wrapper d-flex align-items-stretch vh-100">
        <div class="d-flex flex-column justify-content-start w-100">
            <div class="bm-font-clr3 bm-font-bold3 bm-font-36 px-5">BAHAYA</div>
        <div id="info" class="d-flex flex-column justify-content-around h-75 px-5">
            <div id="info1" class="d-flex flex-row justify-content-between">
                <div id="card" class="bm-border2 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                    <div><i class="bm-font-96 bi bi-thermometer"></i></div>
                    <div class="bm-font-16 bm-font-semibold bm-font-clr2">Suhu</div>
                    <div class="bm-font-24 bm-font-semibold bm-font-clr2">{-°C}</div>
                </div>
                <div id="card" class="bm-border1 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                    <div><i class="bm-font-96 bi bi-droplet-half"></i></div>
                    <div class="bm-font-16 bm-font-semibold bm-font-clr1">Kelembaban</div>
                    <div class="bm-font-24 bm-font-semibold bm-font-clr1">{-%}</div>
                </div>
                <div id="card" class="bm-border3 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                    <div><i class="bm-font-96 bi bi-virus"></i></div>
                    <div class="bm-font-16 bm-font-semibold bm-font-clr3">Amonia</div>
                    <div class="bm-font-24 bm-font-semibold bm-font-clr3">{-%}</div>
                </div>
            </div>
            <!-- INFO LAINNYA -->
            <div id="info2" class="d-flex flex-row justify-content-between">
                <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                    <div class="bm-font-16 bm-font-semibold">Luas</div>
                    <div><i class="bm-font-54 bi bi-bank2"></i></div>
                    <div class="bm-font-24 bm-font-semibold">{-m²}</div>
                </div>
                <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                    <div class="bm-font-16 bm-font-semibold">Populasi</div>
                    <div><i class="bm-font-54 bi bi-file-bar-graph-fill"></i></div>
                    <div class="bm-font-24 bm-font-semibold">{-ekor}</div>
                </div>
                <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                    <div class="bm-font-16 bm-font-semibold">Bobot</div>
                    <div><i class="bm-font-54 bi bi-file-arrow-down-fill"></i></div>
                    <div class="bm-font-24 bm-font-semibold">{-gr/ekor}</div>
                </div>
                <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                    <div class="bm-font-16 bm-font-semibold">Pakan & Minum</div>
                    <div><i class="bm-font-54 bi bi-basket2-fill"></i></div>
                    <div class="bm-font-24 bm-font-semibold">{-kg}</div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>