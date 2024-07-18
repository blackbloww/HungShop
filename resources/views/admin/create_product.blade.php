@include('layout.admin')

<div class="flex justify-center min-h-screen bg-gray-100 mt-8">
    <div class="container max-w-lg px-4">
        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
        <h1 class="text-2xl font-bold mb-6 text-center">Thêm sản phẩm</h1>

            <div class="mb-4">
                <label class="text-gray-800 font-semibold block my-3 text-md" for="name">Tên sản phẩm</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="name" id="name" placeholder="Tên sản phẩm"  />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-4">
                <label class="text-gray-800 font-semibold block my-3 text-md" for="description">Mô tả</label>
                <textarea class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="description" id="description" placeholder="Mô tả"></textarea>
            </div>

            <div class="mb-4">
                <label class="text-gray-800 font-semibold block my-3 text-md" for="price">Giá</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="price" id="price" placeholder="Giá"  />
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-4">
                <label class="text-gray-800 font-semibold block my-3 text-md" for="quantity">Số lượng</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="quantity" id="quantity" placeholder="Số lượng"  />
             @error('quantity')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-4">
                <label for="sale" class="block mb-2">sale</label>
                <input type="text" id="sale" name="sale"
                    class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none">
                @error('sale')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="img" class="block mb-2">Hình ảnh</label>
                <input type="file" id="img" name="img"
                    class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" onchange="previewImage(event)">
                <div id="newImageWrapper" style="display:none;" class="mt-2">
                    <img id="newImage" class="w-20 h-20 object-cover mb-2">
                </div>
                @error('img')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block mb-2">Danh mục</label>
                <select id="category_id" name="category_id" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-sky-500 to-cyan-300 hover:from-sky-600 hover:to-cyan-600 text-white rounded-lg px-4 py-2 text-lg font-semibold">Thêm</button>
        </form>
    </div>
</div>

<script>
        function previewImage(event) {
            const currentImageWrapper = document.getElementById('currentImageWrapper');
            const newImageWrapper = document.getElementById('newImageWrapper');
            const newImage = document.getElementById('newImage');
            const newImageName = document.getElementById('newImageName');
            // Ẩn ảnh cũ
            if (currentImageWrapper) {
                currentImageWrapper.style.display = 'none';
            }
            // Hiển thị ảnh mới
            newImageWrapper.style.display = 'block';
            newImage.src = URL.createObjectURL(event.target.files[0]);
            newImageName.textContent = event.target.files[0].name;
            // Giải phóng bộ nhớ cho URL object khi không cần thiết
            newImage.onload = function() {
                URL.revokeObjectURL(newImage.src);
            }
        }
</script>

<script>
    function confirmDelete(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 2000);
    });
</script>