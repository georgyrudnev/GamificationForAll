<x-defaultLayout>

    @if($user != null)

        @section('Score', $user->score)
        @section('Points', $user->points)
    @else
        @section('Score', "Log in to see your score")
        @section('Points', "Log in to see your points")
    @endif

    @if(session()->has("status"))
        <div class={{session()->get("status")[0]}}>
         {{session()->get("status")[1]}}
        </div>
    @endif

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
        <div class="text-2xl font-bold mt-4 pt-2 pb-5 border-t w-11/12">
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

                    @error("content")
                        {{$message}}
                    @enderror
                    <button class="btn bg-blue-950 uppercase ml-3 px-4 py-2" type="submit">
                        Submit
                    </button>
                </div>

            </form>
        </div>

        <!-- Comments area -->
        <div class="pb-5 ml-2 pl-2 pt-1 mb-10 w-11/12">

            <!-- individual comments area -->

            @for($i = 0; $i < count($post->comments); $i++)
               <div class=" border-b border-amber-400 mb-2 pb-4 w-2/5">
                <div class="font-bold">
                   {{$i+1}}. Author: {{$post->comments[$i]->author->name}}
               </div>
                {{$post->comments[$i]->content}}
                           <div name="visibleOnInitialLoadBTN" class="mt-4 grid grid-cols-7">
                               @auth
                                   @if($post->comments[$i]->canEditOrDelete(auth()->user()))
                                       <button id= "editComment_btn{{$i}}" class="btn bg-blue-950 uppercase ml-3 px-4 py-2" type="button">
                                           Edit
                                       </button>
                                   @endif
                               @endauth
                               <button id= "cancelComment_btn{{$i}}" class="btn bg-yellow-600 uppercase hidden px-4 py-2" type="button">
                                   <span>Cancel</span>
                               </button>

                               <form action="/posts/{{$post->id}}/{{$post->comments[$i]->id}}/delete-comment" method="post">
                                   @method('DELETE')
                                   @csrf
                                   @auth
                                       @if($post->comments[$i]->canEditOrDelete(auth()->user()))
                                           <button class="btn bg-red-400 uppercase ml-1 px-4 py-2">DELETE</button>
                                       @endif
                                   @endauth
                               </form>
                           </div>

                <form id="commentEdit_form{{$i}}" action="/posts/{{$post->id}}/{{$post->comments[$i]->id}}/edit-comment" method="post" class="mx-auto hidden">
                    @method("PUT") <!-- Laravel requires specifying PUT/DELETE methods separately -->
                    @csrf <!-- Laravel requires a CSRF token for POST requests -->

                    <!-- textarea needed for larger texts -->
                    <label for="commentContent" class="block p-5 text-xl font-medium">Edit Comment:</label>


                    <div class="flex items-center">
                        <textarea name="commentContent" id="commentEdit_textarea" class="bg-blue-300 mt-2 ml-5 w-1/6" rows="4" >{{old("commentContent")}}</textarea>

                        <!-- TODO add validation in posts Model inside create method -->
                        @error("commentContent")
                        {{$message}}
                        @enderror
                        <button class="btn bg-blue-950 uppercase ml-3 px-4 py-2" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
               </div>
                <script>
                    commentEditTextarea = document.getElementById("commentEdit_textarea");

                    // Needed so that textarea is not displayed anymore after new comment was created
                    hasOldInput = commentEditTextarea.value.trim() !== '';
                    if (hasOldInput) {
                        document.addEventListener('DOMContentLoaded', (event) => {

                            document.getElementById("commentEdit_form{{$i}}").style.display = "block";
                            document.getElementById("cancelComment_btn{{$i}}").style.display = "block";
                            document.getElementById("editComment_btn{{$i}}").style.display = "none";
                        })
                    }

                    document.getElementById("editComment_btn{{$i}}").addEventListener("click",function(){
                            document.getElementById("commentEdit_form{{$i}}").style.display = "block";
                            document.getElementById("cancelComment_btn{{$i}}").style.display = "inline-block";
                            document.getElementById("editComment_btn{{$i}}").style.display = "none";
                        }
                    )
                    document.getElementById("cancelComment_btn{{$i}}").addEventListener("click",function(){
                            document.getElementById("commentEdit_form{{$i}}").style.display = "none";
                            document.getElementById("cancelComment_btn{{$i}}").style.display = "none";
                            document.getElementById("editComment_btn{{$i}}").style.display = "block";
                        }
                    )

                </script>

            @endfor
        </div>



    </div>
</div>

</x-defaultLayout>
