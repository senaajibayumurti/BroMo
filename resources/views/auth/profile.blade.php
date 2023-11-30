<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">PROFIL</span>
    @endpush

    <div class="d-flex flex-row justify-content-center align-items-center h-100 w-75 m-auto">
        <div id="card" class="d-flex flex-column justify-content-center align-items-center py-2 w-25 h-25 px-5">
            <img data-src="holder.js/96x96?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="96x96" class="rounded" style="width: 128px; height: 128px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2296%22%20height%3D%2296%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2096%2096%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18b8b0ef1fe%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18b8b0ef1fe%22%3E%3Crect%20width%3D%2296%22%20height%3D%2296%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211%22%20y%3D%2216.9%22%3E96x96%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="bm-font-24 bm-font-semibold bm-font-semibold">Dono</div>
        </div>
        <form id="card" class="form-klasifikasi w-100 m-auto p-4">
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Nama</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="Dono">
                </div>
            </div>
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">E-Mail</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="example@mail.com">
                </div>
            </div>
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">No. Telpon</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="staticEmail" value="0851 5758 127">
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex flex-row justify-content-end mb-5 mx-3">
        <button id="btn-success-bm" class="btn btn-lg btn-block" type="submit">Simpan</button>
    </div>
</x-app-layout>