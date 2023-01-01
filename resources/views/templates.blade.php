<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <script src="https://cdn.tailwindcss.com"></script>
  
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <script defer src="https://unpkg.com/alpinejs-money@latest/dist/money.min.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
  
  @livewireStyles

  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          'sans': ['Poppins'],
          'serif': ['Poppins'],
          'mono': ['Poppins'],
          'display': ['Poppins'],
          'body': ['Poppins'],
        },
        container: {
          screens: {
            xl: "1240px",
          },
          center: true,
        },
        extend: {
          colors: {
            primary: '#545BE8',
            secondary: '#DDDDDD'
          }
        }
      }
    }
  </script>

  <title>Landing Page</title>
</head>

<body>

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

  <!-- Navbar -->
  <section id="navbar" class="bg-white">
    <div class="container flex justify-between items-center h-[80px]">
      <div class="logo flex gap-[8px] items-center">
        <img src="./assets/logo.png" class="w-[35px]">
        <span class="text-primary font-bold text-[14px] leading-[14px]">Obito Course</span>
      </div>
      <div class="menu flex items-center gap-[40px]">
        <ul class="flex gap-[40px]">
          <li><a href="/" class="text-[16px] leading-[24px] {{Request::segment(1) == '' ? 'font-bold' : ''}}">Home</a></li>
          <li><a href="/course" class="text-[16px] leading-[24px] {{Request::segment(1) == 'course' ? 'font-bold' : ''}}">Course</a></li>
          <li><a href="/order" class="text-[16px] leading-[24px] {{Request::segment(1) == 'order' ? 'font-bold' : ''}}">Order</a></li>
          @if (session()->has('token') && session()->get('role') == 2)
            <li><a href="/profile" class="text-[16px] leading-[24px] {{Request::segment(1) == 'profile' ? 'font-bold' : ''}}">Profile</a></li>
          @endif
        </ul>
        @if (!session()->has('token') && !session()->get('role') == 2)
          <button
            class="border-2 border-primary px-[40px] py-[8px] rounded-[10px] text-primary text-[12px] font-bold" data-modal-toggle="authentication-modal">Login</button>
          <button
            class="bg-primary px-[40px] py-[10px] rounded-[10px] text-white text-[12px] font-bold" data-modal-toggle="register-modal">Register</button>
        @else
            <a href="/logout"
            class="bg-primary px-[40px] py-[10px] rounded-[10px] text-white text-[12px] font-bold">Logout</a>
        @endif
      </div>
    </div>
  </section>

  @yield('content')

  @include('auth.login')
  @include('auth.register')

  @livewireScripts
  <script>
      var token = "{{$token}}";
      var idUser = {{$idUser}};
    document.addEventListener('alpine:init', () => {
        Alpine.data('data', () => ({
            isLoading: false,
            hidden : 'hidden',
            isOn: false,
            course: [],
            idPaket : 0,
            fetchUser() {
            this.isLoading = true
            fetch('http://localhost:8000/api/paket')
                .then(async response => {
                    data_course = await response.json()
                    this.isLoading = false
                    console.log(data_course)
                    const path = window.location.pathname.split("/");
                    console.log(path[1])
                    if(path[1] == ""){
                      for(let i = 0; i < data_course.data.length; i++){
                        this.course.push(data_course.data[i]);
                        if (i==1){
                          break;
                        }
                      }
                    }else{
                      this.course = data_course.data
                    }
                });
            },
            idUser : this.idUser,
            tes(id){
              this.idPaket = id
              this.isOn = !this.isOn
              console.log(this.idUser)
            },
          order: [],
          token : this.token,
          fetchOrder() {
          this.isLoading = true
          fetch('http://localhost:8000/api/pemesanan/orderOrtu', {
            headers: {
              'Authorization': `${this.token}`,
            },
          })
              .then(async response => {
                  order = await response.json()
                  this.order = order
                  this.isLoading = false
              });
          }
        }))
    })
  </script>
  <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

</body>

</html>