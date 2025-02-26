@extends('dashboard.layouts.main')

@section('container')
<form method="post" action="/dashboard/workspaces/{{$workspace->slug}}" class="max-w-full" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Gedung</label>
        <input type="text" id="title" name="title" class=" @error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autofocus value="{{old('title' , $workspace->title)}}"/>
        @error('title')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
        <input type="text" id="slug" name="slug" class="@error('slug') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{old('slug' , $workspace->slug)}}"/>
        @error('slug')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Image</label>
        <input type="hidden" name="oldImage" value="{{ $workspace->image }}">
        @if($workspace->image)
        <img src="{{ asset('storage/' . $workspace->image) }}" class="img-preview mb-3 w-50 h-40 block" alt="">
        @else
        <img class="img-preview mb-3 w-50 h-40 " />
        @endif
  
        <input class="  @error('image') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-none" aria-describedby="user_avatar_help" id="image" type="file" name="image" onchange="previewImage()">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm you are logged into your account</div>
        @error('image')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penjelasan Gedung</label>
        <input type="text" id="body" name="body" class="@error('body') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('body', $workspace->body) }}"/>
        @error('body')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="total_rooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Keseluruhan Ruangan</label>
        <input type="number" id="total_rooms" name="total_rooms" class="@error('total_rooms') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('total_rooms', $workspace->total_rooms) }}"/>
        @error('total_rooms')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="workshop_rooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Workshop Room</label>
        <input type="number" id="workshop_rooms" name="workshop_rooms" class="@error('workshop_rooms') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('workshops_rooms', $workspace->workshop_rooms) }}""/>
        @error('workshop_rooms')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="classrooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Classroom</label>
        <input type="number" id="classrooms" name="classrooms" class="@error('classrooms') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('classrooms', $workspace->classrooms) }}"/>
        @error('classrooms')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>


    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Post</button>
</form>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/workspaces/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
    });

    function previewImage(input, targetSelector = null) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if (targetSelector) {
                    document.querySelector(targetSelector).src = e.target.result;
                    document.querySelector(targetSelector).style.display = 'block';
                } else {
                    input.nextElementSibling.src = e.target.result;
                    input.nextElementSibling.style.display = 'block';
                }
            };
            reader.readAsDataURL(file);
        }
    }

    document.getElementById('add-photo-btn').addEventListener('click', function () {
        let photoInputs = document.getElementById('photo-inputs');

        // Jika masih tersembunyi, munculkan
        if (photoInputs.classList.contains('hidden')) {
            photoInputs.classList.remove('hidden');
        }

        // Tambahkan input baru
        addPhotoInput();
    });

    function addPhotoInput() {
        let div = document.createElement('div');
        div.classList.add("photo-input", "mb-3");
        div.innerHTML = `
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-none" name="images[]" type="file" accept="image/*" onchange="previewImage(this)">
            <img class="img-preview mb-3 w-50 h-40 hidden" />
            <button type="button" class="mt-2 text-sm text-red-500" onclick="removePhotoInput(this)">Hapus</button>
        `;
        document.getElementById('photo-inputs').appendChild(div);
    }

    function removePhotoInput(button) {
        button.parentElement.remove();

        // Sembunyikan div jika tidak ada input foto lagi
        let photoInputs = document.getElementById('photo-inputs');
        if (photoInputs.children.length === 0) {
            photoInputs.classList.add('hidden');
        }
    }

    document.getElementById('add-photo-btn').addEventListener('click', function () {
    let photoInputs = document.getElementById('photo-inputs');

    let div = document.createElement('div');
    div.classList.add("photo-input", "mb-3");
    div.innerHTML = `
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" name="images[]" type="file" accept="image/*" onchange="previewImage(this)">
        <img class="img-preview mb-3 w-50 h-40 hidden" />
        <button type="button" class="mt-2 text-sm text-red-500" onclick="removePhotoInput(this)">Hapus</button>
    `;
    photoInputs.appendChild(div);
});

function removePhotoInput(button) {
    button.parentElement.remove();
}

</script>

@endsection
