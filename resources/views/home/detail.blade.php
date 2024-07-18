@include('layout.user')

<div class="flex mx-auto p-4">
    <!-- Hình ảnh sản phẩm -->
    <div class="flex-shrink-0 items-center justify-center mr-4 w-1/2">
        <div class="bg-white rounded-lg p-4 flex justify-end">
            <img src="{{ asset($product->img) }}" alt="Product Image" class="w-auto h-auto object-cover rounded-lg mb-4">
        </div>
    </div>
    
    
    <!-- Thông tin sản phẩm -->
    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-1/2" id="size-form">
        @csrf
        <div class="flex flex-col">
            <div>
                <h1 class="text-2xl font-bold mb-4">Tên sản phẩm: {{ $product->name }}</h1>
                <p class="text-xl font-semibold text-gray-800 mb-4">Giá: {{ number_format($product->price, 0, ',', '.') }} đ</p>
    
                <!-- Kích thước sản phẩm -->
                <div class="flex mb-4">
                    <span class="mr-2">Kích thước:</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                        <label>
                            <input type="radio" value="s" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-center px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">S</h2>
                            </div>
                        </label>
                        <label>
                            <input type="radio" value="m" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">M</h2>
                            </div>
                        </label>
                        <label>
                            <input type="radio" value="l" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">L</h2>
                            </div>
                        </label>
                        <label>
                            <input type="radio" value="xl" class="peer hidden" name="size">
                            <div class="hover:bg-gray-50 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group peer-checked:border-blue-500">
                                <h2 class="font-medium text-gray-700">XL</h2>
                            </div>
                        </label>
                    </div>
                </div>
    
                <div class="flex items-center border-gray-100 mb-4">
                    <span class="mr-2">Số lượng: </span>
                    <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="decreaseQuantity()"> - </span>
                    <input id="quantity-input" class="h-8 w-8 border bg-white text-center text-xs outline-none" name="quantity" type="number" value="1" min="1">
                    <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="increaseQuantity()"> + </span>
                </div>
    
                <input type="hidden" name="sale" value="{{ $product->sale }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <input type="hidden" name="img" value="{{ $product->img }}">
                <input type="hidden" name="name" value="{{ $product->name }}">

    
            </div>
    
            <div class="flex">
                <button class="relative h-[50px] w-40 overflow-hidden border border-red-500 bg-red-500 text-white shadow-2xl transition-all before:absolute before:left-0 before:right-0 before:top-0 before:h-0 before:w-full before:bg-red-500 before:duration-500 after:absolute after:bottom-0 after:left-0 after:right-0 after:h-0 after:w-full after:bg-red-500 after:duration-500 hover:text-white hover:shadow-green-900 hover:before:h-2/4 hover:after:h-2/4">
                    <span class="relative z-10">Mua ngay</span>
                </button>
              
                  <button type="button" id="add-to-cart" class="relative flex h-[50px] w-40 items-center justify-center overflow-hidden bg-blue-600 font-medium text-white shadow-2xl transition-all duration-300 before:absolute before:inset-0 before:border-0 before:border-white before:duration-100 before:ease-linear hover:bg-white hover:text-blue-600 hover:shadow-blue-600 hover:before:border-[25px]">
                    <span class="relative z-10">Thêm vào giỏ hàng</span>
                </button>

                <a href="#" data-product-id="{{ $product->id }}" class="add-to-favorites relative flex h-[50px] w-40 items-center justify-center overflow-hidden bg-gray-800 text-white shadow-2xl transition-all before:absolute before:h-0 before:w-0 before:rounded-full before:bg-pink-500 before:duration-500 before:ease-out hover:shadow-pink-500 hover:before:h-56 hover:before:w-56">
                    @php
                        $isFavorited = in_array($product->id, $userFavorites);
                    @endphp
                    @if($isFavorited)
                        <img src="/storage/img/love.png" alt="Đã thích" class="z-10 w-8 h-8 favorite-icon" data-favorited="true" aria-hidden="true">
                        
                    {{-- <span class="relative z-10"><i class="fas fa-heart text-lg leading-none" aria-hidden="true"></i></span>  --}}
                    @else
                        <span class="relative z-10"><i class="fas fa-heart text-lg leading-none" aria-hidden="true" data-favorited="true"></i></span> 
                        
                    {{-- <svg version="1.1" class="w-8 h-8 favorite-icon" data-favorited="false" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 37 32" enable-background="new 0 0 37 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#ffffff" d="M33.582,2.483c-1.776-1.56-4.077-2.418-6.481-2.418c-2.767,0-5.49,1.134-7.472,3.112l-0.781,0.778 c-0.188,0.188-0.508,0.188-0.697,0l-1.027-1.024C15.23,1.041,12.711,0,10.032,0C7.415,0,4.938,1,3.059,2.814 c-1.87,1.805-2.911,4.287-2.933,6.988c-0.023,2.824,1.095,5.573,3.067,7.541l14.252,14.22C17.728,31.845,18.103,32,18.5,32 s0.772-0.155,1.055-0.437L34.061,17.09c1.952-1.948,3.021-4.645,2.934-7.399C36.906,6.897,35.693,4.338,33.582,2.483z M33.355,16.382L18.849,30.855c-0.188,0.188-0.51,0.188-0.697,0L3.899,16.635c-1.784-1.779-2.794-4.267-2.773-6.824 c0.02-2.431,0.953-4.66,2.627-6.277C5.445,1.9,7.675,1,10.032,1c2.413,0,4.681,0.938,6.387,2.64l1.026,1.024 c0.565,0.564,1.545,0.564,2.11,0l0.78-0.778c1.796-1.792,4.263-2.82,6.766-2.82c2.161,0,4.228,0.77,5.821,2.169 c1.902,1.67,2.993,3.974,3.073,6.488C36.075,12.238,35.138,14.603,33.355,16.382z"></path> </g> </g></svg> --}}
                    @endif
                </a>

            </div>

            <a href="#" class="focus:outline-none mt-4 flex items-center" onclick="my_modal_6.showModal()"><svg class="w-4 h-4" viewBox="0 0 22 22" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" id="svg6190" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><metadata id="metadata6196"><rdf:rdf><cc:work><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type><dc:title></dc:title><dc:date>2015</dc:date><dc:creator><cc:agent><dc:title>Timothée Giet</dc:title></cc:agent></dc:creator><cc:license rdf:resource="http://creativecommons.org/licenses/by-sa/4.0/"></cc:license></cc:work><cc:license rdf:about="http://creativecommons.org/licenses/by-sa/4.0/"><cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction"></cc:permits><cc:permits rdf:resource="http://creativecommons.org/ns#Distribution"></cc:permits><cc:requires rdf:resource="http://creativecommons.org/ns#Notice"></cc:requires><cc:requires rdf:resource="http://creativecommons.org/ns#Attribution"></cc:requires><cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks"></cc:permits><cc:requires rdf:resource="http://creativecommons.org/ns#ShareAlike"></cc:requires></cc:license></rdf:rdf></metadata><path style="color:#000000;display:inline;overflow:visible;visibility:visible;fill:#373737;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1;marker:none;enable-background:accumulate" d="M7 3v16l8-7.988z" id="path3308"></path></g></svg>  HƯỚNG DẪN MUA HÀNG:</a>
            <a href="#" class="focus:outline-none mt-4 flex items-center" onclick="my_modal_5.showModal()"><svg class="w-4 h-4" viewBox="0 0 22 22" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" id="svg6190" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><metadata id="metadata6196"><rdf:rdf><cc:work><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type><dc:title></dc:title><dc:date>2015</dc:date><dc:creator><cc:agent><dc:title>Timothée Giet</dc:title></cc:agent></dc:creator><cc:license rdf:resource="http://creativecommons.org/licenses/by-sa/4.0/"></cc:license></cc:work><cc:license rdf:about="http://creativecommons.org/licenses/by-sa/4.0/"><cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction"></cc:permits><cc:permits rdf:resource="http://creativecommons.org/ns#Distribution"></cc:permits><cc:requires rdf:resource="http://creativecommons.org/ns#Notice"></cc:requires><cc:requires rdf:resource="http://creativecommons.org/ns#Attribution"></cc:requires><cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks"></cc:permits><cc:requires rdf:resource="http://creativecommons.org/ns#ShareAlike"></cc:requires></cc:license></rdf:rdf></metadata><path style="color:#000000;display:inline;overflow:visible;visibility:visible;fill:#373737;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1;marker:none;enable-background:accumulate" d="M7 3v16l8-7.988z" id="path3308"></path></g></svg>  HƯỚNG DẪN CHỌN SIZE:</a>

        </div>
    </form>
</div>


{{-- check size  --}}
<script>
    document.getElementById('size-form').addEventListener('submit', function(event) {
        const sizeSelected = document.querySelector('input[name="size"]:checked');
        if (!sizeSelected) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Vui lòng chọn kích thước trước khi tiếp tục!',
                customClass: {
                    confirmButton: 'btn btn-red'
                },
                buttonsStyling: false
            });
        }
    });

    document.getElementById('add-to-cart').addEventListener('click', function() {
        const sizeSelected = document.querySelector('input[name="size"]:checked');
        if (!sizeSelected) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Vui lòng chọn kích thước trước khi tiếp tục!',
                customClass: {
                    confirmButton: 'btn btn-red'
                },
                buttonsStyling: false
            });
            return;
        }

        const formData = $('#size-form').serialize();

        $.ajax({
            url: "{{ route('cart.add', $product->id) }}",
            method: 'POST',
            data: formData,
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Có lỗi xảy ra khi thêm vào giỏ hàng. Vui lòng thử lại sau.',
                    customClass: {
                        confirmButton: 'btn btn-red'
                    },
                    buttonsStyling: false
                });
            }
        });
    });

    // Custom styles for SweetAlert2
    const style = document.createElement('style');
    style.innerHTML = `
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-red {
            background-color: #f56565;
            color: white;
            border: none;
        }
        .btn-red:hover {
            background-color: #e53e3e;
        }
    `;
    document.head.appendChild(style);
