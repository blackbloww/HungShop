@include('layout.user')

<form action="{{ route('cart.store') }}" method="POST" id="checkout-form" onsubmit="event.preventDefault(); confirmCheckout();">
    @csrf
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Xác nhận thông tin</h2>
    
        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-medium mb-2">Họ và tên</label>
            <input type="text" id="name" name="name" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            @error('name')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            @error('email')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="address" class="block text-gray-700 font-medium mb-2">Địa chỉ</label>
            <input type="text" id="address" name="address" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            @error('address')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="phone" class="block text-gray-700 font-medium mb-2">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            @error('phone')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Đơn hàng:</label>
            @php 
                $total = 0; 
                $i = 0;
                $sale = 0;
                $cost = 0;
            @endphp

            @foreach($cartItems as $details)
                @php 
                    $itemTotal = $details['quantity'] * $details['price'];
                    $total += $itemTotal;
                    $sale += $details['sale']*$details['quantity'];
                    $cost = $total - $sale;
                    $i++;
                @endphp
                
                <ul class="mb-4">
                    <li class="bg-gray-50 p-4 rounded-md shadow-sm">
                        <div class="flex items-center">
                            <div class="w-1/4">
                                <img src="{{ asset($details['img']) }}" alt="Product Image" class="w-20 h-20 object-cover rounded-md">
                            </div>
                            <div class="w-3/4 pl-4">
                                <span class="block text-gray-900 font-medium">{{ $details['name'] }}</span>
                                <span class="block text-gray-600">Size: {{ $details['size'] }}</span>
                                <p class="text-gray-900 font-semibold">-{{ number_format($sale, 0, ',', '.') }}đ</p>

                                <span class="text-gray-900 font-semibold">{{ number_format($details['price'], 0, ',', '.') }}đ</span>
                                <span class="text-gray-600">x{{ $details['quantity'] }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
    
        <div class="mb-6 text-right">
            <span class="text-xl font-semibold">Tổng số tiền ({{ $i }} mặt hàng): {{ number_format($cost, 0, ',', '.') }}đ</span>
        </div>
    <input type="hidden" value="{{$cost}}" name="cost">
        
    <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-md text-lg font-semibold hover:bg-red-600 transition duration-200">Thanh toán</button>
    </div>
</form>

<script>
    function confirmCheckout() {
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Bạn sẽ không thể hoàn tác hành động này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, thanh toán!',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>