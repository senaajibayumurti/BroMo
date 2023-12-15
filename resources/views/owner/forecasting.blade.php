<x-app-layout>
    <link rel="stylesheet" href="/css/forecasting.css">
    <link rel="stylesheet" href="/css/chart.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">FORECASTING</span>
    @endpush
    <div id="info" class="d-flex flex-column justify-content-around h-100">
        <div class="d-flex flex-row justify-content-between h-auto">
            <div id="card" class="d-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div id="suhu_pie" class="pie" ></div>
                <div class="bm-font-24 bm-font-semibold">Suhu</div>
            </div>
            <div id="card" class="d-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div id="kelembaban_pie" class="pie"></div>
                <div class="bm-font-24 bm-font-semibold">Kelembaban</div>
            </div>
            <div id="card" class="d-flex flex-column justify-content-between align-items-center py-2 w-25">
                <div id="amonia_pie" class="pie"></div>
                <div class="bm-font-24 bm-font-semibold">Amonia</div>
            </div>
        </div>
        <!-- INFO FORECASTING -->
        <div class="d-flex flex-row align-items-center">
            <div id="card" class="bm-border1 d-inline-flex flex-row me-5">
                <div class="d-inline-flex flex-column justify-content-between align-items-center p-2">
                    <div class="d-flex flex-column justify-content-between p-3">
                        <div class="bm-font-16 bm-font-bold1">Tanggal:</div>
                        <div class="d-inline-flex flex-row align-items-center py-2">
                            <i class="bm-font-24 bi bi-calendar"></i>
                            <span id="tanggal" class="bm-font-24 px-3">31 Oktober 2023</span>
                        </div>
                        <div class="d-inline-flex flex-row align-items-center py-2">
                            <i class="bm-font-24 bi bi-clock"></i>
                            <span id="jam" class="bm-font-24 px-3">07.00</span>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex flex-column justify-content-between align-items-center p-2">
                    <div class="d-flex flex-column justify-content-between p-3">
                        <div class="bm-font-16 bm-font-bold1">Prediksi ayam mati:</div>
                        <p class="bm-font-36 bm-font-bold2"><span id="prediksi" class="bm-font-bold2">10</span> ekor</p>
                    </div>
                    <Button class="btn btn-success" type="button" onClick="forcast()">Forcast Now</Button>
                </div>
            </div>
            <div>
                <a id="btn-success-bm" class="btn btn-lg btn-block w-100" href="{{url('/forecasting/klasifikasi')}}">Klasifikasi Detail</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const id = localStorage.getItem('login_id');

            fetchSensorAmoniak(id); // Replace 1 with the actual Kandang ID you want to retrieve
            fetchSensorSuhuKelembaban(id);
            fatchNotif(id); // Replace 1 with the actual Kandang ID you want to retrieve
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

                    localStorage.setItem('amoniak', data.data[0].amoniak);

                    // document.getElementById('amonia').innerHTML = data.data[0].amoniak;

                    var amoniaPie = document.getElementById("amonia_pie");

                    amoniaPie.style.setProperty("--p", data.data[0].amoniak);
                    amoniaPie.textContent = data.data[0].amoniak+"ppm";

                })
                .catch(error => {
                    console.error('Fetch Kandang Data Error:', error);
                });
        }

        function fetchSensorSuhuKelembaban(kandangId) {
            const apiUrl = `http://127.0.0.1:8080/api/sensor-suhu-kelembaban/${kandangId}`;

            const accessToken = localStorage.getItem('access_token');
            console.log("token", accessToken)
            
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

                    localStorage.setItem('suhu', data.data.suhu);
                    localStorage.setItem('kelembaban', data.data.kelembaban);

                    var suhuPie = document.getElementById("suhu_pie");
                    var kelembabanPie = document.getElementById("kelembaban_pie");

                    suhuPie.style.setProperty("--p", data.data.suhu);
                    suhuPie.textContent = data.data.suhu+"°C";

                    kelembabanPie.style.setProperty("--p", data.data.kelembaban);
                    kelembabanPie.textContent = data.data.kelembaban+"%";


                })
                .catch(error => {
                    console.error('Fetch Kandang Data Error:', error);
                });
        }
        function fatchNotif(id_kandang) {

            const apiUrl = `http://127.0.0.1:8080/api/notification/${id_kandang}`;;
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
                    console.log("notif", data)

                    const timestamp = new Date(data.data.date);

                    const options = { day: '2-digit', month: 'long', year: 'numeric' };
                    const formattedDate = timestamp.toLocaleDateString('id-ID', options);

                    // Format the time in 24-hour system
                    const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
                    const formattedTime = timestamp.toLocaleTimeString('id-ID', timeOptions);

                    document.getElementById("tanggal").innerHTML = formattedDate;
                    document.getElementById("jam").innerHTML = formattedTime;
                    document.getElementById("prediksi").innerHTML = data.data.prediksi;
                    
                })
                .catch(error => {
                    console.error('Fetch Notification Data Error:', error);
                });
        }
        function forcast() {

            const apiUrl = `http://127.0.0.1:8080/api/notification`;;
            const accessToken = localStorage.getItem('access_token');

            console.log("api", apiUrl)
            const id_kandang = localStorage.getItem('login_id');
            const message = "Lakukan tindakan segera";
            let prediksi = 0;

            fetchSensorAmoniak(id_kandang);
            fetchSensorSuhuKelembaban(id_kandang);

            const suhu = localStorage.getItem('suhu');
            const kelembaban = localStorage.getItem('kelembaban');
            const amoniak = localStorage.getItem('amoniak');

            if (kelembaban > 60) {
                prediksi += 2+((kelembaban-60)/5);
            }
            if (suhu > 35) {
                prediksi += 2+((suhu-35)/5);
            }
            if (amoniak > 35) {
                prediksi += 2+((amoniak-35)/5);
            }

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${accessToken}`,
                },
                body: JSON.stringify({
                    id_kandang: id_kandang,
                    message: message,
                    prediksi: Math.round(prediksi),
                    // Add similar lines for other form fields
                }),
                
            })
                .then(response => response.json())
                .then(data => {
                    console.log("forcast", data)
                    
                    fatchNotif(id_kandang);
                })
                .catch(error => {
                    console.error('Fetch Notification Data Error:', error);
                });
            }
    </script>
</x-app-layout>