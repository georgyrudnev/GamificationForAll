<x-defaultLayout>

    <div class="p-16"> // TODO Add link / route to individual posts

    //question to ask prof: What if I want to show data from my db in my upper header column which I previously defined
    // in a default layout?
    </div>
    @if($points != -1)

        @section('Score', $score)
        @section('Points', $points)
    @endif

    @foreach($posts as $post)
       <div class="bg-pink-600 flex justify-center">

        <ol>
            <li><a href="" class="bg-yellow-700 mt-8 mb-8"> {{$post->title}} </a>
            </li>
        </ol>

       </div>
    @endforeach


</x-defaultLayout>
