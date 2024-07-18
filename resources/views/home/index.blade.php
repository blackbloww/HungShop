@include('layout.user')

  {{---------------------- slidebar start  ------------------------}}
<swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="true" space-between="30"
    centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
    <swiper-slide><img src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/nam-moi-2024/18052024/1600x635-7.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/nam-moi-2024/18052024/artboard-1-3.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="https://elise.vn/media/wysiwyg/A-2024/cv-ss_1.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="https://elise.vn/media/wysiwyg/A-2024/cv-wow.jpg" alt=""></swiper-slide>
    <swiper-slide><img src="https://elise.vn/media/wysiwyg/ECOM/cv-0307.jpg" alt=""></swiper-slide>
    <div class="autoplay-progress" slot="container-end">
      <svg viewBox="0 0 48 48">
        <circle cx="24" cy="24" r="20"></circle>
      </svg>
      <span></span>
    </div>
  </swiper-container>




{{-- ---------------------top 4 new product start--------------  --}}
    <div class="text-center space-x-4 mt-8">
        <span class="text-4xl font-bold font-serif ">Sản phẩm mới</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        @foreach ($products as $product)
            <div class="flex items-center justify-center p-2">
            <div class="relative w-full h-full">
                <a href="{{route('detail',$product->id)}}">
                    <img src="{{$product->img}}" alt="Product Image" class="w-full h-full object-cover rounded-lg shadow-lg">
                </a>
                <p class="text-center">{{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}</p>
                <p class="text-center font-bold text-xl">{{number_format($product->price,0,',','.')}} đ</p>
                <a href="#" class="absolute top-0 right-0 text-white text-xs font-bold px-2 py-1 rounded-bl-lg add-to-favorites" data-product-id="{{ $product->id }}">
                    @php
                        $isFavorited = in_array($product->id, $userFavorites);
                        // echo var_dump($isFavorited)
                    @endphp
                        @if($isFavorited)
                        <img src="storage/img/love.png" alt="Đã thích" class="w-8 h-8 favorite-icon" data-favorited="true">
                    @else
                        <svg version="1.1" class="w-8 h-8 favorite-icon" data-favorited="false" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 37 32" enable-background="new 0 0 37 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#ffffff" d="M33.582,2.483c-1.776-1.56-4.077-2.418-6.481-2.418c-2.767,0-5.49,1.134-7.472,3.112l-0.781,0.778 c-0.188,0.188-0.508,0.188-0.697,0l-1.027-1.024C15.23,1.041,12.711,0,10.032,0C7.415,0,4.938,1,3.059,2.814 c-1.87,1.805-2.911,4.287-2.933,6.988c-0.023,2.824,1.095,5.573,3.067,7.541l14.252,14.22C17.728,31.845,18.103,32,18.5,32 s0.772-0.155,1.055-0.437L34.061,17.09c1.952-1.948,3.021-4.645,2.934-7.399C36.906,6.897,35.693,4.338,33.582,2.483z M33.355,16.382L18.849,30.855c-0.188,0.188-0.51,0.188-0.697,0L3.899,16.635c-1.784-1.779-2.794-4.267-2.773-6.824 c0.02-2.431,0.953-4.66,2.627-6.277C5.445,1.9,7.675,1,10.032,1c2.413,0,4.681,0.938,6.387,2.64l1.026,1.024 c0.565,0.564,1.545,0.564,2.11,0l0.78-0.778c1.796-1.792,4.263-2.82,6.766-2.82c2.161,0,4.228,0.77,5.821,2.169 c1.902,1.67,2.993,3.974,3.073,6.488C36.075,12.238,35.138,14.603,33.355,16.382z"></path> </g> </g></svg>
                    @endif
                </a>
            </div>
            </div>
        @endforeach
    </div>
{{-- ----------------------banner 1------------------- --}}
    <div class="flex mt-32 space-x-8">
        <div class="w-1/3 flex ml-20 items-center justify-center">
            <img src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/gumac3/ve06049/0-den-ve06049.png" class="w-64 rounded-full" alt="">
            {{-- <p class="text-lg font-bold text-center pl-4">Những kiểu dáng trẻ trung - năng động</p>    --}}
            <img src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/gumac3/ae06083/0.png" class="w-64 ml-10 mt-20 rounded-full" alt="">
        </div>
        <div class="mt-8">
            <a href="{{route('home.products')}}" class="inline-block ml-30">
                <button class="group border-yellow-500 border relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                    <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative">Xem ngay</span>
                </button>
            </a>
        </div>
        <div class="w-1/3">
            <img style="width:550px;" src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/nam-moi-2024/18052024/1000x1253.png" alt="">
        </div>
    </div>

{{----------------------------- category = 1 --------------------------------}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 mt-8">
    @foreach ($productsCategory1 as $product)
        <div class="flex items-center justify-center p-2">
            <div class="relative w-full h-full">
                <a href="{{route('detail',$product->id)}}">
                    <img src="{{$product->img}}" alt="Product Image" class="w-full h-80 object-cover rounded-lg shadow-lg">
                </a>
                <p class="text-center">{{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}</p>
                <p class="text-center font-bold text-xl">{{number_format($product->price,0,',','.')}} đ</p>
                <a href="#" class="absolute top-0 right-0 text-white text-xs font-bold px-2 py-1 rounded-bl-lg add-to-favorites" data-product-id="{{ $product->id }}">
                    @php
                        $isFavorited = in_array($product->id, $userFavorites);
                    @endphp
                    @if($isFavorited)
                        <img src="storage/img/love.png" alt="Đã thích" class="w-8 h-8 favorite-icon" data-favorited="true">
                    @else
                        <svg version="1.1" class="w-8 h-8 favorite-icon" data-favorited="false" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 37 32" enable-background="new 0 0 37 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#ffffff" d="M33.582,2.483c-1.776-1.56-4.077-2.418-6.481-2.418c-2.767,0-5.49,1.134-7.472,3.112l-0.781,0.778 c-0.188,0.188-0.508,0.188-0.697,0l-1.027-1.024C15.23,1.041,12.711,0,10.032,0C7.415,0,4.938,1,3.059,2.814 c-1.87,1.805-2.911,4.287-2.933,6.988c-0.023,2.824,1.095,5.573,3.067,7.541l14.252,14.22C17.728,31.845,18.103,32,18.5,32 s0.772-0.155,1.055-0.437L34.061,17.09c1.952-1.948,3.021-4.645,2.934-7.399C36.906,6.897,35.693,4.338,33.582,2.483z M33.355,16.382L18.849,30.855c-0.188,0.188-0.51,0.188-0.697,0L3.899,16.635c-1.784-1.779-2.794-4.267-2.773-6.824 c0.02-2.431,0.953-4.66,2.627-6.277C5.445,1.9,7.675,1,10.032,1c2.413,0,4.681,0.938,6.387,2.64l1.026,1.024 c0.565,0.564,1.545,0.564,2.11,0l0.78-0.778c1.796-1.792,4.263-2.82,6.766-2.82c2.161,0,4.228,0.77,5.821,2.169 c1.902,1.67,2.993,3.974,3.073,6.488C36.075,12.238,35.138,14.603,33.355,16.382z"></path> </g> </g></svg>
                    @endif
                </a>
            </div>
        </div>
    @endforeach
</div>



{{-- ----------------------banner 2------------------- --}}
<div class="flex mt-32 space-x-8">
    <div class="w-1/2 ml-10">
        <img style="width:550px;" src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/nam-moi-2024/18052024/1000x910.png" alt="">
    </div>
   
    <div class="mt-8">
        <a href="{{route('home.products')}}" class="inline-block ml-30">
            <button class="group border-yellow-500 border relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow">
                <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                <span class="relative">Xem ngay</span>
            </button>
        </a>
    </div>
    <div class="w-1/2 flex ml-20 items-center justify-center">
        <img src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/gumac/DE06032/0-DEN-DE06032.png" class="w-64 rounded-full" alt="">
        <img src="https://js0fpsb45jobj.vcdn.cloud/storage/upload/media/gumac/AE06057/0-TRANG-AE06057.png" class="w-64 ml-10 mt-20 rounded-full" alt="">
    </div>
</div>



{{----------------------------- category = 2 --------------------------------}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 mt-8">
    @foreach ($productsCategory2 as $product)
        <div class="flex items-center justify-center p-2">
            <div class="relative w-full h-full">
                <a href="{{route('detail',$product->id)}}">
                    <img src="{{$product->img}}" alt="Product Image" class="w-full h-80 object-cover rounded-lg shadow-lg">
                </a>
                <p class="text-center">{{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}</p>
                <p class="text-center font-bold text-xl">{{number_format($product->price,0,',','.')}} đ</p>
                <a href="#" class="absolute top-0 right-0 text-white text-xs font-bold px-2 py-1 rounded-bl-lg add-to-favorites" data-product-id="{{ $product->id }}">
                    @php
                        $isFavorited = in_array($product->id, $userFavorites);
                    @endphp
                    @if($isFavorited)
                        <img src="storage/img/love.png" alt="Đã thích" class="w-8 h-8 favorite-icon" data-favorited="true">
                    @else
                        <svg version="1.1" class="w-8 h-8 favorite-icon" data-favorited="false" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 37 32" enable-background="new 0 0 37 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#ffffff" d="M33.582,2.483c-1.776-1.56-4.077-2.418-6.481-2.418c-2.767,0-5.49,1.134-7.472,3.112l-0.781,0.778 c-0.188,0.188-0.508,0.188-0.697,0l-1.027-1.024C15.23,1.041,12.711,0,10.032,0C7.415,0,4.938,1,3.059,2.814 c-1.87,1.805-2.911,4.287-2.933,6.988c-0.023,2.824,1.095,5.573,3.067,7.541l14.252,14.22C17.728,31.845,18.103,32,18.5,32 s0.772-0.155,1.055-0.437L34.061,17.09c1.952-1.948,3.021-4.645,2.934-7.399C36.906,6.897,35.693,4.338,33.582,2.483z M33.355,16.382L18.849,30.855c-0.188,0.188-0.51,0.188-0.697,0L3.899,16.635c-1.784-1.779-2.794-4.267-2.773-6.824 c0.02-2.431,0.953-4.66,2.627-6.277C5.445,1.9,7.675,1,10.032,1c2.413,0,4.681,0.938,6.387,2.64l1.026,1.024 c0.565,0.564,1.545,0.564,2.11,0l0.78-0.778c1.796-1.792,4.263-2.82,6.766-2.82c2.161,0,4.228,0.77,5.821,2.169 c1.902,1.67,2.993,3.974,3.073,6.488C36.075,12.238,35.138,14.603,33.355,16.382z"></path> </g> </g></svg>
                    @endif
                </a>
            </div>
        </div>
    @endforeach
</div>








{{------------ script favorited ---------------}}
    <script>
        $(document).ready(function() {
        $('.add-to-favorites').on('click', function(e) {
            e.preventDefault();

            var $icon = $(this).find('.favorite-icon');
            var productId = $(this).data('product-id');
            var url = "{{ route('favorites.toggle') }}";

            @if(Auth::check())
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        product_id: productId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Cập nhật giao diện sau khi thành công
                        if ($icon.data('favorited')) {
                            $icon.replaceWith('<svg version="1.1" class="w-8 h-8 favorite-icon" data-favorited="false" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 37 32" enable-background="new 0 0 37 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#ffffff" d="M33.582,2.483c-1.776-1.56-4.077-2.418-6.481-2.418c-2.767,0-5.49,1.134-7.472,3.112l-0.781,0.778 c-0.188,0.188-0.508,0.188-0.697,0l-1.027-1.024C15.23,1.041,12.711,0,10.032,0C7.415,0,4.938,1,3.059,2.814 c-1.87,1.805-2.911,4.287-2.933,6.988c-0.023,2.824,1.095,5.573,3.067,7.541l14.252,14.22C17.728,31.845,18.103,32,18.5,32 s0.772-0.155,1.055-0.437L34.061,17.09c1.952-1.948,3.021-4.645,2.934-7.399C36.906,6.897,35.693,4.338,33.582,2.483z M33.355,16.382L18.849,30.855c-0.188,0.188-0.51,0.188-0.697,0L3.899,16.635c-1.784-1.779-2.794-4.267-2.773-6.824 c0.02-2.431,0.953-4.66,2.627-6.277C5.445,1.9,7.675,1,10.032,1c2.413,0,4.681,0.938,6.387,2.64l1.026,1.024 c0.565,0.564,1.545,0.564,2.11,0l0.78-0.778c1.796-1.792,4.263-2.82,6.766-2.82c2.161,0,4.228,0.77,5.821,2.169 c1.902,1.67,2.993,3.974,3.073,6.488C36.075,12.238,35.138,14.603,33.355,16.382z"></path> </g> </g></svg>');
                        } else {
                            $icon.replaceWith('<img src="storage/img/love.png" alt="Đã thích" class="w-8 h-8 favorite-icon" data-favorited="true">');
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: response.responseJSON.message
                        });
                    }
                });
            @else
                Swal.fire({
                    icon: 'warning',
                    title: 'Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích.',
                    showConfirmButton: true
                });
            @endif
        });
    });

    </script>

  <!-- Swiper JS -->
  <!-- Initialize Swiper -->
  <script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");

    const swiperEl = document.querySelector("swiper-container");
    swiperEl.addEventListener("autoplaytimeleft", (e) => {
      const [swiper, time, progress] = e.detail;
      progressCircle.style.setProperty("--progress", 1 - progress);
      progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    });
  </script>


{{-- ----------footer start  ------------}}
@include('layout.footer')