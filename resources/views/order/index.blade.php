@include('layout.admin')
<div class="overflow-x-auto">
<table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
        <tr class="">
            <th class="w-1/12 py-2 text-center border-r" rowspan="2">Họ tên</th>
            <th class="w-1/12 py-2 text-center border-r" rowspan="2">Email</th>
            <th class="w-1/12 py-2 text-center border-r" rowspan="2">Địa chỉ</th>
            <th class="w-1/12 py-2 text-center border-r" rowspan="2">Số ĐT</th>
            <th class="w-2/12 py-2 text-center border-r" rowspan="2">Tổng tiền</th>
            <th class="py-2 text-center border-b" colspan="{{ $orders->max(fn($order) => count($order->orderItems)) * 3 }}">Chi tiết sản phẩm</th>
            <th class="w-1/12 py-2 text-center border-l" rowspan="2">Trạng thái</th>
        </tr>
        <tr>
            @for ($i = 1; $i <= $orders->max(fn($order) => count($order->orderItems)); $i++)
                <th class="py-2 text-center">SP thứ {{ $i }}</th>
                <th class="py-2 text-center">Size</th>
                <th class="py-2 text-center">Số lượng</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr class="border-b hover:bg-yellow-50">
                <td class="py-2 px-4 text-center">{{ $order->name }}</td>
                <td class="py-2 px-4 text-center">{{ $order->email }}</td>
                <td class="py-2 px-4 text-center">{{ $order->address }}</td>
                <td class="py-2 px-4 text-center">{{ $order->phone }}</td>
                <td class="py-2 px-4 text-center">{{ number_format($order->total_price,0,',','.') }}đ</td>
                @foreach($order->orderItems as $item)
                    <td class="py-2 px-4 text-center">{{ \Illuminate\Support\Str::limit($item->product->name, 10) }}</td>
                    <td class="py-2 px-4 text-center">{{ $item->size->name }}</td>
                    <td class="py-2 px-4 text-center">{{ $item->quantity }}</td>
                @endforeach     
                @for ($i = count($order->orderItems); $i < $orders->max(fn($order) => count($order->orderItems)); $i++)
                    <td class="py-2 px-4"></td>
                    <td class="py-2 px-4"></td>
                    <td class="py-2 px-4"></td>
                @endfor
                <td class="py-2 px-4 text-center">
                    <form action="{{ route('updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        <select name="status" onchange="this.form.submit()" class="border rounded p-1">
                            <option value="chờ xác nhận" {{ $order->status == 'chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                            <option value="đang chuẩn bị hàng" {{ $order->status == 'đang chuẩn bị hàng' ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                            <option value="giao hàng" {{ $order->status == 'giao hàng' ? 'selected' : '' }}>Giao hàng</option>
                            <option value="hoàn thành" {{ $order->status == 'hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="đã hủy" {{ $order->status == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                        </select>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>