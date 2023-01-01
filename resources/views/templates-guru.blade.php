<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
     <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
</head>

<body class="bg-gray-100 font-family-karla flex">

    @php
        $token = '';
        $idUser = 0;
        if (Session::has("token")) {
        $token = session()->get('token');
        }
        if (Session::has("idUser")) {
        $idUser = session()->get('idUser');
        }
    @endphp

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Guru</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('guru.pemesanan')}}" class="flex items-centertext-white py-4 pl-6 nav-item {{Request::segment(2) == 'pemesanan' ? 'active-nav-link' : ''}}">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Pemesanan
            </a>
            <a href="{{route('guru.paket')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item {{Request::segment(2) == 'paket' ? 'active-nav-link' : ''}}">
                <i class="fas fa-table mr-3"></i>
                Harga Paket
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2">Selamat datang, {{session()->get('nama')}}</div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="http://localhost:8000/storage/{{session()->get('foto')}}">
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="{{route('guru.profile')}}" class="block px-4 py-2 account-link hover:text-white">Profile</a>
                    <a href="/logout" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        @yield('content-guru')

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

        <script>
            var token = "{{$token}}";
            var idUser = {{$idUser}};
          document.addEventListener('alpine:init', () => {
              Alpine.data('data', () => ({
                  isLoading: false,
                  hidden : 'hidden',
                  isOn: false,
                  idPemesanan : 0,
                  idUser : this.idUser,
                  updatePemesanan(id){
                    this.idPemesanan = id
                    this.isOn = !this.isOn
                    console.log(this.idUser)
                  },
                token : this.token,
              }))
          })
        </script>
        <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>

</html>