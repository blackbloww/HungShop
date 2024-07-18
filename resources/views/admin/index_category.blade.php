@include('layout.admin')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 text-center">Danh sách danh mục</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Tên danh mục</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Mô tả</th>
                    <th class="px-4 py-2 text-center text-sm font-semibold text-gray-600"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($categories as $category)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $category->name }}</td>
                        <td class="px-4 py-2">{{ $category->description }}</td>
                        <td class="flex px-4 py-2">
                            <a href="{{ route('edit_category', $category->id) }}" class="text-green-500 hover:text-green-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>
                            </a>
                            <button onclick="confirmDelete({{ $category->id }})" class="text-red-500 pl-2 hover:text-red-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                  </svg>
                            </button>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(categoryId) {
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
                document.getElementById('delete-form-' + categoryId).submit();
            }
        })
    }
</script>