<x-app-layout>
    <link rel="stylesheet" href="/css/login.css">

    <div class="d-flex flex-row align-items-center position-absolute w-100 h-100 pe-5">
        <form class="form-login ms-auto h-auto">
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
                <div class="form-label-group mb-4">
                    <label for="inputEmail">Enter your username or email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                </div>
                <div class="form-label-group mb-4">
                    <label for="inputPassword">Enter your Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                <div class="text-end mb-3">
                    <a href="#" class="bm-font-clr1">Forgot Password</a>
                </div>
                <button id="btn-success-bm" class="btn btn-lgbtn-block w-100" type="submit">Log in</button>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <div class="row">
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
                        <img src="AGambar/man and woman working with laptop.png" alt="" 
                        style="width: auto; height: 250px;">
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
    </div>
</x-app-layout>