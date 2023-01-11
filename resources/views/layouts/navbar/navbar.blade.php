 <section class="header">
     <header class="p-3 mb-3 border-bottom">
         <div class="container">
             <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                 <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                     <i data-feather="home" class="text-black mx-2"></i>
                 </a>

                 <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                     @if ($active === 'home')
                         <li><a href="/home" class="nav-link px-2 link-secondary text-primary">Home</a></li>
                         <li><a href="/MenuMakanan" class="nav-link px-2 link-dark">Daftar Menu</a></li>
                         <li><a href="/pesanan" class="nav-link px-2 link-dark">Pesanan</a></li>
                         {{-- <li><a href="/dashboard" class="nav-link px-2 link-dark">Dashboard</a></li> --}}
                     @elseif ($active === 'daftarMenu')
                         <li><a href="/home" class="nav-link px-2 link-secondary ">Home</a></li>
                         <li><a href="/MenuMakanan" class="nav-link px-2 link-dark text-primary">Daftar Menu</a></li>
                         <li><a href="/pesanan" class="nav-link px-2 link-dark">Pesanan</a></li>
                         {{-- <li><a href="/dashboard" class="nav-link px-2 link-dark">Dashboard</a></li> --}}
                     @elseif ($active === 'pesanan')
                         <li><a href="/home" class="nav-link px-2 link-secondary ">Home</a></li>
                         <li><a href="/MenuMakanan" class="nav-link px-2 link-dark ">Daftar Menu</a></li>
                         <li><a href="/pesanan" class="nav-link px-2 link-dark text-primary">Pesanan</a></li>
                         {{-- <li><a href="/dashboard" class="nav-link px-2 link-dark">Dashboard</a></li> --}}
                     @elseif ($active === 'editMode')
                         <li><a href="/destroyAll" class="nav-link px-2 link-secondary ">Keluar
                                 Edit Mode</a></li>
                     @elseif ($active === 'null')
                     @else
                         <li><a href="/home" class="nav-link px-2 link-secondary">Home</a></li>
                         <li><a href="/MenuMakanan" class="nav-link px-2 link-dark">Daftar Menu</a></li>
                         <li><a href="/pesanan" class="nav-link px-2 link-dark">Pesanan</a></li>
                         {{-- <li><a href="/dashboard" class="nav-link px-2 link-dark text-primary">Dashboard</a></li> --}}
                     @endif


                     @auth
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 Welcome back, {{ auth()->user()->name }}
                             </a>
                             <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="/dashboard"><i
                                             class="bi bi-file-earmark-bar-graph-fill"></i>
                                         My
                                         Dashboard</a></li>
                                 <li>
                                     <hr class="dropdown-divider">

                                 </li>
                                 <li>
                                     <form action="/logout" method="post">
                                         @csrf
                                         <button type="submit" class="dropdown-item"><i
                                                 class="bi bi-arrow-left-square"></i>
                                             Logout</button>
                                     </form>
                                 </li>
                             </ul>
                         </li>
                     @else
                         <li class="nav-item">
                             <a href="/login" class="nav-link text-muted"><button type="button"
                                     class="btn btn-sm btn-warning">Login</button></a>
                         </li>
                     @endauth
                 </ul>




             </div>
         </div>
     </header>
 </section>
