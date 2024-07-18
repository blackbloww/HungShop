@include('layout.admin')

<div class="flex justify-center mt-8">
    <div class="w-full max-w-md">
        <form method="POST" action="{{ route('store_category') }}" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Thêm danh mục</h1>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="name">Tên danh mục</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="name" id="name" placeholder="Tên danh mục" required />
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="description">Mô tả</label>
                <textarea class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="description" id="description" placeholder="Mô tả"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="w-32 px-4 py-2 flex items-center justify-center space-x-2 rounded-lg text-black bg-gradient-to-r from-orange-200 to-amber-100 hover:from-amber-100 hover:to-yellow-100 shadow-lg transform transition-transform duration-200 hover:scale-105">
                    Thêm
                </button>
            </div>
        </form>
    </div>
</div>



