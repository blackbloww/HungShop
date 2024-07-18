@include('layout.admin')

<div class="container mx-auto px-4">
    <form action="{{ route('update_user', $user->id) }}" enctype="multipart/form-data" method="POST" class="max-w-md mx-auto bg-white shadow-lg rounded-lg px-8 py-6 mt-8">
        @csrf
        @method('PUT') 
        <h1 class="text-2xl font-bold mb-6 text-center">Chỉnh sửa thông tin</h1>
    
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Tên người dùng:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="img" class="block mb-2">Hình ảnh</label>
            <input type="file" value="{{$user->avt}}" id="img" name="avt" class="border border-gray-300 rounded-md px-3 py-2 w-full" onchange="previewImage(event)">
            @if($user->avt)
                <div id="currentImageWrapper" class="mt-2">
                    <img src="{{ asset($user->avt) }}" id="currentImage" class="w-20 h-20 object-cover mb-2">
                </div>
            @else
                <p>No image available</p>
            @endif
            <div id="newImageWrapper" style="display:none;">
                <img id="newImage" class="w-20 h-20 object-cover mb-2">
            </div>
            @error('avt')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-semibold mb-2">Vai trò:</label>
            <input type="text" id="role" name="role" value="{{ $user->role }}" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:border-indigo-500" readonly>
        </div>
        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg px-4 py-2 text-lg font-semibold">Lưu thay đổi</button>
    </form>
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