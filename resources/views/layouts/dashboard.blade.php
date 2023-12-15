
<x-app-layout>
    @push('navbar-title')
    <div class="bm-font-clr1 bm-font-bold3 bm-font-32">Halo,  
        <span id="nama_user" class="bm-font-clr1 bm-font-bold3 bm-font-32">Dono</span>
    </div>
        <div class="bm-font-clr1 bm-font-bold1 bm-font-24">Selamat Datang di 
            <span id="nama_kandang" class="bm-font-clr1 bm-font-bold1 bm-font-24"></span>
        </div>
    @endpush
    <div class="bm-font-clr1 bm-font-bold3 bm-font-36" id="condition_label">NORMAL</div>
    <div id="info" class="d-flex flex-column justify-content-around h-100">
        <div id="info1" class="d-flex flex-row justify-content-between">
            <div id="card" class="bm-border2 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div><i class="bm-font-96 bi bi-thermometer"></i></div>
                <div class="bm-font-16 bm-font-semibold bm-font-clr2">Suhu</div>
                <div class="bm-font-24 bm-font-semibold bm-font-clr2">{<span class="bm-font-24 bm-font-semibold bm-font-clr2" id="suhu"></span>°C}</div>
            </div>
            <div id="card" class="bm-border1 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div><i class="bm-font-96 bi bi-droplet-half"></i></div>
                <div class="bm-font-16 bm-font-semibold bm-font-clr1">Kelembaban</div>
                <div class="bm-font-24 bm-font-semibold bm-font-clr1">{<span class="bm-font-24 bm-font-semibold bm-font-clr1" id="kelembaban"></span>%}</div>
            </div>
            <div id="card" class="bm-border3 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div><i class="bm-font-96 bi bi-virus"></i></div>
                <div class="bm-font-16 bm-font-semibold bm-font-clr3">Amonia</div>
                <div class="bm-font-24 bm-font-semibold bm-font-clr3">{<span class="bm-font-24 bm-font-semibold bm-font-clr3" id="amonia"></span>ppm}</div>
            </div>
        </div>
        <!-- INFO LAINNYA -->
        <div id="info2" class="d-flex flex-row justify-content-between">
            <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div class="bm-font-16 bm-font-semibold">Luas</div>
                <div><i class="bm-font-54 bi bi-bank2"></i></div>
                <div class="bm-font-24 bm-font-semibold">{<span id="luas_kandang"></span>m²}</div>
            </div>
            <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div class="bm-font-16 bm-font-semibold">Populasi</div>
                <div><i class="bm-font-54 bi bi-file-bar-graph-fill"></i></div>
                <div class="bm-font-24 bm-font-semibold">{<span id="populasi"></span>ekor}</div>
            </div>
            <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div class="bm-font-16 bm-font-semibold">Bobot</div>
                <div><i class="bm-font-54 bi bi-file-arrow-down-fill"></i></div>
                <div class="bm-font-24 bm-font-semibold">{<span id="bobot"></span>gr/ekor}</div>
            </div>
            <div id="card" class="bm-border4 d-inline-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div class="bm-font-16 bm-font-semibold">Pakan & Minum</div>
                <div><i class="bm-font-54 bi bi-basket2-fill"></i></div>
                <div class="bm-font-24 bm-font-semibold">{<span id="pakan"></span>kg}</div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const id = localStorage.getItem('login_id');
            console.log("id", id)
            const nama = localStorage.getItem('nama');
            const level = localStorage.getItem('level');
            document.getElementById('nama_user').innerHTML = nama;
            
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
                document.getElementById('pakan').innerHTML = data.data.pakan + " & " + data.data.minum;
                // document.getElementById('minum').innerHTML = data.data.minum;
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
                    label.innerHTML = "BAHAYA"
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
                    label.innerHTML = "BAHAYA"
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
                    
                    let id = data.data.id

                    if(level == "owner"){
                        document.getElementById('nama_kandang').innerHTML = data.data.nama_kandang;
                        document.getElementById('luas_kandang').innerHTML = data.data.luas_kandang;
                        id = data.data.id
                    }else{
                        document.getElementById('nama_kandang').innerHTML = data.data[0].nama_kandang;
                        document.getElementById('luas_kandang').innerHTML = data.data[0].luas_kandang;
                        id = data.data[0].id
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