</script>


{{-- check like  --}}
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
                        $icon.replaceWith('<span class="relative z-10"><i class="fas fa-heart text-lg leading-none" aria-hidden="true"></i></span>')
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
<script>
    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity-input');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity-input');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }
</script>

<dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box p-6 bg-white rounded-lg shadow-lg">
        <h3 class="text-lg font-bold mb-4 text-4xl">Hướng dẫn chọn size</h3>
        <p class="mb-4">01. Vẽ khung bàn chân<br>
            Đặt bàn chân lên tờ giấy trắng, dùng bút đánh dấu theo khung bàn chân trên giấy</p>
        <p class="mb-4">02. Đo chiều dài bàn chân<br>
            Dùng thước đo chiều lớn nhất từ mũi chân đến gót chân trên khung bàn chân đã đánh dấu</p>
        <p class="mb-4">03. Đo độ rộng vòng chân<br>
            Lấy thước dây quấn quanh 1 vòng bàn chân từ khớp ngón chân cái đến khớp ngón chân út</p>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn bg-red-500 text-white px-4 py-2 rounded-md focus:outline-none">Close</button>
            </form>
        </div>
    </div>
    
</dialog>

<dialog id="my_modal_6" class="modal modal-bottom sm:modal-middle w-1/3 h-2/3 overflow-x-auto">
    <div class="modal-box p-6 bg-white rounded-lg shadow-lg w-full overflow-x-auto">
        <h3 class="text-lg font-bold mb-4 text-4xl">Hướng dẫn mua hàng</h3>
        <p class="mb-4">BƯỚC 1: TÌM KIẾM VÀ LỰA CHỌN SẢN PHẨM YÊU THÍCH<br>
            Quý khách có thể tìm kiếm sản phẩm theo 2 cách
            </p>
        <p class="mb-4">Cách 1: Nhập tên hoặc mã sản phẩm vào thanh công cụ tìm kiếm<br>
            Dùng thước đo chiều lớn nhất từ mũi chân đến gót chân trên khung bàn chân đã đánh dấu</p>
        <p class="mb-4">Cách 2: Tìm theo danh mục sản phẩm trên thanh menu (Online Exclusive; BST mới – Bao gồm các sản phẩm đầm, áo, chân váy...)
            
            - Sau khi tìm kiếm và lựa chọn được sản phẩm yêu thích, Quý khách vui lòng chọn kích cỡ và số lượng sản phẩm muốn mua và chọn mua bằng cách bấm chuột vào nút "THÊM VÀO GIỎ".
            
            - Khi đã lựa chọn được đủ các sản phẩm cần mua, khách hàng click vào icon giỏ hàng trên góc phải màn hình. Quý khách có thể chọn thêm/bớt số lượng sản phẩm tại đây và chọn "THANH TOÁN" để tiến hành đặt hàng online.<br>
            Lấy thước dây quấn quanh 1 vòng bàn chân từ khớp ngón chân cái đến khớp ngón chân út</p>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn bg-red-500 text-white px-4 py-2 rounded-md focus:outline-none">Close</button>
            </form>
        </div>
    </div>
    
