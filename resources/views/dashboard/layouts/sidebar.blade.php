<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="  position-sticky pt-3 sidebar-sticky">

        {{-- Home --}}
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Home</span>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>

        </ul>

        {{-- Orders / Pesanan --}}
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Order Management</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/all-order*') ? 'active' : '' }}"
                    href="/dashboard/all-order">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Semua Pesanan
                </a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/available-order*') ? 'active' : '' }}"
                    href="/dashboard/available-order">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Untuk di Proses
                </a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/completed-order*') ? 'active' : '' }}"
                    href="/dashboard/completed-order">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Pesanan Selesai
                </a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/canceled-order*') ? 'active' : '' }}"
                    href="/dashboard/canceled-order">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Pesanan di Batalkan
                </a>
            </li>
        </ul>


        {{-- Produk --}}
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Produk</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/produk*') ? 'active' : '' }}" href="/dashboard/produk">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Produk/Items
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }}" href="/dashboard/kategori">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Kategori
                </a>
            </li>
        </ul>

        {{-- Produk --}}
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Management</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/employee*') ? 'active' : '' }}" href="/dashboard/employee">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Employee
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span></span>
        </h6>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-light w-100 btn-outline-danger"><i
                    class="bi bi-arrow-left-square"></i>
                Logout <span data-feather="log-out" class="align-text-bottom"> </span></button>
        </form>





    </div>
</nav>
