@include('layout.admin')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@foreach ($users as $item)
    @php
    $userCount = count($users);
    @endphp
@endforeach

@foreach ($product as $item)
    @php
    $product1 = count($product);
    @endphp
@endforeach
<!--================ Content start--------------->

<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold">{{$userCount}}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Users</div>

                </div>
                 
            </div>

            <a href="{{route('index_user')}}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold">{{$todayOrderCount}}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Đơn hàng ngày hôm nay</div>
                </div>
                 <div class="dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </div> 
            </div>
            <a href="{{route('orders.index')}}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{$product1}}</div>
                    <div class="text-sm font-medium text-gray-400">Sản phẩm</div>
                </div>
                
            </div>
            <a href="{{route('index_product')}}" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>
    </div>
    <div class="mt-8"> 
        <span class="font-bold text-2xl">Doanh thu</span>
    </div>
    <div class="bg-white">
        <canvas id="salesChart" height="100px"></canvas>
    </div>
    
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($sales->pluck('day')) !!},
                datasets: [
                    {
                        label: 'Tổng doanh thu',
                        data: {!! json_encode($sales->pluck('total_sales')) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Doanh thu hoàn thành',
                        data: {!! json_encode($sales->pluck('completed_sales')) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Số lượng đơn hàng',
                        data: {!! json_encode($sales->pluck('order_count')) !!},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    
</div>
<!-- End Content -->
</main>


</body>
</html>