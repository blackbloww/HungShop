@include('layout.admin')

<div class="max-w-lg mx-auto mt-8">
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" class="bg-gray-100 p-8 shadow-lg rounded-lg">
        @csrf
        @method('PUT')
        <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh sửa sản phẩm</h1>

        <div class="mb-4">
            <label for="name" class="block mb-2">Tên sản phẩm</label>
            <input type="text" id="name" name="name" value="{{$product->name}}" class="border border-gray-300 rounded-md px-3 py-2 w-full placeholder-name">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Mô tả</label>
            <textarea class="border border-gray-300 rounded-md px-3 py-2 w-full" name="description" id="description" rows="5">{{$product->description}}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block mb-2">Giá</label>
            <input type="text" id="price" name="price" value="{{$product->price}}" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="sale" class="block mb-2">Sale</label>
            <input type="text" id="sale" name="sale" value="{{$product->sale}}" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            @error('sale')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="quantity" class="block mb-2">Số lượng</label>
            <input type="text" id="quantity" name="quantity" value="{{$product->quantity}}" class="border border-gray-300 rounded-md px-3 py-2 w-full">
            @error('quantity')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="img" class="block mb-2">Hình ảnh</label>
            <input type="file" id="img" name="img" class="border border-gray-300 rounded-md px-3 py-2 w-full" onchange="previewImage(event)" value="{{$product->img}}">
            @if($product->img)
                <div id="currentImageWrapper" class="mt-2">
                    <img src="{{ asset($product->img) }}" id="currentImage" class="w-20 h-20 object-cover mb-2">
                </div>
            @else
                <p>No image available</p>
            @endif
            <div id="newImageWrapper" style="display:none;">
                <img id="newImage" class="w-20 h-20 object-cover mb-2">
            </div>
            {{-- @error('img')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
        </div>

        <div class="mb-4">
            <label for="category_id" class="block mb-2">Danh mục</label>
            <select id="category_id" name="category_id" class="border border-gray-300 rounded-md px-3 py-2 w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-gradient-to-r from-sky-500 to-cyan-500 hover:from-sky-600 hover:to-cyan-600 text-white rounded-lg px-4 py-2 text-lg font-semibold">Cập nhật</button>
        </div>
    </form>
</div>


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