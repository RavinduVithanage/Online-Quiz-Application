<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
      <a href="{{route('create.question')}}"
      class="middle none center mr-3 rounded-lg border border-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:opacity-75 focus:ring focus:ring-pink-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
      data-ripple-dark="true"
    >
      Create Question
  </a>
  </div>    

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
        @foreach ($questions as $question)
        <section class="text-gray-700">
          <div class="container px-5 py-5  ">
            <div class="text-left mb-5  flex">
              <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 ">
                {{$question->question}}
              </p>
              <form action="" method="POST">
                @csrf
                @method('DELETE')
              <button class="text-red-500">Delete</button>
              </form>|
              <a href="{{route('edit.question',[$question->id])}}" class="text-green-500">Edit</a>
            </div>
            <div class="block lg:w-1/2 sm:mb-2 ">
            @foreach ($question->answer as $answer)
              <div class="w-full lg:w-3/4 px-4 py-2">
                <details class="mb-4">
                  <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                  {{$answer->answer}}
                  </summary>
                </details>
              </div>
            @endforeach  
          </div>
        </section>
        @endforeach
      
         
    </div>
  </div>
</x-app-layout>
