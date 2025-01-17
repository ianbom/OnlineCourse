@forelse($course as $course)
    <div class="bg-white rounded-lg overflow-hidden flex flex-col">
        @if($course->image)
        <a href="{{ route('kelas.show', $course->id_course) }}">
            <img src="{{ asset('storage/' . $course->image) }}"
                 alt="{{ $course->name_course }}"
                 class="w-full aspect-[9/16] object-cover rounded-xl">
        </a>
        @endif
        <div class="p-3 flex-1 flex flex-col justify-between">
            <h3 class="font-medium text-sm">{{ $course->name_course }}</h3>

            @if($course->isRated)
                <button class="bg bg-gray-500 p-2 rounded-sm">Sudah rating</button>
            @else
                <!-- Button untuk membuka modal -->
                <button onclick="toggleModal('ratingModal-{{ $course->id_course }}')"
                    class="mt-2 text-white bg-[#1E90FF] hover:bg-[#D3E9FF] hover:text-[#1E90FF] focus:outline-none focus:ring-2 focus:ring-[#1E90FF] focus:ring-offset-2 text-xs py-1 px-2 rounded-[12px]">
                    Beri Rating dan Komentar
                </button>
            @endif

            <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
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
            </div>
        </div>
    </div>

    <!-- Modal Rating untuk setiap course -->
    <div id="ratingModal-{{ $course->id_course }}" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-[16px] p-6 w-full max-w-md mx-4">
            <form action="{{ route('ulasan.store', $course->id_course) }}" method="POST">
                @csrf
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-[16px] font-bold text-[#052D6E]" style="font-family: 'Inter', sans-serif;">
                        Berikan Rating untuk Kursus Ini:
                    </h3>
                    <button type="button" onclick="toggleModal('ratingModal-{{ $course->id_course }}')" class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Rating Stars -->
                <div class="flex justify-center mb-6">
                    <div class="flex items-center space-x-2">
                        <input type="hidden" id="rating-{{ $course->id_course }}" name="rating" value="5">
                        <div class="flex space-x-1 text-2xl">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="cursor-pointer star-{{ $course->id_course }} text-[#D3E9FF] hover:text-[#1E90FF] transition-colors duration-200"
                                      onclick="setRating({{ $i }}, {{ $course->id_course }})">★</span>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Comment Box -->
                <div class="mb-6">
                    <textarea id="comment-{{ $course->id_course }}"
                            name="comment"
                            rows="3"
                            placeholder="Tuliskan komentar Anda..."
                            class="block w-full p-4 text-[14px] border rounded-[16px] text-[#979797] border-[#1E90FF] focus:outline-none focus:ring-1 focus:ring-[#1E90FF] resize-none"
                            ></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <button type="button"
                            onclick="toggleModal('ratingModal-{{ $course->id_course }}')"
                            class="px-4 py-2 font-bold text-[#E46B61] bg-[#FFCFC2] rounded-[12px] hover:bg-[#E46B61] hover:text-white transition-colors duration-200">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-4 py-2 font-bold text-white bg-[#1E90FF] rounded-[12px] hover:bg-[#D3E9FF] hover:text-[#1E90FF] transition-colors duration-200">
                        Kirim
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
    color: #1E90FF;
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