</dialog>


<!-- detail------------ -->
<div class="bg-gray-100 font-sans flex items-center justify-center w-full">
    <div x-data="{ openTab: 1 }" class="p-8">
        <div class="w-full">
            <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md w-full">
                <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1, 'text-blue-600': openTab !== 1 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Mô tả sản phẩm</button>
                <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2, 'text-blue-600': openTab !== 2 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Đánh giá</button>
            </div>

            <div x-show="openTab === 1" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600" style="display: none;">
                <h2 class="text-2xl font-semibold mb-2 text-blue-600">TÊN SẢN PHẨM: {{$product->name}}</h2>
                <p class="text-gray-700">Mô tả: {{ $product->description }}</p>
            </div>

            <div x-show="openTab === 2" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600" style="display: none; min-width:500px;">
                <div class="mt-4 rounded shadow">
                    <div class="bg-gray-100 p-3 rounded-t">
                        <h6 class="text-lg font-semibold mb-0">Đánh giá sản phẩm</h6>
                    </div>
                
                    @foreach($commands as $key => $command)
                        <div class="review bg-white shadow-md rounded-md p-4 @if ($key > 0) hidden @endif">
                            <div class="flex items-center">
                                <strong class="text-gray-900">{{ $command->user->name }}</strong>
                                <div class="ml-auto flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $command->rating)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-400 w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M5.753.432a1.42 1.42 0 0 1 2.494 0l1.879 3.815 4.198.612a1.42 1.42 0 0 1 .786 2.419l-3.046 2.97.719 4.184a1.42 1.42 0 0 1-2.064 1.497l-3.75-1.97-3.75 1.97a1.42 1.42 0 0 1-2.064-1.497l.72-4.184-3.047-2.97a1.42 1.42 0 0 1 .786-2.42l4.197-.612 1.88-3.814z"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-300 w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M5.753.432a1.42 1.42 0 0 1 2.494 0l1.879 3.815 4.198.612a1.42 1.42 0 0 1 .786 2.419l-3.046 2.97.719 4.184a1.42 1.42 0 0 1-2.064 1.497l-3.75-1.97-3.75 1.97a1.42 1.42 0 0 1-2.064-1.497l.72-4.184-3.047-2.97a1.42 1.42 0 0 1 .786-2.42l4.197-.612 1.88-3.814z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                    
                            <div class="flex mt-2">
                                <p class="text-sm text-gray-600 pl-2">Mặt hàng: {{ Str::limit($command->product->name, 15, '...') }} x {{ $command->quantity }}</p>
                                <div class="ml-auto">
                                    <p class="text-sm text-gray-600">{{ $command->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            
                            <p class="text-gray-800 mt-2">{{ $command->review }}</p>
                        </div>
                        @if (!$loop->last)
                            <hr class="my-4">
                        @endif
                    @endforeach
                    
                    @if (count($commands) > 1)
                        <div id="read-more-button" class="text-center mt-3">
                            <button class="btn btn-outline-primary" onclick="toggleReviews()">Xem thêm</button>
                        </div>
                    @endif
                </div>
            </div>                                                                      
        </div>

    </div>
</div>

<script>
    function toggleReviews() {
        var reviews = document.querySelectorAll('.review');
        var button = document.getElementById('read-more-button');

        for (var i = 1; i < reviews.length; i++) {
            reviews[i].style.display = 'block';
        }

        button.style.display = 'none';
    }
</script>

@include('layout.footer')