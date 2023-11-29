<x-app-layout>
    <link rel="stylesheet" href="/css/kandang-switch.css">
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">KANDANG</span>
    @endpush
    
    <div id="switch" >
        <div id="switch-bg" ></div>
        <button id="switch-btn" onclick="leftClick()">Aktif</button>
        <button id="switch-btn" onclick="rightClick()">Rehat</button>
    </div>
    <form action="" method="get" id="card" class="ms-auto">
        <input type="text"  class="bm-border4 p-2" name="kata" id="card" placeholder="Cari Kandang">
    </form>
    {{-- LIST CARD KANDANG --}}
    <div class="d-inline-flex flex-column justify-content-start align-items-center">
        {{-- CARD KANDANG  --}}
        <form id="card" class="bm-border1 form-klasifikasi w-75 my-4 p-4">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-center">
                    <div class="bm-font-96 bm-font-bold1 bi bi-bank text-center"></div>
                    <a class="bm-font-24 bm-font-clr6" href="{{url('/kandang/edit-kandang')}}">Edit Kandang</a>
                </div>
                <div class="d-flex flex-column justify-content-around w-75">
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Nama Kandang</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span>Kandang 1</span>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Tanggal Mulai</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span>dd/mm/yyyy</span>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Pekerja</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span>Dono</span>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Luas Kandang</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span>300</span>
                            <label>m²</label>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Populasi Awal</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span>200</span>
                            <label>ekor</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <button id="btn-success-bm" class="btn btn-lg btn-block" type="submit">Rehat</button>
            </div>
        </form>
        {{-- CARD KANDANG  --}}
    </div>
    {{-- LIST CARD KANDANG --}}
    <a id="tambah-kandang" class="bm-font-36 bm-font-bold2 btn btn-lg btn-block" type="button" href="{{url('/kandang/tambah-kandang')}}">+</a>
    <script src="/js/kandang-switch.js"></script>
</x-app-layout>