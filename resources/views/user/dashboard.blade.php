<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Total Question {{$totalQuestionCount}} /Correct Answer {{$correctAnswerCount}}
        </h2>
    </x-slot>

        @if(session('message'))
        <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{session('message')}}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif

    @foreach ($questions as $index => $question)
        <form action="{{ route('user.answer', [$question->id]) }}" method="POST">
            @csrf
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
                                        <div>
                                            <input id="answer-option-{{ $answerIndex }}" type="radio" name="answer" value="answer{{ $answerIndex + 1 }}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        </div>    
                                    </summary>
                                </details>
                            </div>
                        @endforeach  
                        <div class="flex justify-end px-5 py-5 w-1/2">
                            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                Answer
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </form>  
    @endforeach
</x-app-layout>

