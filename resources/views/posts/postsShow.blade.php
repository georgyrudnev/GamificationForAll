<x-defaultLayout>
<div>
    <div class="text-2xl">
        {{$post->title}}
    </div>

    <div>
        Sender: {{$post->sender->name}}
    </div>
    {{$post->content}}
</div>


</x-defaultLayout>
