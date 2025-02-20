<div class="mx-auto max-w-screen-xl lg:px-6">
  <div class="mx-auto max-w-screen-md sm:text-center">
    <form action="#">
      <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
        <div class="relative w-full">
          <!-- Ikon pencarian menggantikan ikon email -->
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 4a6 6 0 104.472 10.472l3.535 3.536a1 1 0 001.414-1.414l-3.535-3.535A6 6 0 008 4z"></path>
            </svg>
          </div>
          <input
            class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-white-700 dark:border-gray-600 dark:placeholder-black-400 dark:text-black dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Search"
            type="search"
            name="search"
            id="search"
            autocomplete="off"
          >
        </div>
        <div>
          <!-- Tombol search dengan warna biru -->
          <button
            type="submit"
            class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-customBlue border-blue-600 sm:rounded-none lg:rounded-r-lg  focus:ring-4 focus:ring-primary-300"
          >
            Search
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
