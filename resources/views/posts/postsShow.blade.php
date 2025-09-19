<x-defaultLayout>
<div  class="ml-10">
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

        <div>
            TODO create form & create comment button
        </div>

        <div class="pb-5 border-2 border-black pl-2 pt-1">

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
