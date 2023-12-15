<x-app-layout>
    @push('navbar-title')
        <span class="bm-font-clr1 bm-font-bold3 bm-font-36">REKAP DATA</span>
    @endpush
    <form action="" method="get" id="searchForm" class="d-flex flex-row justify-content-end align-items-end">
        <div class="d-flex flex-column">
            <label for='searchInput'>Batas Awal</label>
            <input type="date" class="bm-border4 p-2 ms-2 rounded" name="cari-tanggal-panen" id="searchInput" placeholder="Cari Tanggal Panen" oninput="searchDailyData()">
        </div>
        <div class="d-flex flex-column">
            <label for='searchInputEnd'>Batas Akhir</label>
            <input type="date" class="bm-border4 p-2 ms-2 rounded" name="cari-tanggal-panen" id="searchInputEnd" placeholder="Cari Tanggal Panen" oninput="searchDailyData()">
        </div>
        <div class="d-flex flex-column">
            <label for='searchInputNama'>Nama Kandang</label>
            <input type="text" class="bm-border4 p-2 ms-2 rounded" name="cari-tanggal-panen" id="searchInputNama" placeholder="Cari Nama Kandang">
        </div>
        <div class="d-flex flex-column align-items-end">
            <button type="submit" class="ms-2 btn btn-primary h-50">Cari</button>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Cari</button> -->
    </form>
    <table class="table table-bordered border-black mt-3">
        <thead class="table-success text-center">
            <tr>
                <th>No</th>
                <th>Kandang</th>
                <th>Tanggal</th>
                <th>Buka</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="DailyDataTableBody">
            <!-- <tr>
                <th>1</th>
                <th>Kandang 1</th>
                <th>dd/mm/yyyy</th>
                <th><button id="btn-success-bm" class="btn btn-lg btn-block w-100" type="submit">
                    Buka
                </button></th>
                <th class="d-flex flex-row justify-content-center align-items-center">
                    <button id="btn-success-bm" class="btn btn-lg btn-block w-100 me-4" type="submit">
                        Unduh
                    </button>
                    <button id="btn-danger-bm" class="btn btn-lg btn-block w-100" type="submit">
                        Hapus
                    </button>
                </th>
            </tr> -->
        </tbody>
    </table>
    <div class='d-flex flex-row justify-content-end w-100'>
        <button id="btnDownloadCSV" class="btn btn-success btn-lg btn-block" type="button">
            Unduh
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch DAilyData data from your API
            const apiUrl = `http://127.0.0.1:8080/api/data-kandang`; // Update with your actual endpoint
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
                    console.log("data", data)
                    localStorage.setItem('panen_data', JSON.stringify(data.data));
                    
                    const tableBody = document.getElementById('DailyDataTableBody');

                    // Clear existing rows
                    tableBody.innerHTML = '';

                    // Loop through DAilyData Data and create table rows dynamically
                    data.data.forEach((data, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${data.kandang}</td>
                            <td>${data.date}</td>
                            <td><button id="btn-success-bm" class="btn btn-lg btn-block w-100" onclick="storeId(${data.id})" type="button">
                                Buka
                            </button></td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                                <button id="btn-danger-bm" class="btn btn-lg btn-block w-100" type="submit">
                                    Hapus
                                </button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error fetching daily data:', error);
                });

            // Add an event listener to the search form
            document.getElementById('searchForm').addEventListener('submit', function (event) {
                event.preventDefault();
                searchDailyData();
                // Implement search functionality if needed
            });
        });

        function downloadDAilyData(dailyDataId) {
            // Implement download functionality based on daily data Id
            console.log(`Download daily data with ID: ${dailyDataId}`);
        }

        function hapusDailyDAta(dailyDataId) {
            // Implement delete functionality based on daily dataId
            console.log(`Delete daily data with ID: ${dailyDataId}`);
        }

        function storeId(id) {
            localStorage.setItem('dailyDataId', id);
            console.log('stored_id', id)

            window.location.href = '{{ url('/rekap-data/detail') }}';
        }

        function searchDailyData() {
            let tanggal_mulai = document.getElementById('searchInput').value;
            let tanggal_akhir = document.getElementById('searchInputEnd').value;
            let nama_kandang = document.getElementById('searchInputNama').value;

            if (!tanggal_mulai) {
                tanggal_mulai = '1-1-1';
            }
            if (!tanggal_akhir) {
                const today = new Date();
                const dd = String(today.getDate()).padStart(2, '0');
                const mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                const yyyy = today.getFullYear();

                tanggal_akhir = yyyy + '-' + mm + '-' + dd;
            }
            if (!nama_kandang) {
                nama_kandang = 'none'
            }

            const apiUrl = `http://127.0.0.1:8080/api/data-kandang-search/${tanggal_mulai}/${tanggal_akhir}/${nama_kandang}`;
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
                    console.log("data", data)
                    localStorage.setItem('panen_data', JSON.stringify(data.data));
                    
                    const tableBody = document.getElementById('DailyDataTableBody');

                    // Clear existing rows
                    tableBody.innerHTML = '';

                    // Loop through DAilyData Data and create table rows dynamically
                    data.data.forEach((data, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${data.kandang}</td>
                            <td>${data.date}</td>
                            <td><button id="btn-success-bm" class="btn btn-lg btn-block w-100" onclick="storeId(${data.id})" type="button">
                                Buka
                            </button></td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                                <button id="btn-danger-bm" class="btn btn-lg btn-block w-100" type="submit">
                                    Hapus
                                </button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error fetching daily data data:', error);
                });
        }
        function convertJSONtoCSV(jsonData) {
            const header = Object.keys(jsonData[0]);
            const csvContent = jsonData.map(row => header.map(fieldName => JSON.stringify(row[fieldName])).join(','));
            csvContent.unshift(header.join(',')); // Add header to the beginning

            return csvContent.join('\n');
        }

        function downloadCSV(jsonData, fileName) {
            const csvData = convertJSONtoCSV(jsonData);

            const csvBlob = new Blob(["\ufeff", csvData], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');

            if (navigator.msSaveBlob) {
                // IE 10+
                navigator.msSaveBlob(csvBlob, fileName);
            } else {
                // Other browsers
                const url = URL.createObjectURL(csvBlob);
                link.href = url;
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(url);
            }
        }


        // Trigger download on button click
        document.getElementById('btnDownloadCSV').addEventListener('click', function() {
            const jsonData = JSON.parse(localStorage.getItem('panen_data'));
            downloadCSV(jsonData, 'rekap-data.csv');
        });

    </script>
</x-app-layout>