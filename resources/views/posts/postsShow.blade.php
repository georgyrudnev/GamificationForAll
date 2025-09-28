<x-defaultLayout>

    @if($user != null)

        @section('Score', $user->score)
        @section('Points', $user->points)
    @else
        @section('Score', "Log in to see your score & points")
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

        <div class="pb-5 border-2 border-black ml-2 pl-2 pt-1 mb-10 w-11/12">

            @for($i = 0; $i < count($post->comments); $i++)
               <div class="font-bold">
                   {{$i+1}}. Author: {{$post->comments[$i]->author->name}}
               </div>
                {{$post->comments[$i]->content}}
                <button id= "editComment_btn" class="btn bg-blue-950 uppercase ml-3 px-4 py-2" type="button">
                    Edit comment
                </button>
                <button id= "cancelComment_btn" class="btn bg-blue-950 uppercase ml-3 px-4 py-2 hidden" type="button">
                    Cancel
                </button>
                <form id="commentEdit_form" action="/posts/{{$post->id}}/{{$post->comments[$i]->id}}/edit-comment" method="post" class="mx-auto hidden">
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
            @endfor
        </div>
        <script>
            const commentEditTextarea = document.getElementById("commentEdit_textarea");
            const hasOldInput = commentEditTextarea.value.trim() !== '';

            if (hasOldInput) {
                document.addEventListener('DOMContentLoaded', (event) => {
                    document.getElementById("commentEdit_form").style.display = "block";
                    document.getElementById("cancelComment_btn").style.display = "block";
                    document.getElementById("editComment_btn").style.display = "none";
                })
            }

            document.getElementById("editComment_btn").addEventListener("click",function(){
                    document.getElementById("commentEdit_form").style.display = "block";
                    document.getElementById("cancelComment_btn").style.display = "block";
                    document.getElementById("editComment_btn").style.display = "none";
                }
            )
            document.getElementById("cancelComment_btn").addEventListener("click",function(){
                    document.getElementById("commentEdit_form").style.display = "none";
                    document.getElementById("cancelComment_btn").style.display = "none";
                    document.getElementById("editComment_btn").style.display = "block";
                }
            )
        </script>


    </div>
</div>

</x-defaultLayout>
