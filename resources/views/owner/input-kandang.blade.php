<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">KANDANG</span>
    @endpush

    <div id="card" class="bm-border4 d-flex flex-row justify-content-start align-items-center py-2 w-100 px-5">
        <div><i class="bm-font-96 bi bi-bank"></i></div>
        <div class="bm-font-54 bm-font-bold3 bm-font-semibold ms-5">Input Kandang</div>
    </div>
    <form id="kandangForm" class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="namaKandang" class="w-50">Nama Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="namaKandang" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="tanggalMulai" class="w-50">Tanggal Mulai</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="date" class="form-control-plaintext p-0" id="tanggalMulai" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="idPekerja" class="w-50">Pekerja</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="number" class="form-control-plaintext p-0" id="idPekerja" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="luasKandang" class="w-50">Luas Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="luasKandang" placeholder="...">
                <label>m²</label>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="populasiAwal" class="w-50">Alamat Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="alamat" placeholder="...">
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between w-25 ms-auto mt-5">
            <div class="d-flex flex-row justify-content-end">
                <button id="btn-success-bm" class="btn btn-lg btn-block" type="button" onclick="submitKandangForm()">Tambah</button>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <a id="btn-success-bm" class="btn btn-lg btn-block" href="{{url('/kandang')}}">Kembali</a>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Add an event listener to the 'Tambah' button
            document.getElementById('btn-success-bm').addEventListener('click', function () {
                submitKandangForm();
            });
        });

        function submitKandangForm() {
            // Get the values from input fields
            const namaKandang = document.getElementById('namaKandang').value;
            const tanggalMulai = document.getElementById('tanggalMulai').value;
            const idPekerja = document.getElementById('idPekerja').value;
            const luasKandang = document.getElementById('luasKandang').value;
            const alamat = document.getElementById('alamat').value;

            // Make an HTTP POST request to the kandang endpoint
            const apiUrl = 'http://127.0.0.1:8080/api/owner/kandang';
            const accessToken = localStorage.getItem('access_token');

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${accessToken}`,
                },
                body: JSON.stringify({
                    nama_kandang: namaKandang,
                    id_user: idPekerja,
                    tanggal_mulai: tanggalMulai,
                    luas_kandang: luasKandang,
                    alamat_kandang: alamat,
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('add_kandang Response:', data);

                // Handle the response as needed
                if (data) {
                    // Redirect or perform other actions
                    alert('Kandang successfully created');
                    // Add logic to redirect if needed
                } else {
                    // Handle failure
                    alert('Failed to create kandang. Please check your input.');
                }
            })
            .catch(error => {
                console.error('add_kandang Error:', error);
            });
        }
    </script>
</x-app-layout>
