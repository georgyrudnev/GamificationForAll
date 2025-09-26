<x-defaultLayout>
<div  class="ml-10 mt-8">
    <div class="text-2xl font-bold">
        {{$post->title}}
    </div>

    <div class="pl-4 pt-1">
        Sender: {{$post->sender->name}}
    </div>

    <div class="pl-2 pt-1">
        {{$post->content}}
    </div>

    <div>
        <div class="text-2xl font-bold pt-5 pb-5">
            Comments:
        </div>

        <div class="p-5">
            <form action="/posts/{{$post->id}}/submit-comment" method="post" class="mx-auto">
                @csrf <!-- Laravel requires a CSRF token for POST requests -->


                <!-- textarea needed for larger texts -->
                <label for="content" class="block p-5 text-xl font-medium">Leave a comment!</label>


                <div class="flex items-center">
                    <!-- add old function in value to keep content if validation fails -->
                    <textarea name="content" class="bg-orange-300 mt-2 ml-5 w-1/6" rows="4" >{{old("content")}}</textarea>

                    <!-- TODO add validation in posts Model inside create method -->
                    @error("content")
                        {{$message}}
                    @enderror
                    <button class="btn bg-blue-950 uppercase ml-3 px-4 py-2" type="submit">
                        Submit
                    </button>
                </div>

            </form>
        </div>

        <div class="pb-5 border-2 border-black ml-2 pl-2 pt-1 mb-10 w-3/4">

            @for($i = 0; $i < count($post->comments); $i++)
               <div class="font-bold">
                   {{$i+1}}. Author: {{$post->comments[$i]->author->name}}
               </div>
                {{$post->comments[$i]->content}}

            @endfor
        </div>


    </div>
</div>


</x-defaultLayout>
