<x-app-layout>
    <link rel="stylesheet" href="/css/login.css">

    <div class="d-flex flex-row align-items-center position-absolute w-100 h-100 pe-5">
        <form class="form-login ms-auto">
            <div class="d-flex flex-row justify-content-between">
                <div class="text-start mb-4">
                    <div>Welcome To <a class="bm-font-clr1 bm-font-semibold">BroMo</a></div>
                    <div class="bm-font-54 bm-font-medium">Log In</div>
                </div>
                <div class="ms-auto">
                    <div class="text-muted">No Account?</div>
                    <a href="#" class="bm-font-clr1">Register</a>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-between">
                {{-- Social Sign-In --}}
                <div class="d-flex flex-row justify-content-between mb-4">
                    <button id="btn-auth-1" class="btn-auth bm-bg2 d-flex flex-row justify-content-center align-items-center border-0 me-2 py-2 px-2 w-100" onclick="toggleClassAndRedirect(this)">
                        <img src="/images/google.png" alt="Google Logo">
                        <span class="btn-auth-text ms-3">Log-In with Google</span>
                    </button>
                    <button id="btn-auth-2" class="btn-auth bm-bg2 d-flex flex-row justify-content-center align-items-center border-0 mx-2 py-2 px-2" onclick="toggleClassAndRedirect(this)">
                        <img src="/images/facebook.png" alt="Facebook Logo">
                        <span class="btn-auth-text ms-3">Log-In with Facebook</span>
                    </button>
                    <button id="btn-auth-3" class="btn-auth bm-bg2 d-flex flex-row justify-content-center align-items-center border-0 ms-2 py-2 px-2" onclick="toggleClassAndRedirect(this)">
                        <img src="/images/apple.png" alt="Apple Logo">
                        <span class="btn-auth-text ms-3">Log-In with Apple ID</span>
                    </button>
                </div>
                {{-- Social Sign-In --}}
                <div class="form-label-group mb-4">
                    <label for="inputUsername">Enter your username</label>
                    <input type="text" id="inputUsername" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-label-group mb-4">
                    <label for="inputPassword">Enter your Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="text-end mb-3">
                    <a href="#" class="bm-font-clr1">Forgot Password</a>
                </div>
                <button id="btn-success-bm" class="btn btn-lgbtn-block w-100">Log in</button>
                <!-- <a id="btn-success-bm" class="btn btn-lgbtn-block w-100" href="{{url('/dashboard')}}">Log in</a> -->
            </div>
        </form>
    </div>
    <div class="w-100">
        <div class="bg-atas col-md-12">
            <div class="bm-font-clr4 bm-font-bold2 bm-font-24 mx-4 p-2">BroMo Apps</div>
            <div class="d-flex flex-row align-content-stretch w-50 h-100 mx-5">
                <div class="d-flex flex-column w-75 justify-content-around">
                    <div>
                        <div class="bm-font-clr4 bm-font-bold1 bm-font-36">Welcome Back</div>
                        <div class="bm-font-clr4 bm-font-24">Broiler Monitoring</div>
                        <br>
                        <div class="bm-font-clr4 bm-font-12">
                            BroMo adalah singkatan dari Broiler Monitoring, aplikasi yang dirancang untuk memantau kandang ayam secara efektif. Tujuan dari dibuatnya aplikasi ini adalah untuk meningkatkan efektifitas pemantauan kandang ayam bagi owner dan juga anak kandang secara real-time.
                        </div>
                    </div>
                </div>
                <div class="m-auto">
                    <img src="/images/man and woman working with laptop.png" alt="" style="width: auto; height: 250px;">
                </div>
            </div>
        </div>
        <!-- SEPARATOR -->
        <div class="bg-bawah col-md-12 p-4">
            <!-- SAVED ACCOUNT CARDS -->
            <div id="card" class="bm-bg2 d-inline-flex flex-column justify-content-between align-items-center p-4">
                <div><i class="bm-font-54 bi bi-circle-fill"></i></div>
                <div class="bm-font-16 bm-font-semibold">Pemilik</div>
                <span class="bm-font-12 bm-font-semibold bm-font-clr5">Active 1 day(s) ago</span>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add an event listener to the login button
            document.getElementById('btn-success-bm').addEventListener('click', function (event) {
                event.preventDefault();

                // Get the values from input fields
                const username = document.getElementById('inputUsername').value;
                const password = document.getElementById('inputPassword').value;

                // Make an HTTP POST request to the login endpoint
                const apiUrl = 'http://127.0.0.1:8080/api/login'; // Update with your actual login endpoint

                fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        password: password,
                        username: username
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Login Response:', data);

                    // Handle the login response as needed
                    if (data.errors) {
                        // Redirect to the dashboard or perform other actions
                        alert('Login failed. Please check your credentials.');
                    } else {
                        // Handle login failure
                        window.location.href = '{{ url('/dashboard') }}';
                    }
                })
                .catch(error => {
                    console.error('Login Error:', error);
                });
            });
        });
    </script>
    {{-- Script for Social Sign-In --}}
    <script src="/js/auth-login.js"></script>
</x-app-layout>