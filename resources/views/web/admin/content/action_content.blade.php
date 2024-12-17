<div class="flex space-x-2">
    <a href="{{ route('content.edit', $content->id_content) }}"
        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg focus:outline-none focus:shadow-outline-blue"
        aria-label="Edit">
        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
        </svg>
    </a>
    <a href="{{ route('content.show', $content->id_content) }}"
        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg focus:outline-none focus:shadow-outline-blue"
        aria-label="Show">
        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.5 3.5C7 3.5 4 7 4 10s3 6.5 5.5 6.5S15 13 15 10 12 3.5 9.5 3.5zM9.5 5c1.5 0 4 3.5 4 5s-2.5 5-4 5-4-3.5-4-5 2.5-5 4-5zm0 1.5C8.67 6.5 8 7.17 8 8s.67 1.5 1.5 1.5S11 8.83 11 8s-.67-1.5-1.5-1.5z"></path>
        </svg>
    </a>
    <form action="{{ route('content.destroy', $content->id_content) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-red"
            aria-label="Delete">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </form>
</div>
