<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">KLASIFIKASI</span>
    @endpush
    <form class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-36 bm-font-bold1 text-center mb-5">Status:
            <span id="condition_label" class="bm-font-36 bm-font-bold1 bm-font-clr1" >Normal</span>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Nama Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="nama_kandang"></span>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Kelembaban</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="kelembaban"></span>
                <label for="kelembaban">%</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Suhu</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="suhu"></span>
                <label for="suhu">°c</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Amonia</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="amonia"></span>
                <label for="">ppm</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Pakan</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="pakan"></span>
                <label for="">kg</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Minum</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="minum"></span>
                <label for="">liter</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Bobot</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50"></span>
                <span type="text" class="form-control-plaintext p-0" id="bobot">
                <label for="">gr/ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Populasi</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="populasi"></span>
                <label for="">ekor</label>
            </div>
        </div>
        <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Luas Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span type="text" class="form-control-plaintext p-0" id="luas_kandang"></span>
                <label for="">m²</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end mt-5">
            <a id="btn-success-bm" class="btn btn-lg btn-block" href="{{url('/forecasting')}}">Kembali</a>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const id = localStorage.getItem('login_id');
            console.log("id", id)
            const nama = localStorage.getItem('nama');
            const level = localStorage.getItem('level');
            
            console.log("id_2", id)
            fetchKandang(id, level)

            const apiUrl = `http://127.0.0.1:8080/api/data-kandang-by-kandang/${id}`;
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

                // document.getElementById('kandang').innerHTML = data.data.kandang;
                // document.getElementById('date').innerHTML = data.data.date;
                document.getElementById('pakan').innerHTML = data.data.pakan;
                document.getElementById('minum').innerHTML = data.data.minum;
                document.getElementById('bobot').innerHTML = data.data.bobot;
                document.getElementById('populasi').innerHTML = data.data.populasi;
                // document.getElementById('jumlah_kematian').innerHTML = data.data.jumlah_kematian;
                
                
            })
            .catch(error => {
                console.error('Fetch Kandang Data Error:', error);
            });
            
        });

        function fetchSensorAmoniak(kandangId) {

            const apiUrl = `http://127.0.0.1:8080/api/sensor-amoniak/${kandangId}`; // Update with your actual endpoint
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
                    console.log('Amoniak:', data);
                    console.log('Amoniak:', data.data[0].amoniak);

                    document.getElementById('amonia').innerHTML = data.data[0].amoniak;
                    const label = document.getElementById('condition_label');

                    if (data.data[0].amoniak >= 35) {
                    label.innerHTML = "Abnormal"
                    label.classList.remove("bm-font-clr1")
                    label.classList.add("bm-font-clr3")
                }
                    
                })
                .catch(error => {
                    console.error('Fetch Kandang Data Error:', error);
                });
            }
            
            function fetchSensorSuhuKelembaban(kandangId) {
                const apiUrl = `http://127.0.0.1:8080/api/sensor-suhu-kelembaban/${kandangId}`; // Update with your actual endpoint
            const accessToken = localStorage.getItem('access_token');
            console.log(accessToken)
            
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
                console.log('Suhu Kelembaban:', data);
                console.log('Suhu Kelembaban:', data.data.suhu);
                
                document.getElementById('suhu').innerHTML = data.data.suhu;
                document.getElementById('kelembaban').innerHTML = data.data.kelembaban;
                const label = document.getElementById('condition_label');

                if (data.data.suhu >= 35 || data.data.kelembaban >= 60) {
                    label.innerHTML = "Abnormal"
                    label.classList.remove("bm-font-clr1")
                    label.classList.add("bm-font-clr3")
                }
                
            })
            .catch(error => {
                console.error('Fetch Kandang Data Error:', error);
            });
        }
        
        function fetchKandang(userId, level) {

            console.log("level", level)

            let apiUrl;
            
            if(level == "owner"){
                apiUrl = `http://127.0.0.1:8080/api/kandang/${userId}`; // Update with your actual endpoint
            }else{
                apiUrl = `http://127.0.0.1:8080/api/kandangByUser/${userId}`; // Update with your actual endpoint
            }
            const accessToken = localStorage.getItem('access_token');
            
            console.log("api", apiUrl)
            
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
                    console.log("kandang", data)
                    
                    const id = data.data.id

                    if(level == "owner"){
                        document.getElementById('nama_kandang').innerHTML = data.data.nama_kandang;
                        document.getElementById('luas_kandang').innerHTML = data.data.luas_kandang;
                    }else{
                        document.getElementById('nama_kandang').innerHTML = data.data[0].nama_kandang;
                        document.getElementById('luas_kandang').innerHTML = data.data[0].luas_kandang;
                    }

                    
                    fetchSensorAmoniak(id); 
                    fetchSensorSuhuKelembaban(id);
                    
                })
                .catch(error => {
                    console.error('Fetch Kandang Data Error:', error);
                });
        }
    </script>
</x-app-layout>