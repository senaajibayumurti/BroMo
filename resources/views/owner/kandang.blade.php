<x-app-layout>
    <link rel="stylesheet" href="/css/kandang-switch.css">
    <link rel="stylesheet" href="/css/tambah-kandang.css">

    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">KANDANG</span>
    @endpush
    
    <div id="switch" >
        <div id="switch-bg" ></div>
        <button type="button" id="switch-btn" class="btn-aktif">Aktif</button>
        <button type="button" id="switch-btn" class="btn-rehat">Rehat</button>
    </div>
    <form action="" method="get" id="card" class="ms-auto">
        <input id="search_kandang" type="text"  class="bm-border4 p-2" name="cari-kandang" id="card" placeholder="Cari Kandang" oninput="searchKandang()">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    {{-- LIST CARD KANDANG --}}
    <div class="d-inline-flex flex-column justify-content-start align-items-center">
        {{-- CARD KANDANG  --}}
        <form id="card" class="bm-border1 form-klasifikasi w-100 my-4 p-4">
            <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-column justify-content-center">
                    <div class="bm-font-96 bm-font-bold1 bi bi-bank text-center"></div>
                    <a class="bm-font-24 bm-font-clr6" href="{{url('/kandang/edit-kandang')}}">Edit Kandang</a>
                </div>
                <div id="detail" class="d-flex flex-column w-75 justify-content-around">
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Nama Kandang</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span id="nama_kandang"></span>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Tanggal Mulai</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span id="tanggal_mulai"></span>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Pekerja</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span id="penjaga"></span>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Luas Kandang</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span id="luas_kandang"></span>
                            <label class="ms-2" >m²</label>
                        </div>
                    </div>
                    <div class="bm-font-16 form-group d-flex flex-row justify-content-start pb-2">
                        <label for="Tanggal" class="w-50">Alamat Kanadang</label>
                        <label class="me-3">:</label>
                        <div class="d-flex flex-row justify-content-start w-50">
                            <span id="alamat_kandang"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-end">
                <button id="btn_rehat" class="btn btn-success btn-lg btn-block" type="button">Rehat</button>
            </div>
        </form>
        {{-- CARD KANDANG  --}}
    </div>
    {{-- LIST CARD KANDANG --}}
    <a id="tambah-kandang" class="bm-font-36 bm-font-bold2 btn btn-lg btn-block" type="button" href="{{url('/kandang/tambah-kandang')}}">+</a>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            searchTerm = localStorage.getItem('search');
            
            fetchKandangData(searchTerm); // Replace 1 with the actual Kandang ID you want to retrieve
            rehatState = localStorage.getItem('rehat');

            const switch_btn = document.getElementById("btn_rehat");
            const aktif = document.getElementsByClassName("btn-aktif")[0]; // Assuming there is only one element with this class
            const rehat = document.getElementsByClassName("btn-rehat")[0]; // Assuming there is only one element with this class

            // if (rehatState) {
            //     rightclick();
            // }
            // if (!rehatState) {
            //     leftClick();
            // }
            switch_btn.addEventListener('click', function () {
                // Use confirm to get user's choice
                const userConfirmed = confirm('Apakah anda yakin merehatkan kandang ini?');

                if (userConfirmed) {
                    // User clicked "OK"
                    const kandangId = localStorage.getItem('kandang_id');

                    const apiUrl = `http://127.0.0.1:8080/api/owner/kandang-rehat/${kandangId}`;
                    const accessToken = localStorage.getItem('access_token');

                    fetch(apiUrl, {
                        method: 'PATCH',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${accessToken}`,
                        },
                        body: JSON.stringify({
                            rehat: "rehat",
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.error) {
                            // Redirect or perform other actions
                            // rightclick();
                            alert('Kandang telah direhatkan');
                            // Add logic to redirect if needed
                        } else {
                            // Handle failure
                            alert('gagal merehatkan kandang');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Kandang Data Error:', error);
                    });
                } else {
                    // User clicked "Cancel" or closed the dialog
                    alert('Pengguna membatalkan aksi merehatkan kandang.');
                    // Optionally, you can add logic for this case
                }
            });
            rehat.addEventListener('click', function () {
                // Use confirm to get user's choice
                const userConfirmed = confirm('Apakah anda yakin merehatkan kandang ini?');

                if (userConfirmed) {
                    // User clicked "OK"
                    const kandangId = localStorage.getItem('kandang_id');

                    const apiUrl = `http://127.0.0.1:8080/api/owner/kandang-rehat/${kandangId}`;
                    const accessToken = localStorage.getItem('access_token');

                    fetch(apiUrl, {
                        method: 'PATCH',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${accessToken}`,
                        },
                        body: JSON.stringify({
                            rehat: "rehat",
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.error) {
                            // Redirect or perform other actions
                            // rightclick();
                            alert('Kandang telah direhatkan');
                            // Add logic to redirect if needed
                        } else {
                            // Handle failure
                            alert('gagal merehatkan kandang');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Kandang Data Error:', error);
                    });
                } else {
                    // User clicked "Cancel" or closed the dialog
                    alert('Pengguna membatalkan aksi merehatkan kandang.');
                    // Optionally, you can add logic for this case
                }
            });
            aktif.addEventListener('click', function () {
                // Use confirm to get user's choice
                const userConfirmed = confirm('Apakah anda yakin mengaktifkan kandang ini?');

                if (userConfirmed) {
                    // User clicked "OK"
                    const kandangId = localStorage.getItem('kandang_id');

                    const apiUrl = `http://127.0.0.1:8080/api/owner/kandang-rehat/${kandangId}`;
                    const accessToken = localStorage.getItem('access_token');

                    fetch(apiUrl, {
                        method: 'PATCH',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${accessToken}`,
                        },
                        body: JSON.stringify({
                            rehat: "aktif",
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.error) {
                            // Redirect or perform other actions
                            // rightclick();
                            alert('Kandang telah diaktifkan');
                            // Add logic to redirect if needed
                        } else {
                            // Handle failure
                            alert('gagal mengaktifkan kandang');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch Kandang Data Error:', error);
                    });
                } else {
                    // User clicked "Cancel" or closed the dialog
                    alert('Pengguna membatalkan aksi mengaktifkan kandang.');
                    // Optionally, you can add logic for this case
                }
            });
        });

        function searchKandang(search) {
            const searchTerm = document.getElementById('search_kandang').value;

            if (searchTerm == null) {
                searchTerm = 1
            }
            console.log("search", searchTerm)

            localStorage.setItem('search', searchTerm);
            localStorage.setItem('login_id', searchTerm);
        }

        function fetchKandangData(kandangId) {
            const apiUrl = `http://127.0.0.1:8080/api/kandang/${kandangId}`; // Update with your actual endpoint
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

                    if (data.data.rehat == "aktif") {
                        leftClick();
                    }else{
                        rightClick();
                    }

                    localStorage.setItem('kandang_id', data.data.id);
                    localStorage.setItem('login_id', data.data.id);
                    localStorage.setItem('rehat', data.data.rehat);
                    console.log("kandang", data.data.id)
                    console.log("rehat", data.data.rehat)

                    if(data.error){
                        document.getElementById('detail').innerHTML = '<p class="text-danger" style="margin-top: 0;" >Kandang Tidak Ditemukan</p>';
                    }
                    console.log('Kandang Data:', data);

                    document.getElementById('nama_kandang').innerHTML = data.data.nama_kandang;
                    document.getElementById('luas_kandang').innerHTML = data.data.luas_kandang;
                    if (data.data.tanggal_mulai == null) {
                        document.getElementById('tanggal_mulai').innerHTML = "Belum Memulai";
                    }else{
                        document.getElementById('tanggal_mulai').innerHTML = data.data.tanggal_mulai;
                    }
                    document.getElementById('penjaga').innerHTML = data.data.anak_kandang.username;
                    document.getElementById('alamat_kandang').innerHTML = data.data.alamat_kandang;

                })
                .catch(error => {
                    console.error('Fetch Kandang Data Error:', error);
                });
        }
    </script>
    <script src="/js/kandang-switch.js"></script>
</x-app-layout>