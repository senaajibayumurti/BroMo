<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">INPUT DATA</span>
    @endpush
        <form class="form-klasifikasi w-100 m-auto p-4">
            <div class="bm-font-36 bm-font-bold1 text-center mb-5">
                Data Kandang
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">ID Kandang</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="id_kandang">
                </div>
            </div>
            <!-- <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Waktu</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="datetime-local" class="form-control-plaintext p-0" id="staticEmail">
                </div>
            </div> -->
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Pakan</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="pakan">
                    <label>kg</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Minum</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="minum">
                    <label>liter</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Bobot</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="bobot">
                    <label>g/ekor</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Populasi</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="populasi">
                    <label>ekor</label>
                </div>
            </div>
            <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Jumlah Ayam Mati</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="jumlah_kematian">
                    <label>ekor</label>
                </div>
            </div>
            <!-- <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                <label for="Tanggal" class="w-50">Luas Kandang</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="number" class="form-control-plaintext p-0" id="staticEmail">
                    <label>m²</label>
                </div>
            </div> -->
            <div class="d-flex flex-row justify-content-end mt-5">
            <button id="btn-success-bm" class="btn btn-lg btn-block" type="button" onclick="submitDailyForm()">Simpan</button>
                <button id="btn-warning-bm" class="btn btn-danger text-white ms-2 btn-lg btn-block" type="button">Kembali</button>
            </div>
        </form>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add an event listener to the 'Simpan' button
            document.getElementById('btn-success-bm').addEventListener('click', function () {
                submitDailyForm();
            });
        });

        function resetForm() {
            // Add logic to reset form fields if needed
        }

        function submitDailyForm() {
            // Get the values from input fields
            const idKandang = document.getElementById('id_kandang').value;
            const pakan = document.getElementById('pakan').value;
            const minum = document.getElementById('minum').value;
            const bobot = document.getElementById('bobot').value;
            const populasi = document.getElementById('populasi').value;
            const jumlahKematian = document.getElementById('jumlah_kematian').value;

            // Make an HTTP POST request to the '/panen' endpoint
            const apiUrl = 'http://127.0.0.1:8080/api/anak-kandang/data-kandang';
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
                    pakan: pakan,
                    minum: minum,
                    bobot: bobot,
                    populasi: populasi,
                    jumlah_kematian: jumlahKematian,
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('daily Response:', data);

                // Handle the response as needed
                if (data.message === "Data Kandang created successfully") {
                    // Redirect or perform other actions
                    alert('daily data successfully saved');
                    // Add logic to redirect if needed
                } else {
                    // Handle failure
                    alert(data.error.message);
                }
            })
            .catch(error => {
                console.error('daily Error:', error);
            });
        }
    </script>
</x-app-layout>