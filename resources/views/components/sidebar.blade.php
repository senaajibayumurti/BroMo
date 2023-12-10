<nav class="bm-openednav d-flex flex-column p-0">
    <ul class="nav d-flex flex-column">
        <li id="navbar-logo-container" class="nav-item fw-bold nav-link w-100 active pb-0">
            <img id="navbar-logo" src="\images\BroMo Tipografi.png" class="h-100 w-auto" alt="{{url('/')}}">
        </li>
        <li class="nav-item d-flex justify-content-end w-100">
            <a id="close-sidebar" class="nav-link">
                <i class="bi bi-chevron-double-left"></i>
            </a>
        </li>
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{url('/dashboard')}}" class="nav-link text-dark">
                <i class="bi bi-house"></i>
                <span class="nav-item-text" >HOME</span>
            </a>
        </li>

        {{-- SIDEBAR ITEMS OWNER --}}
        <li class="nav-item {{ request()->is('forecasting') ? 'active' : '' }}">
            <a href="{{url('/forecasting')}}" class="nav-link text-dark">
                <i class="bi bi-cloud"></i>
                <span class="nav-item-text" >FORECASTING</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('rekap-data') ? 'active' : '' }}">
            <a href="{{url('/rekap-data')}}" class="nav-link text-dark">
                <i class="bi bi-clipboard2-data"></i>
                <span class="nav-item-text" >REKAP DATA</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('panen') ? 'active' : '' }}">
            <a href="{{url('/panen')}}" class="nav-link text-dark">
                <i class="bi bi-database-add"></i>
                <span class="nav-item-text" >PANEN</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('pekerja') ? 'active' : '' }}">
            <a href="{{url('/pekerja')}}" class="nav-link text-dark">
                <i class="bi bi-people"></i>
                <span class="nav-item-text" >PEKERJA</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('kandang') ? 'active' : '' }}">
            <a href="{{url('/kandang')}}" class="nav-link text-dark">
                <i class="bi bi-bank"></i>
                <span class="nav-item-text" >KANDANG</span>
            </a>
        </li>
    
    {{-- SIDEBAR ITEMS FARMER --}}
        <li class="nav-item {{ request()->is('input-data') ? 'active' : '' }}">
            <a href="{{url('/input-data')}}" class="nav-link text-dark">
                <i class="bi bi-cloud"></i>
                <span class="nav-item-text" >INPUT DATA</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('input-panen') ? 'active' : '' }}">
            <a href="{{url('/input-panen')}}" class="nav-link text-dark">
                <i class="bi bi-clipboard2-data"></i>
                <span class="nav-item-text" >INPUT PANEN</span>
            </a>
        </li>
    </ul>

    <a id="btn-success-bm" href="{{url('/log-in')}}" class="nav-link text-dark text-start mt-auto p-3 w-100">
        <i class="bi bi-box-arrow-right"></i>
        <span class="nav-item-text" >LOG OUT</span>
    </a>  
</nav>