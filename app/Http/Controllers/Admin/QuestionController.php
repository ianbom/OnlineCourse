<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;
use App\Models\Materi;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Materi $materi)
    {
        $question = Question::where('id_materi', $materi->id_materi)->get();

        return view('web.admin.question.index_question', ['question' => $question, 'materi' => $materi]);
    }

    public function create(Materi $materi)
    {
        return view('web.admin.question.create_question', ['materi' => $materi]);
    }

    public function edit(Question $question)
    {
        $materi = Materi::all();
        return view('web.admin.question.edit_question', ['question' => $question, 'materi' => $materi]);
    }

    public function store(QuestionRequest $request)
    {
        $data = $request->only(['id_materi', 'question']);
        $question = Question::create($data);

        $option = $request->input('option');
        $correctIndex = $request->input('is_correct');

        foreach ($option as $index => $optionText) {
            $question->option()->create([
                'option' => $optionText,
                'is_correct' => $index == $correctIndex
            ]);
        }

        return redirect()->route('question.index', ['materi' =>  $request->id_materi])->with('success', 'Pertanyaan berhasil ditambahkan');
    }


    public function update(QuestionRequest $request, Question $question)
    {
        $data = $request->only(['id_materi', 'question']);
        $question->update($data);

        $optionsData = $request->input('option');
        $correctIndex = $request->input('is_correct');

        $existingOptionIds = $question->option()->pluck('id_option')->toArray();

        $updatedOptionIds = [];

        foreach ($optionsData as $index => $optionData) {
            if (isset($optionData['id_option'])) {

                $option = $question->option()->find($optionData['id_option']);
                if ($option) {
                    $option->update([
                        'option' => $optionData['option'],
                        'is_correct' => $index == $correctIndex
                    ]);
                    $updatedOptionIds[] = $option->id_option;
                }
            } else {

                $newOption = $question->option()->create([
                    'option' => $optionData['option'],
                    'is_correct' => $index == $correctIndex
                ]);
                $updatedOptionIds[] = $newOption->id_option;
            }
        }

        // Hapus opsi lama yang tidak ada di data terbaru
        $optionsToDelete = array_diff($existingOptionIds, $updatedOptionIds);
        $question->option()->whereIn('id_option', $optionsToDelete)->delete();

        return redirect()->route('question.index')->with('success', 'Pertanyaan berhasil diperbarui');
    }



    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->back()->with('success', 'Question deleted successfully');
    }
}
