<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">PEKERJA</span>
    @endpush

    <div id="card" class="bm-border4 d-flex flex-row justify-content-start align-items-center py-2 w-100 px-5">
        <img data-src="holder.js/96x96?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="96x96" class="me-5 rounded" style="width: 96px; height: 96px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2296%22%20height%3D%2296%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2096%2096%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18b8b0ef1fe%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18b8b0ef1fe%22%3E%3Crect%20width%3D%2296%22%20height%3D%2296%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211%22%20y%3D%2216.9%22%3E96x96%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
        <div class="d-flex flex-column">
            <div id="nama_card" class="bm-font-24 bm-font-semibold bm-font-semibold ms-5">Dono</div>
            <div id="nama_kandang" class="bm-font-16 bm-font-semibold ms-5">Nama_kandang</div>
        </div>
    </div>
    <form id="card" class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="nama" class="w-50">Nama</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input id="nama"></input>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="email" class="w-50">E-Mail</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input id="email"></input>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="telp" class="w-50">No. Telpon</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <input id="telp"></input>
            </div>
        </div>
        <!-- <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="kandang" class="w-50">Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span>Kandang 1</span>
            </div>
        </div> -->
        <div class="d-flex flex-row justify-content-between w-25 ms-auto mt-5">
            <div class="d-flex flex-row justify-content-end">
                <button id="btn-success-bm" class="btn btn-lg btn-block" type="button" onclick="submitEditUserForm()">Simpan</button>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <a id="" class="btn btn-danger btn-lg btn-block" href="{{url('/pekerja')}}">Kembali</a>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const levelAcc = localStorage.getItem('level');
            if (levelAcc != "owner") {
                
            }

            const id_pekerja = localStorage.getItem('pekerjaId');
            console.log("id", id_pekerja);
            fetchKandang(id_pekerja);

            const apiUrl = `http://127.0.0.1:8080/api/owner/user/${id_pekerja}`;
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

                document.getElementById('nama_card').innerHTML = data.data.nama_lengkap;
                document.getElementById('nama').value = data.data.nama_lengkap;
                document.getElementById('email').value = data.data.email;
                document.getElementById('telp').value = data.data.no_telepon;
                
            })
            .catch(error => {
                console.error('Fetch Kandang Data Error:', error);
            });

            document.getElementById('btn-success-bm').addEventListener('click', function () {
                submitEditUserForm();
            });

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
                        document.getElementById('nama_kandang').innerHTML = data.data[0].nama_kandang;
                    }
                    else{
                        document.getElementById('nama_kandang').innerHTML = "Tidak Menjaga Kandang";
                    }
                    
                })
                .catch(error => {
                    console.error('Fetch Kandang Data Error:', error);
                });
        }

        function submitEditUserForm() {
            // Get the values from input fields
            const namaLengkap = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const noTelepon = document.getElementById('telp').value;

            const userId = localStorage.getItem('pekerjaId');
            console.log("pekerjaId", userId);

            // Make an HTTP PUT or PATCH request to the user endpoint with the updated data
            const apiUrl = `http://127.0.0.1:8080/api/pekerja/${userId}`;
            console.log("api", apiUrl);
            const accessToken = localStorage.getItem('access_token');

            fetch(apiUrl, {
                method: 'PATCH',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${accessToken}`,
                },
                body: JSON.stringify({
                    nama_lengkap: namaLengkap,
                    email: email,
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
    </script>
</x-app-layout>