<x-app-layout>
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span id="nav" class="bm-font-clr1 bm-font-bold3 bm-font-36">PEKERJA</span>
    @endpush

    <div id="card" class="bm-border4 d-flex flex-row justify-content-start align-items-center py-2 w-100 px-5">
        <img data-src="holder.js/96x96?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="96x96" class="me-5 rounded" style="width: 96px; height: 96px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2296%22%20height%3D%2296%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2096%2096%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18b8b0ef1fe%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18b8b0ef1fe%22%3E%3Crect%20width%3D%2296%22%20height%3D%2296%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211%22%20y%3D%2216.9%22%3E96x96%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
        <div id="nama_card" class="bm-font-24 bm-font-semibold bm-font-semibold ms-5"></div>
    </div>
    <form id="card" class="form-klasifikasi w-100 m-auto p-4">
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Nama</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="nama"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">E-Mail</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="email"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">No. Telpon</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="telp"></span>
            </div>
        </div>
        <div class="bm-font-24 form-group d-flex flex-row justify-content-start pb-2">
            <label for="Tanggal" class="w-50">Kandang</label>
            <label class="me-3">:</label>
            <div class="d-flex flex-row justify-content-start w-50">
                <span id="nama_kandang">Tidak Menjaga Kandang</span>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <div class="d-flex flex-row justify-content-end mt-5 mx-2">
                <a id="btn-success-bm" class="w-100 btn btn-lg btn-block" href="{{url('/pekerja')}}">Kembali</a>
            </div>
            <div class="d-flex flex-row justify-content-end mt-5 mx-2">
                <a id="" class="text-white w-100 btn btn-warning btn-lg btn-block" href="{{url('/pekerja/edit-pekerja')}}">Edit</a>
            </div>
            <div class="d-flex flex-row justify-content-end mt-5 mx-2">
                <button id="deleteButton" class="w-100 btn btn-outline-danger btn-lg btn-block">Hapus</button>
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
                document.getElementById('nama').innerHTML = data.data.nama_lengkap;
                document.getElementById('email').innerHTML = data.data.email;
                document.getElementById('telp').innerHTML = data.data.no_telepon;
                
            })
            .catch(error => {
                console.error('Fetch Kandang Data Error:', error);
            });

        });

        document.getElementById('deleteButton').addEventListener('click', function () {
            
            const delete_id = localStorage.getItem('pekerjaId');
            var apiUrl = `http://127.0.0.1:8080/api/owner/delete-user/${delete_id}`;
            const token = localStorage.getItem('access_token');

            var isConfirmed = confirm('Apakah Anda yakin ingin menghapus pekerja?');

            if (isConfirmed) {
                
                fetch(apiUrl, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`,
                    },
                    
                })
                .then(response => {
                    if (response.ok) {
                        alert('Pekerja berhasil dihapus!');
                        window.location.href = "{{url('/pekerja')}}";
                    };
                    return response.text();})
                .catch(error => {
                    // console.error('Error:', error);
                    // alert('Terjadi kesalahan saat menghapus pekerja.');
                });
            }
            window.location.href = "{{url('/pekerja')}}";
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
    </script>
</x-app-layout>