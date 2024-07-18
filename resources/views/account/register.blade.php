@include('layout.user')
    <!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div class="w-full mx-auto py-24 px-6 flex" style="height: 720px">
  <div class="font-sans w-1/2">
  <div class="max-w-sm mx-auto px-6">
    <div class="relative flex flex-wrap">
      <div class="w-full relative">
        <div class="mt-6">
          <div class="text-center font-semibold text-black text-2xl">
            Đăng ký
          </div>
         
          <form class="mt-8" action="{{route('register')}}" method="POST">
            @csrf
            <div class="mx-auto max-w-lg">
              <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Họ và tên</span>
                <input placeholder="name" type="text" name="username"
                  class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-100 shadow-md focus:placeholder-gray-200 focus:bg-white focus:border-gray-600 focus:outline-none">
              </div>

              <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Tên đăng nhập</span>
                <input placeholder="account" type="text" name="email"
                  class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-100 shadow-md focus:placeholder-gray-200 focus:bg-white focus:border-gray-600 focus:outline-none">
              </div>
              <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Mật khẩu</span>
                <input placeholder="password" type="password" name="password"
                  class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-100 shadow-md focus:placeholder-gray-200 focus:bg-white focus:border-gray-600 focus:outline-none">
              </div>
              <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Nhập lại mật khẩu</span>
                <input placeholder="password" type="password"
                  class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-100 shadow-md focus:placeholder-gray-200 focus:bg-white focus:border-gray-600 focus:outline-none">
              </div>
              
                      <button type="submit" class="mt-3 text-lg font-semibold 
                bg-gray-800 w-full text-white rounded-lg
                px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                Đăng ký
              </button>
              <label class="block text-gray-500 font-bold my-4 text-center">
                Đã có tài khoản?
                <a
                href="{{route('login')}}"
                class="cursor-pointer tracking-tighter text-black border-b-2 border-gray-200 hover:border-gray-400"><span>
                  đăng nhập ngay</span></a></label>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pt-20">
  <img src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/login/image83-standard-scale-2-00x-gigapixel.png" alt="">
</div>
</div>

@include('layout.footer')