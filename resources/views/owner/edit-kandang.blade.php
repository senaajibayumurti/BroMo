<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">KANDANG</span>
    @endpush

    <div id="card" class="bm-border4 d-flex flex-row justify-content-start align-items-center py-2 w-100 px-5">
        <div><i class="bm-font-96 bi bi-bank"></i></div>
        <div class="d-flex flex-column justify-content-between w-100 ms-5">
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Nama Kandang</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <span id="namaKandangSpan">Kandang 1</span>
                </div>
            </div>
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Alamat Kandang</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <span id="alamatKandangSpan"></span>
                </div>
            </div>
        </div>
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
            <label for="tanggalMulai" class="w-50">Alamat Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="alamatKandang" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="idPekerja" class="w-50">Pekerja</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="text" class="form-control-plaintext p-0" id="idPekerja" placeholder="...">
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="luasKandang" class="w-50">Luas Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="number" class="form-control-plaintext p-0" id="luasKandang" placeholder="...">
                <label>m²</label>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="tanggal_mulai" class="w-50">Tanggal Mulai</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input type="date" class="form-control-plaintext p-0" id="tanggal_mulai" placeholder="...">
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between w-25 ms-auto mt-5">
            <div class="d-flex flex-row justify-content-end">
                <button id="btn-success-bm" class="btn btn-lg btn-block" type="button" onclick="submitEditKandangForm()">Simpan</button>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <a id="btn-success-bm" class="btn btn-lg btn-block" href="{{url('/kandang')}}">Kembali</a>
            </div>
        </div>
    </form>

    <!-- ... Your existing code ... -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Call a function to populate form data (replace with actual data)
            const idKandang = localStorage.getItem('search');
            fetchKandangData(idKandang);
            
            // Add an event listener to the 'Simpan' button
            document.getElementById('btn-success-bm').addEventListener('click', function () {
                submitEditKandangForm();
            });
        });

        function submitEditKandangForm() {
            // Get the values from input fields
            const namaKandang = document.getElementById('namaKandang').value;
            const alamatKandang = document.getElementById('alamatKandang').value;
            const tanggal_mulai = document.getElementById('tanggal_mulai').value;
            const idPekerja = document.getElementById('idPekerja').value;
            const luasKandang = document.getElementById('luasKandang').value;
            // Add similar lines for other form fields

            const idKandang = localStorage.getItem('kandang_id');
            console.log("id_2", idKandang)

            console.log("Data to be sent:", {
                nama_kandang: namaKandang,
                alamat_kandang: alamatKandang,
                tanggal_mulai: tanggal_mulai,
                id_user: idPekerja,
                luas_kandang: luasKandang,
                // Add similar lines for other form fields
            });

            // Make an HTTP PUT or PATCH request to the kandang endpoint with the updated data
            const apiUrl = `http://127.0.0.1:8080/api/owner/kandang/${idKandang}`;
            console.log("api", apiUrl)
            const accessToken = localStorage.getItem('access_token');

            fetch(apiUrl, {
                method: 'PATCH', // or 'PATCH' depending on your API
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${accessToken}`,
                },
                body: JSON.stringify({
                    nama_kandang: namaKandang,
                    alamat_kandang: alamatKandang,
                    tanggal_mulai: tanggal_mulai,
                    id_user: idPekerja,
                    luas_kandang: luasKandang,
                    // Add similar lines for other form fields
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('edit_kandang Response:', data);

                // Handle the response as needed
                if (!data.error) {
                    // Redirect or perform other actions
                    alert('Kandang successfully updated');
                    // Add logic to redirect if needed
                } else {
                    // Handle failure
                    alert('Failed to update kandang. Please check your input.');
                }
            })
            .catch(error => {
                console.error('edit_kandang Error:', error);
            });
        }
        function fetchKandangData(kandangId) {
            const apiUrl = `http://127.0.0.1:8080/api/kandang/${kandangId}`; // Update with your actual endpoint
            const accessToken = localStorage.getItem('access_token');

            fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${accessToken}`,
                    },
                })
                .then(response => response.json())
                .then(data => {

                    console.log('Kandang Data:', data);

                    document.getElementById('namaKandangSpan').innerHTML = data.data.nama_kandang;
                    document.getElementById('alamatKandangSpan').innerHTML = data.data.alamat_kandang;

                    document.getElementById('namaKandang').value = data.data.nama_kandang;
                    document.getElementById('luasKandang').value = data.data.luas_kandang;
                    document.getElementById('tanggal_mulai').value = data.data.tanggal_mulai;
                    document.getElementById('idPekerja').value = data.data.id_user;
                    document.getElementById('alamatKandang').value = data.data.alamat_kandang;

                })
                .catch(error => {
                    console.error('Fetch Kandang Data Error:', error);
                });
        }
    </script>

<!-- ... Your existing code ... -->

</x-app-layout>
