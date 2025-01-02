@extends('web.layouts.template')

@section('content')
<div class="container mx-auto mt-8 px-4 max-w-5xl">
   <div class="flex items-center justify-between mb-8">
       <h1 class="text-3xl font-bold text-gray-800">{{ $materi->name_materi }}</h1>
       <div class="flex gap-3">
           <a href="{{ route('question.create', $materi->id_materi) }}"
               class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition-colors duration-200 flex items-center gap-2">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                   <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
               </svg>
               Tambah Pertanyaan
           </a>
           <a href="{{ route('materi.index') }}"
               class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
               Kembali
           </a>
       </div>
   </div>

   @if (session('success'))
   <div class="px-4 py-3 mb-8 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg">
       {{ session('success') }}
   </div>
   @endif

   <div class="bg-white rounded-xl shadow-sm border">
       @if ($question->isEmpty())
       <div class="p-8 text-center">
           <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
           </svg>
           <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada pertanyaan</h3>
           <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan pertanyaan baru untuk materi ini.</p>
       </div>
       @else
       <ul class="divide-y divide-gray-100">
           @foreach ($question as $q)
           <li class="p-6 hover:bg-gray-50 transition-colors duration-150">
               <div class="flex items-start justify-between">
                   <h2 class="text-lg font-medium text-gray-900 mb-3">{{ $q->question }}</h2>
                   <a href="{{ route('question.edit', $q->id_question) }}"
                       class="flex items-center gap-1 px-3 py-1 text-sm font-medium text-blue-600 hover:text-blue-700">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                           <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                       </svg>
                       Edit
                   </a>
               </div>
               <div class="mt-2 space-y-2">
                   @foreach ($q->option as $option)
                   <div class="flex items-center gap-2 text-sm text-gray-600">
                       <span class="w-4 h-4 rounded-full border flex-shrink-0
                           {{ $option->is_correct ? 'bg-green-100 border-green-500' : 'bg-gray-100 border-gray-300' }}">
                       </span>
                       <span class="{{ $option->is_correct ? 'font-medium text-green-700' : '' }}">
                           {{ $option->option }}
                       </span>
                   </div>
                   @endforeach
               </div>
           </li>
           @endforeach
       </ul>
       @endif
   </div>
</div>
@endsection
