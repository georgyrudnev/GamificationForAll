<x-defaultLayout>
// TODO Add link / route to individual posts
    @foreach($posts as $post)
       <div class="bg-pink-600 flex justify-center">
        <a href="" class="bg-yellow-700 mt-8 mb-8"> {{$post->title}} </a>
       </div>
    @endforeach


</x-defaultLayout>
