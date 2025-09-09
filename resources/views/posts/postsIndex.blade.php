<x-defaultLayout>

    <div class="p-16">

    </div>
    @if($points != -1)

        @section('Score', $score)
        @section('Points', $points)
    @endif

    @foreach($posts as $key=>$post)
       <div class="bg-pink-600 flex justify-center">

        <ol>
            <li class="h-24"><a href="posts/{{$post->id}}"> {{$key+1}}. {{$post->title}} </a>
            </li>
        </ol>

       </div>
    @endforeach


</x-defaultLayout>
