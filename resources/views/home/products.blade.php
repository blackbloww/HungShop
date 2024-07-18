@include('layout.user')

<p class="font-bold text-2xl text-center mt-4">Sản phẩm</p>
{{-- -------------menu start---------------- --}}

<div class="flex justify-end items-center w-full border-gray-300 mt-4 h-16">
    <div class="group inline-block text-left">
        <button
          class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-64">
                  <span class="pr-1 font-semibold flex-1">Sắp xếp</span>
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
        <ul class="bg-white rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-64 z-50">
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                <a href="{{ route('sort', ['sort' => 'asc', 'field' => 'price']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                    Giá tăng dần
                </a>
            </li>
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                <a href="{{ route('sort', ['sort' => 'desc', 'field' => 'price']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                    Giá giảm dần
                </a>
            </li>
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                <a href="{{ route('sort', ['field' => 'name', 'sort' => 'asc']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                    Từ A -> Z
                </a>
            </li>
            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                <a href="{{ route('sort', ['field' => 'name', 'sort' => 'desc']) }}" class="block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-100" role="menuitem">
                    Từ Z -> A
                </a>
            </li>
        </ul>
    </div>
</div>

{{-- -------------------products start---------------- --}}


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        @foreach ($products as $product)
            <div class="flex items-center justify-center p-2">
                <div class="relative w-full">
                    <a href="{{route('detail',$product->id)}}">
                    <img src="{{ asset($product->img)}}" alt="Product Image" class="w-full object-cover rounded-lg shadow-lg" style="height:350px">
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
</div>
<div class="mt-4">
    {{ $products->links() }}
</div>





<script>

    document.querySelectorAll('input[type="checkbox"][name="price"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            document.querySelectorAll('input[type="checkbox"][name="price"]').forEach(cb => {
                if (cb !== this) cb.checked = false;
            });
        });
    });
</script>

{{---------- dropdown --- --}}

<script>
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    let isDropdownOpen = false;

    function toggleDropdown() {
        isDropdownOpen = !isDropdownOpen;
        if (isDropdownOpen) {
            dropdownMenu.classList.remove('hidden');
        } else {
            dropdownMenu.classList.add('hidden');
        }
    }

    // toggleDropdown();

    dropdownButton.addEventListener('click', toggleDropdown);

    window.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            isDropdownOpen = false;
        }
    });
</script>

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


@include('layout.footer')