<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Total Question /Correct Answer
        </h2>
    </x-slot>
    @foreach ($questions as $index => $question)
            <section class="text-gray-700">
                <div class="container px-5 py-5">
                    <div class="text-left mb-5 flex">
                        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4">
                            {{ $index + 1 }}. {{ $question->question }}
                        </p>
                    </div>
                    <div class="block lg:w-1/2 sm:mb-2">
                        @foreach ($question->answer as $answerIndex => $answer)
                            <div class="w-full lg:w-3/4 px-4 py-2">     
                                <details class="mb-4">
                                    <summary class="flex justify-between bg-gray-200 rounded-md py-2 px-4">
                                        <div class="font-semibold">
                                            {{ $answerIndex + 1 }}. {{ $answer->answer }}
                                        </div>   
                                    </summary>
                                </details>
                            </div>
                        @endforeach  
                        <div class="flex justify-end px-5 py-5 w-1/2">
                       
                        </div>
                    </div>
                </div>
            </section>
    @endforeach
</x-app-layout>
