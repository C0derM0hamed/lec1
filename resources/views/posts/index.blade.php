<x-layout>

<script>
  function deletePost(postId) {
    return confirm('Are you sure you want to delete this post?');
  }
</script>

<div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">
  <div class="mb-8 flex items-center justify-between">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Posts</h1>
    <a href="/posts/create"
      class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-indigo-200 transition-all duration-200 hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      Add Post
    </a>
  </div>

  @foreach ($posts as $post)
    <article
      class="mb-5 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all duration-200 hover:shadow-md hover:border-indigo-100">
      <div class="flex items-start justify-between gap-4">
        <div>
          <div class="mb-2.5 inline-block rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-600">
            #{{ $post->id }}
          </div>

          <h2 class="text-lg font-bold text-gray-900">
            <a href="/posts/{{ $post->id }}"
              class="transition-colors duration-150 hover:text-indigo-600 hover:underline decoration-indigo-300 underline-offset-2">{{ $post->title }}</a>
          </h2>

          <p class="mt-1 text-xs font-semibold text-indigo-600">Slug: {{ $post->slug }}</p>

          <p class="mt-2 text-sm leading-relaxed text-gray-500">{{ $post->content }}</p>
          <p class="text-xs text-gray-500">By {{ $post->user->name ?? 'Unknown' }}</p>
          @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-48 object-cover rounded-md">
          @endif

        </div>

        <div class="flex shrink-0 items-center gap-2 text-sm">
          @if ($post->trashed())
             <form action="{{ route('posts.restore', $post->id) }}" method="POST" class="inline">
              @csrf
              @method('PATCH')
              <button type="submit"
                class="rounded-lg bg-emerald-50 px-3 py-1.5 font-medium text-emerald-600 transition-colors duration-150 hover:bg-emerald-100">
                Restore
                /**
     * Return the sluggable configuration array for this model.
     */</button>
              </form>

              <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="rounded-lg bg-red-50 px-3 py-1.5 font-medium text-red-600 transition-colors duration-150 hover:bg-red-100"
                  onclick="return confirm('Permanently delete this post?')">
                  Delete Permanently
                </button>
              
               </form>
          @else
            <a href="{{ route('posts.show', $post->id) }}"
              class="rounded-lg bg-indigo-50 px-3 py-1.5 font-medium text-indigo-600 transition-colors duration-150 hover:bg-indigo-100">View</a>
            <a href="{{ route('posts.edit', $post->id) }}"
              class="rounded-lg bg-amber-50 px-3 py-1.5 font-medium text-amber-600 transition-colors duration-150 hover:bg-amber-100">Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit"
                class="rounded-lg bg-red-50 px-3 py-1.5 font-medium text-red-600 transition-colors duration-150 hover:bg-red-100"
                onclick="return confirm('Move this post to trash?')">Delete</button>
            </form>
          @endif

        </div>
      </div>
    </article>
    
    @endforeach
    <div class="mt-4">
      {{$posts->links()}}
    </div>
    

</div>

  @foreach($errors as $err)
    <p class="text-sm text-red-500">{{ $err }}</p>
  @endforeach

</x-layout>
