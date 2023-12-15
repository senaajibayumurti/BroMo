<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">NOTIFIKASI</span>
    @endpush
        <div id="notification-container" class="my-3 p-3 bg-white rounded box-shadow mx-5">
                   
        </div>
        @push('scripts')
        <script>
            document.addEventListener('click', function(event) {
                if (event.target.matches('.touch')) {
                    const card = event.target.closest('[id]');

                    if (card) {
                        const notificationId = card.id.replace('notification-', '');

                        // Simpan ID notifikasi di localStorage
                        localStorage.setItem('selectedNotificationId', notificationId);

                        // Redirect ke halaman detail
                        window.location.href = `{{ url('/notifikasi/detail') }}`;
                    }
                }
            });



            document.addEventListener('DOMContentLoaded', function () {
                fatchNotif();
            });

            function fatchNotif() {

                const apiUrl = `http://127.0.0.1:8080/api/notification-all`;;
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

                        updateNotificationView(data.data);

                        // const timestamp = new Date(data.data.date);

                        // const options = { day: '2-digit', month: 'long', year: 'numeric' };
                        // const formattedDate = timestamp.toLocaleDateString('id-ID', options);

                        // // Format the time in 24-hour system
                        // const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
                        // const formattedTime = timestamp.toLocaleTimeString('id-ID', timeOptions);

                        // document.getElementById("tanggal").innerHTML = formattedDate;
                        // document.getElementById("jam").innerHTML = formattedTime;
                        // document.getElementById("prediksi").innerHTML = data.data.prediksi;
                        
                    })
                    .catch(error => {
                        console.error('Fetch Notification Data Error:', error);
                    });
            }

            function updateNotificationView(data) {
                const notificationContainer = document.getElementById('notification-container');

                data.forEach(notification => {
                    const card = createNotificationCard(notification);
                    notificationContainer.appendChild(card);
                });
            }

            function createNotificationCard(notification) {
                // Create a notification card element using JavaScript
                const card = document.createElement('div');
                card.className = 'touch bm-border1 media text-muted d-flex flex-row justify-content-between p-3 m-3';
                card.id = `notification-${notification.id}`;

                const timestamp = new Date(notification.date);

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                const formattedDate = timestamp.toLocaleDateString('id-ID', options);

                // Format the time in 24-hour system
                const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
                const formattedTime = timestamp.toLocaleTimeString('id-ID', timeOptions);

                // Customize the card content based on the notification data
                // Example content, update based on your actual data structure
                card.innerHTML = `
                    <div class="touch bm-border3 bm-font-54 bi-bell-fill px-3 me-5 rounded"></div>
                    <div class="touch bm-font-16 media-body pb-3 mb-0 small lh-125 me-auto">
                        <div class="touch d-flex flex-column justify-content-between align-items-start w-100">
                            <strong class="touch bm-font-bold">
                                Prediksi ayam mati lebih dari <span>${notification.prediksi}</span>
                                Segera lakukan tindakan
                            </strong>
                            <span class="touch">${notification.kandang}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mt-auto">
                        <span class="bm-font-16 d-block me-5">${formattedDate}</span>
                        <button class="bi-trash btn btn-lg btn-block" type="button"></button>
                    </div>
                `;

                return card;
            }
        </script>
        @endpush
</x-app-layout>