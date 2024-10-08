<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center h-screen ">
                    <div class="lg:w-2/5 md:w-1/2 w-2/3">
                            <form class="bg-white p-3 rounded-lg shadow-lg min-w-full"  method="POST" action="{{route('update.question',$question_id)}}">
                                @method('put')
                                @csrf
                                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"> {{ __("Update Question") }}</h1>
                                <div>
                                    <label class="text-gray-800 font-semibold block my-3 text-md" for="question">Question</label>
                                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="question" id="question" placeholder="question"  value="{{$question}}"/>
                                </div>
                                <div>
                                    <label class="text-gray-800 font-semibold block my-3 text-md" for="answer1">Answer1</label>
                                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="answer1" id="answer1" placeholder="answer1"  value="{{$answer1}}" />
                                    <label class="relative -ml-2.5 flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                                    <input type="checkbox" name="correct_answer" value="answer1" class="before:content[''] peer relative h-5 w-5 cursor-pointer mr-2 appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:bg-pink-500 checked:before:bg-pink-500 hover:before:opacity-10" id="checkbox" {{ $correct_answer=='answer1' ?  'checked' : '' }} />
                                         Correct
                                    </label>
                                </div>
                                <div>
                                    <label class="text-gray-800 font-semibold block my-3 text-md" for="answer2">Answer2</label>
                                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="answer2" id="answer2" placeholder="answer2" value="{{$answer2}}" />
                                    <label class="relative -ml-2.5 flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                                        <input type="checkbox"  name="correct_answer"  value="answer2" class="before:content[''] peer relative h-5 w-5 cursor-pointer mr-2 appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:bg-pink-500 checked:before:bg-pink-500 hover:before:opacity-10" id="checkbox"  {{ $correct_answer=='answer2' ?  'checked' : '' }} />
                                         Correct
                                    </label>
                                </div>
                                <div>
                                    <label class="text-gray-800 font-semibold block my-3 text-md" for="answer3">Answer3</label>
                                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="answer3" id="answer3" placeholder="answer3" value="{{$answer3}}"/>
                                    <label class="relative -ml-2.5 flex cursor-pointer items-center rounded-full p-3" for="checkbox" data-ripple-dark="true">
                                    <input type="checkbox"  name="correct_answer" value="answer3" class="before:content[''] peer relative h-5 w-5 cursor-pointer mr-2 appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:bg-pink-500 checked:before:bg-pink-500 hover:before:opacity-10" id="checkbox" {{ $correct_answer=='answer3' ?  'checked' : '' }} />
                                     Correct
                                    </label>
                                </div>
                                 <button type="submit" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Update</button>
                                               
                            </form>
                        </div>
               
            </div>
        </div>
    </div>
</x-app-layout>
