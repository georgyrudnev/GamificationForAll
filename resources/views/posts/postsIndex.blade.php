<x-defaultLayout>

    <div class="p-16">

    </div>

    <!-- TODO: Add component -->
    @if($user != null)

        @section('Score', $user->score)
        @section('Points', $user->points)
    @else
        @section('Score', "Log in to see your score")
        @section('Points', "Log in to see your points")
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
