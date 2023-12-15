<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">INPUT PANEN</span>
    @endpush
    <form class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-36 bm-font-bold1 text-center mb-5">
            <span class="bm-font-36 bm-font-bold1" >Riwayat Panen</span>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Id Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="text" class="form-control-plaintext p-0" id="idKandang">
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Tanggal Mulai</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="date" class="form-control-plaintext p-0" id="tanggalMulai">
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Tanggal Panen</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="date" class="form-control-plaintext p-0" id="tanggalPanen">
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Jumlah Panen</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="text" class="form-control-plaintext p-0" id="jumlahPanen">
                <label>ekor</label>
            </div>
        </div>
        <!-- <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Total Ayam Hidup</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="text" class="form-control-plaintext p-0" id="staticEmail">
                <label>ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Total Ayam Mati</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                <label>ekor</label>
            </div>
        </div> -->
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Bobot Total</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-between w-50">
                <input type="number" class="form-control-plaintext p-0" id="bobotTotal">
                <label>kg</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <button id="btn-success-bm" class="btn btn-lg btn-block me-4" type="button" onclick="submitPanenForm()">Simpan</button>
            <button id="btn-danger-bm" class="btn btn-lg btn-block" type="submit">Hapus</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add an event listener to the 'Simpan' button
            document.getElementById('btn-success-bm').addEventListener('click', function () {
                submitPanenForm();
            });
        });

        function resetForm() {
            // Add logic to reset form fields if needed
        }

        function submitPanenForm() {
            // Get the values from input fields
            const idKandang = document.getElementById('idKandang').value;
            const tanggalMulai = document.getElementById('tanggalMulai').value;
            const tanggalPanen = document.getElementById('tanggalPanen').value;
            const jumlahPanen = document.getElementById('jumlahPanen').value;
            const bobotTotal = document.getElementById('bobotTotal').value;

            // Make an HTTP POST request to the '/panen' endpoint
            const apiUrl = 'http://127.0.0.1:8080/api/panen';
            const accessToken = localStorage.getItem('access_token');

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${accessToken}`,
                },
                body: JSON.stringify({
                    id_kandang: idKandang,
                    tanggal_mulai: tanggalMulai,
                    tanggal_panen: tanggalPanen,
                    jumlah_panen: jumlahPanen,
                    bobot_total: bobotTotal,
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('panen Response:', data);

                // Handle the response as needed
                if (data) {
                    // Redirect or perform other actions
                    alert('Panen data successfully saved');
                    // Add logic to redirect if needed
                } else {
                    // Handle failure
                    alert('Failed to save panen data. Please check your input.');
                }
            })
            .catch(error => {
                console.error('Panen Error:', error);
            });
        }
    </script>
</x-app-layout>