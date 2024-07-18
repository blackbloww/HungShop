@include('layout.user')
{{-- @php
  $total = 0;
  $sale = 0;
@endphp
<div class="bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Giỏ hàng</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">
@if(count($cartItems)>0)
    @foreach ($cartItems as $item)
    <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">

          <img src="{{ asset($item['img']) }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
          
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">{{$item->product['name']}}</h2>
              <p class="mt-1 text-xs text-gray-700">Size:{{$item['size']}}</p>
            </div>
            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <form action="{{route('cart.update',$item['id'])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center border-gray-100 quantity-controls">
                  <button class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="decreaseQuantity({{ $item['id'] }})"> - </button>
                  <input id="quantity-{{ $item['id'] }}" class="h-8 w-8 border bg-white text-center text-xs outline-none" name="quantity" type="number" value="{{ $item['quantity'] }}" min="1" />
                  <button class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="increaseQuantity({{ $item['id'] }})"> + </button>
                </div>
              </form>
              <div class="flex items-center space-x-4">
                <p class="text-sm">{{number_format($item['price'],0,',','.')}}đ</p>
              </div>
              <form id="delete-form-{{ $item['id'] }}" action="{{ route('cart.remove', $item['id']) }}" method="POST" onsubmit="return confirmDelete(event, {{ $item['id'] }})">
                @csrf
                @method('DELETE')
                  <button type="submit">
                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 7H20" stroke="#fa0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10L7.70141 19.3578C7.87432 20.3088 8.70258 21 9.66915 21H14.3308C15.2974 21 16.1257 20.3087 16.2986 19.3578L18 10" stroke="#fa0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#fa0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                  </button>
              </form>
            </div>
          </div>
        </div>
        @php
          $itemTotal = $item['quantity'] * $item['price'];
          $total += $itemTotal;
          $sale += $item['sale']*$item['quantity'];
        @endphp

    @endforeach
   
      </div>
      <!-- Sub total -->
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Tổng tiền:</p>
          <p class="text-gray-700">{{ number_format($total, 0, ',', '.') }}đ</p>

        </div>
        <div class="flex justify-between">
          <p class="text-gray-700">Triết khấu</p>
          <p class="text-gray-700">{{number_format($sale, 0, ',', '.')}}đ</p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Tổng tiền: </p>
          <p class="text-lg font-bold">  {{ number_format($total-$sale, 0, ',', '.') }}đ</p>
        </div>
        <a href="{{route('cart.check')}}"><button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 text-blue-50 hover:bg-blue-600"> Thanh toán</button></a>
      </div>
    </div>
</div> 
@else 
  Bạn chưa mua gì!!!!!!!!! 
  @endif --}}




  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="app" class="w-full h-full bg-gradient-to-r from-gray-900 to-gray-300 dark:bg-gray-900 overflow-y-auto overflow-x-hidden fixed" id="chec-div">
  <div class="w-full absolute z-10 right-0 h-full overflow-x-hidden transform translate-x-0 transition ease-in-out duration-700" id="checkout">
    <div class="flex items-end lg:flex-row flex-col justify-end" id="cart">
      <div class="lg:w-1/2 md:w-8/12 w-full lg:px-8 lg:py-14 md:px-6 px-4 md:py-8 py-4 bg-white dark:bg-gray-800 overflow-x-hidden lg:h-screen h-auto" id="scroll">
        <p class="lg:text-4xl text-3xl font-black leading-10 text-gray-800 dark:text-white pt-3">Giỏ hàng</p>
        @foreach ($cartItems as $item)
          @php
            $total = 0;
            $sale = 0;
             $itemTotal = $item['quantity'] * $item['price'];
          $total += $itemTotal;
          $sale += $item['sale']*$item['quantity'];
          @endphp
        <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
          <div class="flex md:w-16 2xl:w-16 w-16 items-center justify-center">
            <input type="checkbox" class="h-5 w-5" value="id-1" @click="toggleCheckbox($el, {{$item['price']}},{{ $item['sale']*$item['quantity']}})" />
          </div>
          <div class="md:w-4/12 2xl:w-1/4 w-full">
            <img src="{{ asset($item['img']) }}" alt="...." class="w-44 h-44 object-center object-cover md:block hidden" />
          </div>
          <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
            {{-- <p class="text-base leading-3 text-black dark:text-white md:pt-0 pt-4">{{$item->product['name']}}</p> --}}
            <div class="flex items-center justify-between w-full pt-1">
              <p class="text-base font-black leading-none text-gray-800 dark:text-white">{{$item->product['name']}}</p>
              
              <form action="{{route('cart.update',$item['id'])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center border-gray-100 quantity-controls">
                  <button class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="decreaseQuantity({{ $item['id'] }})"> - </button>
                  <input id="quantity-{{ $item['id'] }}" class="h-8 w-8 border bg-white text-center text-xs outline-none" name="quantity" type="number" value="{{ $item['quantity'] }}" min="1" />
                  <button class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" onclick="increaseQuantity({{ $item['id'] }})"> + </button>
                </div>
              </form>
            </div>
            <p class="text-xs leading-3 text-gray-600 dark:text-white pt-2">Size: {{$item['size']}}</p>
            <p class="text-xs leading-3 text-gray-600 dark:text-white py-4">Khuyến mãi: -{{number_format($item['sale'],0,',','.')}}đ</p>
            <p class="w-96 text-xs leading-3 text-gray-600 dark:text-white">Đơn giá: {{number_format($item['price'],0,',','.')}}đ</p>
            <div class="flex items-center justify-between">
              <div class="flex">
                <form id="delete-form-{{ $item['id'] }}" action="{{ route('cart.remove', $item['id']) }}" method="POST" onsubmit="return confirmDelete(event, {{ $item['id'] }})">
                  @csrf
                  @method('DELETE')
                    <button type="submit">
                      <p class="text-xs leading-3 underline text-red-500 cursor-pointer">Xóa</p>
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 dark:bg-gray-900 h-full">
        <div class="flex flex-col lg:h-screen h-auto lg:px-8 md:px-7 px-4 lg:py-20 md:py-10 py-6 justify-between overflow-y-auto">
          <div>
            <p class="lg:text-3xl text-3xl font-black leading-9 text-gray-800 dark:text-white">Thông tin đơn hàng</p>
            <div class="flex items-center justify-between pt-16">
              <p class="text-base leading-none text-gray-800 dark:text-white">Tổng tiền sản phẩm</p>
              <p class="text-base leading-none text-gray-800 dark:text-white"><span x-text="formatNumber(price)"></p>
            </div>
            <div class="flex items-center justify-between pt-5">
              <p class="text-base leading-none text-gray-800 dark:text-white">Giảm</p>
              <p class="text-base leading-none text-gray-800 dark:text-white">-<span x-text="formatNumber(sale)">></p>
            </div>
            
          </div>
          <div>
            <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
              <p class="text-2xl leading-normal text-gray-800 dark:text-white">Tổng thanh toán</p>
              <p class="text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white"><span x-text="formatNumber(total)"></p>
            </div>
            <a href="{{route('cart.check')}}" class="text-base leading-none w-full py-3 px-5 bg-gray-800 border border-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white hover:bg-gray-700 transition duration-300">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<script>
  document.addEventListener("alpine:init", () => {
      Alpine.data("app", () => ({
          total: 0,
          sale: 0,
          price: 0,
          selected: [],

          toggleCheckbox(element, priceAmount, saleAmount) {
              if (element.checked) {
                  this.selected.push(element.value);
                  this.price += priceAmount;
                  this.sale += saleAmount;
                  this.total = this.price - this.sale; // Cập nhật giá trị total dựa trên price và sale

              } else {
                  const index = this.selected.indexOf(element.value);

                  if (index > -1) this.selected.splice(index, 1);

                  this.price -= priceAmount;
                  this.sale -= saleAmount;
                  this.total = this.price - this.sale; // Cập nhật giá trị total dựa trên price và sale
              }
          },
          formatNumber(number) {
              return new Intl.NumberFormat().format(number)+' đ';
          }
      }));
  });
</script>




<script>
  function confirmDelete(event, itemId) {
      event.preventDefault(); // Prevent the form from submitting immediately
  
      Swal.fire({
          title: 'Bạn có chắc chắn?',
          text: "Bạn sẽ không thể hoàn tác hành động này!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Có, xóa nó!',
          cancelButtonText: 'Hủy'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('delete-form-' + itemId).submit();
          }
      });
  }
  
  function increaseQuantity(itemId) {
      var quantityInput = document.getElementById('quantity-' + itemId);
      var currentQuantity = parseInt(quantityInput.value);
      quantityInput.value = currentQuantity + 1;
      // Optionally, you can send an AJAX request to update the quantity in the backend
  }
  
  function decreaseQuantity(itemId) {
      var quantityInput = document.getElementById('quantity-' + itemId);
      var currentQuantity = parseInt(quantityInput.value);
      if (currentQuantity > 1) {
          quantityInput.value = currentQuantity - 1;
          // Optionally, you can send an AJAX request to update the quantity in the backend
      }
  }
  </script>


