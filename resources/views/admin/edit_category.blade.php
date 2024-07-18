@include('layout.admin')

<div class="flex justify-center mt-6">
    <div class="w-full max-w-md">
        <form method="POST" action="{{ route('update', $category->id) }}" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Chỉnh sửa danh mục</h1>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="name">Tên danh mục</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="name" id="name" value="{{ $category->name }}" required />
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="description">Mô tả</label>
                <textarea class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="description" id="description" placeholder="Mô tả">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Cập nhật</button>
        </form>
    </div>
</div>