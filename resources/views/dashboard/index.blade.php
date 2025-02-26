@extends('dashboard.layouts.main')

@section('container')
<div class="text-black pt-3 pb-2 mb-3 border-b">
    <h2 class="text-xl font-semibold mb-4">Pesan Customer</h2>
    <div class="space-y-4">
    @foreach($messages as $message)
    <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <!-- Foto Profil (gunakan Gravatar berdasarkan email) -->
                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($message->email))) }}?s=50&d=mp" 
                     alt="Profile Image" 
                     class="w-10 h-10 rounded-full border border-gray-300">
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $message->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $message->email }}</p>
                    <p class="text-xs text-gray-500">{{ $message->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
            <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Hapus</button>
</form>
            </div>
            <p class="mt-2 text-gray-700">{{ $message->message }}</p>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $messages->links() }} <!-- Pagination -->
    </div>
</div>
@endsection
