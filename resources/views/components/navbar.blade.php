<nav class="navbar">
        <div class="logo">
            <a href="/"><img src="{{ asset('img/Asset 1 1.png') }}" alt="Logo">
            </a>
        </div>
        <div class="menu" id="menu-list">
            <a href="/">HOME</a>
            <!-- <div class="dropdown">
                <a href="/pbl" class="dropdown-toggle">PBL<i class="fa-solid fa-caret-down"></i></a>
                <div class="dropdown-menu ">
                    <a href="/pbl">WHAT IS PBL?</a>
                    <a href="/workspaces">WORKSPACE</a>
                    <a href="#">ROLES AND RESPONSIBILITIES </a>
                    <a href="#">INDUSTRY/CLIENT</a>
                </div>
            </div> -->
            <a href="/pbl">PBL</a>
            <a href="/posts">NEWS</a>
            <div class="dropdown">
                <a href="" class="dropdown-toggle">PROJECT<i class="fa-solid fa-caret-down"></i></a>
                <div class="dropdown-menu ">
                    <a href="/business">BUSINESS MANAGEMENT</a>
                    <a href="/electrical">ELECTRICAL ENGINEERING</a>
                    <a href="/informatics">INFORMATICS ENGINEERING</a>
                    <a href="/mechanical">MECHANICAL ENGINEERING</a>
                </div>
            </div>
            <a href="/trainings">TRAINING CENTER</a>
            <a href="/contactus">CONTACT US</a>

            <!-- <div class="search-bar" name="search">
                <button onclick="toggleSearch()">&#128269;</button>
                <div class="search-container">
                    <input type="text" placeholder="Search...">
                </div>
            </div> -->
        </div>
        @auth
        <div class=" ms-auto flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full object-cover" src="/img/Gyj.jpeg" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="hidden z-50 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
          </li>
          <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</button>
            </form>
            <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a> -->
          </li>
        </ul>
      </div>


        @else
        <div class="akun">
        <a href="/login"><i class="bi bi-person-circle"></i></a>
        </div>
        @endauth
        <div id="navbar-extra" class="navbar-extra">
            <a href="#" id="hamburger-menu"><i class="fa-solid fa-bars"></i></a>
        </div>
          
    </nav>
    <style>
        /* Navbar Css */
        
        .navbar {
            background-color: #000000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 7%;
            gap: 10px;
            position: fixed;
            right: 0;
            left: 0;
            top: 0;
            z-index: 9999;
        }

        .navbar .logo img {
            height: 3rem;
             border: none;
             outline: none;
        }
        .navbar .menu {
            display: flex;
            margin-left: auto;
        }

        .navbar .menu a::after {
            content: '';
            display: block;
            padding-bottom: 0.5rem;
            border-bottom: 1rem #2699CB;
            transform: scaleX(0);
            transition: 0.2s linear;
        }

        .navbar .menu a:hover::after {
            transform: scaleX(0.5);
        }

        .menu a {
            color: white;
            text-decoration: none;
            margin-left: 1rem;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .menu a:active {
            color: #2699CB;
            text-decoration: underline;
        }

        .menu a:hover {
            color: #2699CB;
        }

        /* Dropdown menu adjustment */
        .dropdown {
            position: relative;
            display: flex;
            align-items: center;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #222;
            min-width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 10;
            margin-left: 1rem;
        }

        .dropdown-menu a {
            display: block;
            padding: 5px 10px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .dropdown-menu a:hover {
            color: #2699CB;
        }

        .dropdown-menu.show {
            display: block;
        }

        .search-bar {
            display: hidden;
            position: relative;
            margin-left: 20px;
            margin-bottom: 10px;
        }

        .search-bar button {
            display: hidden;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            margin: 0;
            font-weight: normal;
        }

        .search-container {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: white;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            padding: 5px;
            width: 200px;
            z-index: 10;
        }

        .search-container input[type="text"] {
            border: none;
            outline: none;
            width: 100%;
            padding: 8px;
            font-family: 'Montserrat', sans-serif;
        }

        .search-container.active {
            display: block;
        }

        #hamburger-menu {
            display: none;
        }

        .navbar-extra a {
            text-decoration: none;
            color: #FFFFFF;
            font-size: 2rem;
        }

        .akun {
    margin-left: auto; /* Memindahkan tombol ke ujung kanan */
    padding: 0.3rem 0.8rem; /* Memberikan ruang tambahan */
    font-size: 2rem; /* Memperbesar ukuran ikon */
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%; /* Membuat sudut melengkung */
    transition: 0.3s ease;
}

.akun a {
    color: #fff; /* Warna teks */
    text-decoration: none;
}

.akun:hover {
    background-color: #1d82a6; /* Warna saat hover */
    transform: scale(1.1); /* Efek zoom */
    color: #ffffff;
}


        /* Media Queries */
        /* Laptop */
        @media (max-width: 1366px) {
            html { font-size: 75%; }
        }

        /* Mobile */
        @media (max-width: 450px) {
            html { font-size: 55%; }
        }

        /* Tablet */
        @media only screen and (max-width: 768px) {
            html { font-size: 62.5%; }

            #hamburger-menu {
                display: inline-block;
            }

            .navbar .menu {
                position: absolute;
                top: 100%;
                right: -100%;
                background: #000;
                width: 30rem;
                height: 100vh;
                transition: 0.3s;
                margin-left: auto;
            }

            .navbar .menu.active {
                right: 0;
                display: flex;
                flex-direction: column;
            }

            .navbar .menu a {
                text-align: left;
                margin: 1rem;
                padding: 0.5rem;
                font-size: 1.2rem;
                font-weight: bold;
            }

            .navbar .menu .search-bar {
                display: none;
            }

            .dropdown {
                position: relative;
                display: block;
                margin-left: 0;
            }

            .dropdown-menu {
                display: none;
                position: static;
                background-color: #222;
            }

            .dropdown-menu a {
                padding: 10px 20px;
                font-size: 14px;
            }

            .dropdown-menu.show {
                display: block;
            }
        }
    </style>