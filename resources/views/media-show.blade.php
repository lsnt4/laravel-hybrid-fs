<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
          <div class="grid gap-6 row-gap-5 mb-8 lg:grid-cols-4 sm:row-gap-6 sm:grid-cols-2">
            <a href="{{ route('media.index') }}" aria-label="View Item">
              <div class="relative overflow-hidden transition duration-200 transform rounded shadow-lg">
                <img class="object-cover w-full h-56 md:h-64 xl:h-80" src="data:image/jpeg;base64,{{ base64_encode($item->data) }}" alt="" />
              </div>
            </a>
            <h2 class="text-xl">{{ $item->name }}</h2>
          </div>
          <form action="{{ route('media.show', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
