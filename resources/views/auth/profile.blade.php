<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">PROFIL</span>
    @endpush

    <div class="d-flex flex-row justify-content-center align-items-center h-100 w-75 m-auto">
        <div id="card" class="d-flex flex-column justify-content-center align-items-center py-2 w-25 h-25 px-5">
            <img data-src="holder.js/96x96?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="96x96" class="rounded" style="width: 128px; height: 128px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2296%22%20height%3D%2296%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2096%2096%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18b8b0ef1fe%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18b8b0ef1fe%22%3E%3Crect%20width%3D%2296%22%20height%3D%2296%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211%22%20y%3D%2216.9%22%3E96x96%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="bm-font-24 bm-font-semibold bm-font-semibold">Dono</div>
        </div>
        <form id="userForm" class="form-klasifikasi w-100 m-auto p-4">
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="namaLengkap" class="w-50">Nama Lengkap</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="namaLengkap" placeholder="...">
                </div>
            </div>
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="username" class="w-50">Username</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="username" placeholder="...">
                </div>
            </div>
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="email" class="w-50">Email</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="email" placeholder="...">
                </div>
            </div>
            <!-- <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="password" class="w-50">Password</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="password" class="form-control-plaintext p-0" id="password" placeholder="...">
                </div>
            </div> -->
            <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
                <label for="noTelepon" class="w-50">No. Telepon</label>
                <label class="me-3">:</label>
                <div class="d-flex flex-row justify-content-start w-50">
                    <input type="text" class="form-control-plaintext p-0" id="noTelepon" placeholder="...">
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between w-25 ms-auto mt-5">
                <div class="d-flex flex-row justify-content-end">
                    <button id="btn-success-bm" class="btn btn-lg btn-block" type="button" onclick="submitEditUserForm()">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Call a function to populate user data (replace with actual data)
            const userId = localStorage.getItem('user_id');
            console.log("id", userId)
            fetchUserData(userId);

            // Add an event listener to the 'Simpan' button
            document.getElementById('btn-success-bm').addEventListener('click', function () {
                submitEditUserForm();
            });
        });

        function submitEditUserForm() {
            // Get the values from input fields
            const namaLengkap = document.getElementById('namaLengkap').value;
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = localStorage.getItem('password');
            // document.getElementById('password').value;
            const noTelepon = document.getElementById('noTelepon').value;

            const userId = localStorage.getItem('user_id');
            console.log("user_id", userId);

            // Make an HTTP PUT or PATCH request to the user endpoint with the updated data
            const apiUrl = `http://127.0.0.1:8080/api/user/${userId}`;
            console.log("api", apiUrl);
            const accessToken = localStorage.getItem('access_token');

            fetch(apiUrl, {
                method: 'PATCH', // or 'PUT' depending on your API
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${accessToken}`,
                },
                body: JSON.stringify({
                    nama_lengkap: namaLengkap,
                    username: username,
                    email: email,
                    password: password,
                    no_telepon: noTelepon,
                    // Add similar lines for other form fields
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('edit_user Response:', data);

                // Handle the response as needed
                if (!data.error) {
                    // Redirect or perform other actions
                    alert('User successfully updated');
                    // Add logic to redirect if needed
                } else {
                    // Handle failure
                    alert('Failed to update user. Please check your input.');
                }
            })
            .catch(error => {
                console.error('edit_user Error:', error);
            });
        }

        function fetchUserData(userId) {
            const apiUrl = `http://127.0.0.1:8080/api/user/${userId}`; // Update with your actual endpoint
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
                    console.log('User Data:', data);

                    // Populate user data in the form
                    document.getElementById('namaLengkap').value = data.data.nama_lengkap;
                    document.getElementById('username').value = data.data.username;
                    document.getElementById('email').value = data.data.email;
                    // document.getElementById('password').value = data.data.password; // For security reasons, avoid populating password
                    document.getElementById('noTelepon').value = data.data.no_telepon;
                    // Add similar lines for other form fields

                    localStorage.setItem('password', data.data.password);
                })
                .catch(error => {
                    console.error('Fetch User Data Error:', error);
                });
        }
    </script>

</x-app-layout>