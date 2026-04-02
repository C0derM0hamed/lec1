<script src="https://cdn.tailwindcss.com"></script>

<script>
  function deletePost(postId) {
    return confirm('Are you sure you want to delete this post?');
  }
</script>

<div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
  <article class="rounded-2xl border border-gray-100 bg-white p-8 shadow-lg shadow-gray-100">
    <div class="mb-4 inline-block rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-600">
      #{{ $post->id }}
    </div>

    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $post->title }}</h1>

    <p class="mt-5 whitespace-pre-line text-base leading-relaxed text-gray-600">{{ $post->content }}</p>

    <div class="mt-8 flex items-center gap-3 border-t border-gray-100 pt-6 text-sm">
      <a href="/posts/{{ $post->id }}/edit" class="rounded-lg bg-amber-50 px-4 py-2 font-medium text-amber-600 transition-colors duration-150 hover:bg-amber-100">Edit</a>
      <form action="/posts/{{ $post->id }}" method="POST" onsubmit="return deletePost();">
        @csrf
        @method('DELETE')
        <button type="submit" class="rounded-lg bg-red-50 px-4 py-2 font-medium text-red-600 transition-colors duration-150 hover:bg-red-100">Delete</button>
      </form>
    </div>
  </article>
</div>
