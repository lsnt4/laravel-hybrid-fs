<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">


        <form action="{{ route('media.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="pb-4">
            <label for="name" class="block text-xs leading-5 font-medium text-gray-700">Name</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <input type="text" id="name" name="name" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5 focus:outline-none" placeholder="Name">
            </div>
          </div>
          <div>
            <label for="data" class="block text-xs leading-5 font-medium text-gray-700">Image</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <input type="file" id="data" name="data" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" placeholder="Name">
            </div>
          </div>
          <div>
            <input class="form-input block w-full bg-blue-300 mt-4 sm:text-sm sm:leading-5" type="submit" value="Save">
          </div>
        </form>













        </div>
      </div>
    </div>
  </div>
</x-app-layout>
