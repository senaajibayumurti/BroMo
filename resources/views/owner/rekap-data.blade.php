<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">REKAP DATA</span>
    @endpush
    <form action="" method="get" id="card" class="ms-auto">
        <input type="text"  class="bm-border4 p-2" name="cari-data-kandang" id="card" placeholder="Cari ...">
    </form>
    <table class="table table-bordered border-black mt-3">
        <thead class="table-success text-center">
            <tr>
                <th>No</th>
                <th>Kandang</th>
                <th>Tanggal</th>
                <th>Buka</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>Kandang 1</th>
                <th>dd/mm/yyyy</th>
                <th><button id="btn-success-bm" class="btn btn-lg btn-block w-100" type="submit">
                    Buka
                </button></th>
                <th class="d-flex flex-row justify-content-center align-items-center">
                    <button id="btn-success-bm" class="btn btn-lg btn-block w-100 me-4" type="submit">
                        Unduh
                    </button>
                    <button id="btn-danger-bm" class="btn btn-lg btn-block w-100" type="submit">
                        Hapus
                    </button>
                </th>
            </tr>
        </tbody>
    </table>
</x-app-layout>