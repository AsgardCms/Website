<?php namespace Modules\Faq\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Faq\Entities\Question;
use Modules\Faq\Repositories\QuestionRepository;

class QuestionController extends AdminBaseController
{
    /**
     * @var QuestionRepository
     */
    private $question;

    public function __construct(QuestionRepository $question)
    {
        parent::__construct();

        $this->question = $question;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$questions = $this->question->all();

        return view('faq::admin.questions.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('faq::admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->question->create($request->all());

        Flash::success(trans('faq::questions.messages.question created'));

        return redirect()->route('admin.faq.question.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Question $question
     * @return Response
     */
    public function edit(Question $question)
    {
        return view('faq::admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Question $question
     * @param  Request $request
     * @return Response
     */
    public function update(Question $question, Request $request)
    {
        $this->question->update($question, $request->all());

        Flash::success(trans('faq::questions.messages.question updated'));

        return redirect()->route('admin.faq.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Question $question
     * @return Response
     */
    public function destroy(Question $question)
    {
        $this->question->destroy($question);

        Flash::success(trans('faq::questions.messages.question deleted'));

        return redirect()->route('admin.faq.question.index');
    }
}
