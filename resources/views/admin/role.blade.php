@include('layout.admin')
<div class="container mx-auto mt-10">
    <div class="w-full max-w-xs mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Cấp quyền</h2>
        
        <form action="{{ route('role') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="user" class="block text-gray-700 text-sm font-bold mb-2">Chọn user:</label>
                <select name="user_id" id="user" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Chọn quyền:</label>
                <select name="role" id="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Đồng ý
                </button>
            </div>
        </form>
    </div>
</div>