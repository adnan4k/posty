@props(['post' =>$post])
<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>
<div class="mb-4">
    <a href="" class="font-bold">{{$post->user->name}}</a>
   <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}} </span>

   <p class="mb-4">{{$post->body}} </p>

    <div class="">
        @if($post->ownedBy(auth()->user()))
       <form action="{{route('posts.destroy',$post)}}" method="POST">
       @csrf
       @method('DELETE')
       <button type="submit" class="text-blue-600">Delete</button>
       </form>
       @endif
    </div>
   <div class="flex center">
    @auth
    @if(!$post->likedBy(auth()->user()))
       <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-1">
        @csrf
        <button type="submit" class="text-blue-500">Like</button>
       </form>
    @else
       <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-1">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">UnLike</button>
       </form>
    @endif
    @endauth
    <span>{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}} </span>
   </div>
</div>