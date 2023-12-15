<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">PEKERJA</span>
    @endpush
    {{-- LIST CARD PEKERJA  --}}
    <div id="container" class="my-3">
        <!-- {{-- CARD PEKERJA  --}}
        <div id="card" class="bm-border1 media text-muted d-flex flex-row justify-content-between p-3 m-3">
            <img data-src="holder.js/96x96?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="96x96" class="me-5 rounded" style="width: 96px; height: 96px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2296%22%20height%3D%2296%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2096%2096%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18b8b0ef1fe%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18b8b0ef1fe%22%3E%3Crect%20width%3D%2296%22%20height%3D%2296%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211%22%20y%3D%2216.9%22%3E96x96%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="media-body pb-3 mb-0 small lh-125 me-auto">
                <div class="bm-font-24 d-flex flex-column justify-content-between align-items-start w-100">
                    <strong id="nama" class="text-gray-dark">Dono</strong>
                    <span class="d-block">Kandang 1</span>
                </div>
            </div>
            <a id="btn-success-bm" class="btn btn-lg btn-block my-auto" href="{{url('/pekerja/edit-pekerja')}}">Buka</a>
        </div> -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const apiUrl = `http://127.0.0.1:8080/api/owner/user`; // Update with your actual endpoint
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
                console.log('user data:', data);

                // Assuming you have a container where you want to append user cards
                const container = document.getElementById('container');

                // Iterate over each user in the data array
                data.data.forEach(user => {
                    console.log("user",user)
                    // Create a new card element for each user
                    const card = document.createElement('div');
                    card.className = 'bm-border1 rounded media text-muted d-flex flex-row justify-content-between p-3 m-3';

                    // Set the user information in the card
                    card.innerHTML = `
                        <img data-src="holder.js/96x96?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="96x96" class="me-5 rounded" style="width: 96px; height: 96px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2296%22%20height%3D%2296%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2096%2096%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18b8b0ef1fe%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18b8b0ef1fe%22%3E%3Crect%20width%3D%2296%22%20height%3D%2296%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211%22%20y%3D%2216.9%22%3E96x96%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                        <div class="media-body pb-3 mb-0 small lh-125 me-auto">
                            <div class="bm-font-24 d-flex flex-column justify-content-between align-items-start w-100">
                                <strong id="nama" class="text-gray-dark">${user.nama_lengkap}</strong>
                                <span id="nama_kandang${user.id}" class="d-block">Tidak Menjaga Kandang</span>
                            </div>
                        </div>
                        <a id="btn-success-bm" class="btn btn-lg btn-block my-auto" href="#" onclick="setPekerjaId(${user.id})">Buka</a>
                    `;

                    // Append the card to the container
                    container.appendChild(card);
                    fetchKandang(user.id)
                });
            })
            .catch(error => {
                console.error('Fetch Kandang Data Error:', error);
            });

            window.setPekerjaId = function(id) {
            // You can perform any actions with the id here
            console.log('Selected Pekerja ID:', id);
            // Set the id to a local variable or perform other actions
            localStorage.setItem('pekerjaId', id);
            // Redirect to the edit-pekerja page or perform other actions
            window.location.href = "{{url('/pekerja/detail-pekerja')}}";
        };
        });

        function fetchKandang(userId) {

        const apiUrl = `http://127.0.0.1:8080/api/kandangByUser/${userId}`;;
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

                if (data.data[0].nama_kandang) {
                    document.getElementById(`nama_kandang${userId}`).innerHTML = data.data[0].nama_kandang;
                }
                else{
                    document.getElementById(`nama_kandang${userId}`).innerHTML = "Tidak Menjaga Kandang";
                }
                
            })
            .catch(error => {
                console.error('Fetch Kandang Data Error:', error);
            });
        }
    </script>
</x-app-layout>