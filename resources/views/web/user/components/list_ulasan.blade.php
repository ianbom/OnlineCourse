@forelse($course as $course)
    <div class="bg-white rounded-lg overflow-hidden flex flex-col">
        @if($course->image)
        <a href="{{ route('ulasan.show', $course->id_course) }}">
            <img src="{{ asset('storage/' . $course->image) }}"
                 alt="{{ $course->name_course }}"
                 class="w-full aspect-[9/9] object-cover rounded-xl">
        </a>
        @endif
        <div class="p-1 flex-1 flex flex-col justify-between mt-4">
            <h3 class="font-semibold text-[15px] text-[#484848]" style="font-family: 'Inter', sans-serif;">
                {{ $course->name_course }}
            </h3>

            <!-- Display number of video materials -->
            <p class="text-[#F58A44] font-sm text-[14px] mb-2 mt-1" style="font-family: 'Inter', sans-serif;">
                {{ $course->materi->whereNotNull('video')->count() }} Video Materi
            </p>

            @if($course->isRated)
                <button class="bg-[#EA6A17] text-white font-bold text-[16px] py-2 px-6 rounded-full shadow-md">
                    Sudah rating
                </button>
            @else
                <!-- Button untuk membuka modal -->
                <button onclick="toggleModal('ratingModal-{{ $course->id_course }}')"
                    class="mt-2 text-white bg-[#F58A44] hover:bg-[#EA6A17] focus:outline-none focus:ring-2 focus:ring-[#EA6A17] focus:ring-offset-2 text-[16px] font-bold py-2 px-4 rounded-[50px] relative">
                    Beri Ulasan
                    <span class="absolute top-1/2 right-3 transform -translate-y-1/2 bg-white p-1 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F58A44" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </span>
                </button>
            @endif

            {{-- <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $course->created_at->diffForHumans() }}
                </span>
                @if($course->video)
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-1 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm-1 11V7l5 3-5 3z"/>
                    </svg>
                    Video Tersedia
                </span>
                @endif
            </div> --}}
        </div>
    </div>

    <!-- Modal Rating untuk setiap course -->
    <div id="ratingModal-{{ $course->id_course }}" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-[16px] p-6 w-full max-w-md mx-4">
            <form action="{{ route('ulasan.store', $course->id_course) }}" method="POST">
                @csrf
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-[16px] font-semibold text-[#484848]" style="font-family: 'Inter', sans-serif;">
                        Bagaimana Kualitas Kursus Anda?
                    </h3>
                    <button type="button" onclick="toggleModal('ratingModal-{{ $course->id_course }}')"
                        class="w-8 h-8 flex items-center justify-center rounded-full bg-[#F58A44] text-white hover:bg-[#EA6A17] transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Rating Stars -->
                <div class="flex justify-center mb-6">
                    <div class="flex items-center space-x-2">
                        <input type="hidden" id="rating-{{ $course->id_course }}" name="rating" value="5">
                        <div class="flex space-x-1 text-4xl"> <!-- Increased size to 4xl -->
                            @for($i = 1; $i <= 5; $i++)
                                <span class="cursor-pointer star-{{ $course->id_course }} text-[#f5d5c0] hover:text-[#F58A44] transition-colors duration-200"
                                    onclick="setRating({{ $i }}, {{ $course->id_course }})">★</span>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Comment Box with Send Button -->
                <div class="mb-6 relative">
                    <textarea id="comment-{{ $course->id_course }}"
                            name="comment"
                            rows="3"
                            placeholder="Tuliskan komentar Anda..."
                            class="block w-full p-4 text-[14px] border rounded-[16px] text-[#979797] border-[#F58A44] focus:outline-none focus:ring-1 focus:ring-[#F58A44] resize-none"></textarea>
                    <button type="submit" class="absolute right-4 bottom-4 p-2 bg-[#F58A44] rounded-full text-white shadow-lg hover:bg-[#EA6A17] focus:outline-none focus:ring-2 focus:ring-[#EA6A17]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

@empty
    <p>Tidak ada data yang ditemukan</p>
@endforelse

<style>
.star-rating span.active {
    color: #F58A44;
}
</style>

<script>
function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
    } else {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // Re-enable scrolling
        resetRating(modalId.split('-')[1]); // Reset rating when closing
    }
}

function setRating(value, courseId) {
    document.getElementById(`rating-${courseId}`).value = value;
    const stars = document.querySelectorAll(`.star-${courseId}`);

    stars.forEach((star, index) => {
        if (index < value) {
            star.style.color = '#1E90FF'; // Active color
        } else {
            star.style.color = '#D3E9FF'; // Inactive color
        }
    });
}

function resetRating(courseId) {
    const stars = document.querySelectorAll(`.star-${courseId}`);
    const ratingInput = document.getElementById(`rating-${courseId}`);
    const commentInput = document.getElementById(`comment-${courseId}`);

    // Reset rating to 5
    ratingInput.value = "5";
    stars.forEach((star, index) => {
        if (index < 5) {
            star.style.color = '#1E90FF';
        } else {
            star.style.color = '#D3E9FF';
        }
    });

    // Clear comment
    if (commentInput) {
        commentInput.value = '';
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('fixed')) {
        toggleModal(event.target.id);
    }
}

// Prevent propagation for modal content
document.querySelectorAll('.bg-white').forEach(modal => {
    modal.onclick = function(event) {
        event.stopPropagation();
    }
});
</script>
