@extends('dashboard.layouts.main')

@section('container')
<form method="post" action="/dashboard/trainings" class="max-w-full" enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" id="title" name="title" class=" @error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autofocus value="{{old('title')}}"/>
        @error('title')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
        <input type="text" id="slug" name="slug" class="@error('slug') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{old('slug')}}"/>
        @error('slug')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
                <label for="date" class="block text-gray-700 font-medium mb-2">Pilih Tanggal:</label>
                <input type="date" id="date" name="date" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>


<div class="mb-5">
  <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select category</label>
  <select id="category" id ="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option>SERTIFIKASI KOMPETENSI</option>
    <option>SERTIFIKASI PROFESOR</option>
    <option>CDIO</option>
    <option>RANDOM</option>
  </select>
  </div>


    <div class="mb-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Image</label>
        <img class="img-preview mb-3 w-50 h-40 " />
        <input class="  @error('image') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-none" aria-describedby="user_avatar_help" id="image" type="file" name="image" onchange="previewImage()">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm you are logged into your account</div>
        @error('image')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
    <label for="package" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Training Package</label>
    <div class="space-y-2">
        <!-- Checkbox untuk Training Material -->
        <div class="flex items-center">
            <input
                type="checkbox"
                id="material"
                name="package[]"
                value="Training Material"
                class="form-checkbox h-5 w-5 text-green-500 rounded focus:ring-green-500"
            />
            <label for="material" class="ml-2 text-gray-700">Training Material</label>
        </div>
        <!-- Checkbox untuk Training Kits -->
        <div class="flex items-center">
            <input
                type="checkbox"
                id="kits"
                name="package[]"
                value="Training Kits"
                class="form-checkbox h-5 w-5 text-green-500 rounded focus:ring-green-500"
            />
            <label for="kits" class="ml-2 text-gray-700">Training Kits</label>
        </div>
        <!-- Checkbox untuk Certification Assessment -->
        <div class="flex items-center">
            <input
                type="checkbox"
                id="assessment"
                name="package[]"
                value="Certification Assessment"
                class="form-checkbox h-5 w-5 text-green-500 rounded focus:ring-green-500"
            />
            <label for="assessment" class="ml-2 text-gray-700">Certification Assessment</label>
        </div>
        <!-- Checkbox untuk Certificate -->
        <div class="flex items-center">
            <input
                type="checkbox"
                id="certificate"
                name="package[]"
                value="Certificate"
                class="form-checkbox h-5 w-5 text-green-500 rounded focus:ring-green-500"
            />
            <label for="certificate" class="ml-2 text-gray-700">Certificate</label>
        </div>
        <!-- Checkbox untuk Free Consultation -->
        <div class="flex items-center">
            <input
                type="checkbox"
                id="consultation"
                name="package[]"
                value="Free Consultation"
                class="form-checkbox h-5 w-5 text-green-500 rounded focus:ring-green-500"
            />
            <label for="consultation" class="ml-2 text-gray-700">Free Consultation</label>
        </div>
        <!-- Checkbox untuk Lifetime Access -->
        <div class="flex items-center">
            <input
                type="checkbox"
                id="lifetime"
                name="package[]"
                value="Lifetime Access"
                class="form-checkbox h-5 w-5 text-green-500 rounded focus:ring-green-500"
            />
            <label for="lifetime" class="ml-2 text-gray-700">Lifetime Access</label>
        </div>
    </div>
    @error('package')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>

<div class="mb-5">
        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
        <input type="text" id="harga" name="harga" class=" @error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" autofocus value="{{old('title')}}"/>
        @error('harga')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
        @error('body')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
        <textarea id="editor" name="body"></textarea>
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create Post</button>
</form>

<script>
      ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    document.querySelector('#title').addEventListener('change', function() {
        fetch('/dashboard/trainings/checkSlug?title=' + this.value)
            .then(response => response.json())
            .then(data => document.querySelector('#slug').value = data.slug);
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;

        }
    }

</script>
@endsection
