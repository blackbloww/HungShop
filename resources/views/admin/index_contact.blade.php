@include('layout.admin')

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Contacts</h1>

    <div class="overflow-x-auto">
        <table class="table-auto min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-white text-gray-700">
                <tr>
                    <th class="px-4 py-2">Họ tên</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Tin nhắn</th>
                    <th class="px-4 py-2">Trạng thái</th>

                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($contact as $contact)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2 text-center">{{ $contact->name }}</td>
                    <td class="px-4 py-2 text-center">{{ $contact->email }}</td>
                    <td class="px-4 py-2 text-center">{{ $contact->message }}</td>
                    <td class="py-2 px-4 text-center">
                        <form action="{{ route('updateContact', $contact->id) }}" method="POST">
                            @csrf
                            @method('PUT') 
                            <select name="status" onchange="this.form.submit()" class="border rounded p-1">
                                <option value="Chưa xem" {{ $contact->status == 'Chưa xem' ? 'selected' : '' }}>Chưa xem</option>
                                <option value="Đã xem" {{ $contact->status == 'Đã xem' ? 'selected' : '' }}>Đã xem</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>