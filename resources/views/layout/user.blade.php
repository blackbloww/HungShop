<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <link href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    
    
    <style>
        html,
        body {
          position: relative;
          height: 100%;
          overflow-x: hidden;
        }
    
        body {
          margin: 0;
          padding: 0;
        }
    
        swiper-container {
          width: 100%;
          height: 100%;
        }
    
        swiper-slide {
          /* text-align: center; */
          font-size: 18px;
          background: #fff;
          display: flex;
          justify-content: center;
          align-items: center;
        }
    
        swiper-slide img {
          display: block;
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
    
        .autoplay-progress {
          position: absolute;
          right: 16px;
          bottom: 16px;
          /* z-index: 10; */
          width: 48px;
          height: 48px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-weight: bold;
          color: var(--swiper-theme-color);
        }
    
        .autoplay-progress svg {
          --progress: 0;
          position: absolute;
          left: 0;
          top: 0px;
          /* z-index: 10; */
          width: 100%;
          height: 100%;
          stroke-width: 4px;
          stroke: var(--swiper-theme-color);
          fill: none;
          stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
          stroke-dasharray: 125.6;
          transform: rotate(-90deg);
        }
        .loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

      .loader {
            border: 8px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
      </style>
</head>
<body>
  
  {{-- <div class="loader-wrapper">
    <div class="loader">

    </div>
  </div> --}}


<div class="flex flex-wrap place-items-center sticky top-0 z-50 ">
    <section class="relative mx-auto">
        <!-- navbar -->
      <nav class="flex justify-between bg-gray-900 text-white w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
            <a href="{{route('home.index')}}" class="flex items-center border-b-gray-800">

                <h2 class="font-bold text-2xl">Hung <span class="bg-[#f84525] text-white px-2 rounded-md">Store</span></h2>
            </a>
      <!-- Nav Links -->
          <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <li>
              <a class="hover:text-gray-200" href="{{route('home.products')}}">Sản phẩm</a>
            </li>
            
            <li>
              <div class="group inline-block text-left">
                <button
                  class="outline-none focus:outline-none flex items-center min-w-16">
                          <span class="pr-1 flex-1">Danh mục</span>
                  <span>
                    <svg
                      class="fill-current h-4 w-4 transform group-hover:-rotate-180
                      transition duration-150 ease-in-out"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20">
                      <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                      />
                    </svg>
                  </span>
                </button>
                <ul class="bg-white rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32 z-50">
                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                      <a href="{{ route('products.category', ['name' => '1']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                        Váy
                    </a>
                    </li>
                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                      <a href="{{ route('products.category', ['name' => '2']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                        Quần
                      </a>
                    </li>
                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                      <a href="{{ route('products.category', ['name' => '3']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                        Áo
                      </a>
                    </li>
                    
                </ul>
            </div>  
            </li>
            <li><a class="hover:text-gray-200" href="#">Về chúng tôi</a></li>
            <li><a class="hover:text-gray-200" href="#" onclick="showContactForm()">Liên hệ</a></li>
          </ul>
          
            
        <!-------- Header Icons -------->
        <div class="hidden xl:flex items-center space-x-5 items-center">
        <!-------- search -------->
            <form action="{{route('products.search')}}" class="relative mx-auto w-max">
                <input type="search" placeholder="tìm kiếm......." name="search"
                      class="peer cursor-pointer relative z-10 h-10 w-10 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-lime-300 focus:pl-16 focus:pr-4" />
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent  px-3.5 peer-focus:border-lime-300 peer-focus:stroke-lime-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </form>
        <!-------- like -------->

            <a class="hover:text-gray-200" href="{{route('home.favorite')}}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
              </svg>
            </a>
        <!-------- cart -------->
        @auth
            @if (count($cartItems) > 0)
            <a class="flex items-center hover:text-gray-200" href="{{route('cart.index')}}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            <span class="flex absolute -mt-5 ml-4">
              <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                </span>
              </span>
          </a> 
          @endauth
            @else
            <a class="flex items-center hover:text-gray-200" href="{{route('cart.index')}}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </a>
            @endif  
            

    <!------------- Sign In / Register  -------------    -->
                            @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->role === 'admin')
                                            <a href="{{ route('admin.index') }}" class="text-sm font-medium text-white hover:text-red-200">Dashboard</a>
                                        @else
                                        
                                        <div class="group flex relative">
                                          <span class=" text-white px-2 py-1">
                                            <a href="{{route('home.nav')}}">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                              </svg>
                                            </a>
                                          </span>
                                          <span class="group-hover:opacity-100 transition-opacity bg-gray-100 px-1 text-sm text-gray-900 rounded-md absolute left-1/2 
                                          -translate-x-1/2 translate-y-full opacity-0 mx-auto z-50 h-auto">
                                              <a class="flex items-center hover:text-red-500 w-32 h-8 border-b-2" href="{{route('logout')}}">
                                                  Đăng xuất
                                              </a>
                                             
                                          </span>
                                      </div>
                                        @endif
                                        @else
                                        <div class="group flex relative">
                                          <span class=" text-white px-2 py-1">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                              </svg>
                                          </span>
                                          <span class="group-hover:opacity-100 transition-opacity bg-gray-100 px-1 text-sm text-gray-900 rounded-md absolute left-1/2 
                                          -translate-x-1/2 translate-y-full opacity-0 mx-auto z-50 h-auto">
                                              <a class="flex items-center hover:text-red-500 w-32 border-b-2" href="{{route('login')}}">
                                                  Đăng nhập
                                              </a>
                                              <a class="flex items-center hover:text-red-500 w-32" href="{{route('register')}}">
                                                  Đăng ký
                                              </a>
                                          </span>
                                      </div>
                                    </div>
                                       
                                    @endauth
                                @endif
            
          </div>
        </div>
      <!-- Responsive navbar -->
        <a class="xl:hidden flex mr-6 items-center" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
            </span>
          </span>
        </a>
        <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </a>
      </nav>
      
    </section>
  </div>
  <script>
    function showContactForm() {
      Swal.fire({
        title: 'Liên hệ',
        html: `
          <div class="grid gap-6 sm:grid-cols-2">
            <div class="relative z-0">
              <input type="text" id="name" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder="Nhập họ tên">
              <label for="name" class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Họ tên</label>
            </div>
            <div class="relative z-0">
          <input type="text" name="email" id="email" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
          <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500"> email</label>
        </div>
        <div class="relative z-0 col-span-2">
          <textarea name="message" id="message" rows="5" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" "></textarea>
          <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Lời nhắn </label>
        </div>
          </div>
        `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Gửi',
        cancelButtonText: 'Hủy',
        customClass: {
          confirmButton: 'bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-300',
          cancelButton: 'bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-300'
        },
        preConfirm: () => {
          const name = Swal.getPopup().querySelector('#name').value;
          const email = Swal.getPopup().querySelector('#email').value;
          const message = Swal.getPopup().querySelector('#message').value;

          if (!name || !email || !message) {
            Swal.showValidationMessage('Please enter name, email and message');
          }

          return { name: name, email: email, message: message };
        }
      }).then((result) => {
        if (result.isConfirmed) {
          // Send the form data using AJAX
          $.ajax({
            url: "{{ route('contacts.store') }}",
            method: "POST",
            data: {
              _token: "{{ csrf_token() }}",
              name: result.value.name,
              email: result.value.email,
              message: result.value.message
            },
            success: function(response) {
              Swal.fire('Đã gửi!', 'Your message has been sent.', 'success');
            },
            error: function(xhr) {
              Swal.fire('Oops...', 'Something went wrong!', 'error');
            }
          });
        }
      });
    }
  </script>

</body>
</html>