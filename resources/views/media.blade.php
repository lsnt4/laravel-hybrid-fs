<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
          <div class="grid gap-6 row-gap-5 mb-8 lg:grid-cols-4 sm:row-gap-6 sm:grid-cols-2">
            <a href="/media/create" aria-label="View Item">
              <div class="flex justify-center items-center relative overflow-hidden transition duration-200 transform rounded shadow-lg w-full h-56 md:h-64 xl:h-80 bg-gray-800 hover:shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray" width="96px" height="96px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
              </div>
            </a>
            @foreach($media as $item)
            <a href="{{ route('media.show', $item->id) }}" aria-label="View Item">
              <div class="relative overflow-hidden transition duration-200 transform rounded shadow-lg hover:-translate-y-2 hover:shadow-2xl">
                <img class="object-cover w-full h-56 md:h-64 xl:h-80" src="data:image/jpeg;base64,{{ base64_encode($item->data) }}" alt="" />
                <div class="absolute inset-x-0 bottom-0 px-6 py-4 bg-white bg-opacity-75">
                  <p class="text-sm font-medium tracking-wide text-black">
                    {{ $item->name }}
                  </p>
                </div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
