@include('layout.user')

<div class="flex w-full">
@include('layout.nav')

<div class="min-h-96">
<h2 class="text-2xl font-bold text-center mt-12 mb-10">Đơn hàng của bạn</h2>
    @if(count($orders) > 0)
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden ml-10">
            <thead class="bg-gray-100 w-full">
                <tr>
                    <th class=" py-2 text-center ">Họ tên</th>
                    <th class=" py-2 text-center ">Địa chỉ</th>
                    <th class=" py-2 text-center ">Số ĐT</th>
                    <th class=" py-2 text-center ">Tổng tiền</th>
                    @for ($i = 1; $i <= $orders->max(fn($order) => count($order->orderItems)); $i++)
                        <th class="py-2 text-center">Tên sản phẩm {{ $i }}</th>
                        <th class="py-2  text-center">Size {{ $i }}</th>
                    @endfor
                    <th class=" py-2 text-center">Trạng thái</th>
                    <th class=" py-2 text-center"></th> 
                </tr>
            </thead>
            <tbody class="w-full">
                @foreach($orders as $order)
                    <tr data-id="{{ $order->user_id }}" class="hover:bg-red-50">
                        <td class="py-2 px-4 text-center ">{{ $order->name }}</td>
                        <td class="py-2 px-4 text-center ">{{ $order->address }}</td>
                        <td class="py-2 px-4 text-center ">{{ $order->phone }}</td>
                        <td class="py-2 px-4 text-center ">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
            
                        @foreach($order->orderItems as $item)
                            <td class="py-2 px-4 text-center ">{{ $item->product->name }}</td>
                            <td class="py-2 px-4 text-center ">{{ $item->size->name }}</td>
                        @endforeach
           
                        @for ($i = count($order->orderItems); $i < $orders->max(fn($order) => count($order->orderItems)); $i++)
                            <td class="py-2 px-4"></td>
                            <td class="py-2 px-4"></td>
                        @endfor
                        <td class="py-2 px-4 text-center ">{{ $order->status }}</td>

                        @if($order->status == 'chờ xác nhận' || $order->status == 'đang chuẩn bị hàng')
                            <td class="py-2 px-4 text-center ">
                                <form id="cancel-form-{{ $order->id }}" action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="event.preventDefault(); confirmDelete({{ $order->id }});">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">
                                        Hủy đơn
                                    </button>
                                </form>
                            </td>
                        @elseif($order->status == 'hoàn thành')
                            <td class="py-2 px-4 text-center ">
                                
                                @foreach ($order->orderItems as $item)
                                    <a href="{{ route('order.review', ['order_id' => $order->id, 'product_id' => $item->product->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">
                                        Đánh giá
                                    </a>
                                @endforeach
                            </td>
                        @else
                            <td class="py-2 px-4 text-center ">
                                <form id="delete-form" method="POST" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-1 px-2 rounded" disabled>
                                        Hủy đơn
                                    </button>
                                </form>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Bạn chưa có đơn hàng nào!!</p>
    @endif

    <script>
        function confirmDelete(orderId) {
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
                    document.getElementById('cancel-form-' + orderId).submit();
                }
            });
        }
    </script>
</div>
</div>
@include('layout.footer')