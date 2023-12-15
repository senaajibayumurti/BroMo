<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">NOTIFIKASI</span>
    @endpush
    {{-- LIST CARD PEKERJA  --}}
    <div class="my-3 p-3 bg-white rounded box-shadow mx-5">
        {{-- CARD PEKERJA  --}}
        <div id="card" class="media text-muted d-flex flex-row justify-content-between p-3 m-3">
            <div class="media-body pb-3 mb-0 small lh-125 me-auto">
                <div class="bm-font-24 d-flex flex-column justify-content-between align-items-start w-100">
                    <span class="bm-font-36 bm-font-bold1 bm-font-clr3 text-gray-dark">
                        Prediksi ayam mati lebih dari <span class="bm-font-36 bm-font-bold1 bm-font-clr3 text-gray-dark" id="prediksi"></span>
                    </span>
                    <span class="mb-3 bm-font-16 bm-font-bold1 bm-font-clr5 text-gray-dark">
                        Nama Kandang : <span class="bm-font-16 bm-font-bold1 bm-font-clr5 text-gray-dark" id="kandang"></span>
                    </span>
                    <span id="message" class="bm-font-36">
                        <!-- Diperkirakan ayam mati lebih dari 10, penyebab ayam mati diperkirakan adalah
                        peningkatan kadar amonia dikandang yang melebihi batas normal atau aman
                        yaitu 6ppm. Suhu didalam kandang juga dinyatakan dalam keadaan waspada  
                        yaitu 25°c. Kelembaban udara kandang masih aman yaitu 60%. -->
                    </span>
                    <div class="mt-5 w-100 d-flex flex-column bm-font-16 d-block">
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectedNotificationId = localStorage.getItem('selectedNotificationId');
            console.log("notifID", selectedNotificationId)

            if (selectedNotificationId) {
                fetchNotificationDetail(selectedNotificationId);
            }
        });

        function fetchNotificationDetail(notificationId) {
            
            const apiUrl = `http://127.0.0.1:8080/api/notificationById/${notificationId}`;
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
                        document.getElementById("message").innerHTML = data.data.message;
                        document.getElementById("kandang").innerHTML = data.data.kandang;
                        
                    })
                    .catch(error => {
                        console.error('Fetch Notification Data Error:', error);
                    });
            }

    </script>
</x-app-layout>