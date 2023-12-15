<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span id="nav" class="bm-font-clr1 bm-font-bold3 bm-font-36">REKAP DATA</span>
    @endpush
    <form id="card" class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="kandang"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Tanggal</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="date"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Pakan</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="pakan"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Minum</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="minum"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Bobot</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="bobot"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Populasi</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="populasi"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Jumlah Kematian</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="jumlah_kematian"></span>
            </div>
        </div>
    </form>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const levelAcc = localStorage.getItem('level');
            if (levelAcc != "owner") {
                
            }

            const idData = localStorage.getItem('dailyDataId');
            console.log("id", idData);

            const apiUrl = `http://127.0.0.1:8080/api/data-kandang/${idData}`;
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
                console.log('kandang data:', data);

                document.getElementById('kandang').innerHTML = data.data.kandang;
                document.getElementById('date').innerHTML = data.data.date;
                document.getElementById('pakan').innerHTML = data.data.pakan;
                document.getElementById('minum').innerHTML = data.data.minum;
                document.getElementById('bobot').innerHTML = data.data.bobot;
                document.getElementById('populasi').innerHTML = data.data.populasi;
                document.getElementById('jumlah_kematian').innerHTML = data.data.jumlah_kematian;
                
                
            })
            .catch(error => {
                console.error('Fetch Kandang Data Error:', error);
            });

        });

        // document.getElementById('deleteButton').addEventListener('click', function () {
            
        //     const delete_id = localStorage.getItem('pekerjaId');
        //     var apiUrl = `http://127.0.0.1:8080/api/owner/delete-user/${delete_id}`;
        //     const token = localStorage.getItem('access_token');

        //     var isConfirmed = confirm('Apakah Anda yakin ingin menghapus pekerja?');

        //     if (isConfirmed) {
                
        //         fetch(apiUrl, {
        //             method: 'DELETE',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'Authorization': `Bearer ${token}`,
        //             },
                    
        //         })
        //         .then(response => {
        //             if (response.ok) {
        //                 alert('Pekerja berhasil dihapus!');
        //                 window.location.href = "{{url('/pekerja')}}";
        //             };
        //             return response.text();})
        //         .catch(error => {
        //             // console.error('Error:', error);
        //             // alert('Terjadi kesalahan saat menghapus pekerja.');
        //         });
        //     }
        //     window.location.href = "{{url('/pekerja')}}";
        // });
    </script>
</x-app-layout>