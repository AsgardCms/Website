<?php namespace Modules\Faq\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Faq\Entities\Answer;
use Modules\Faq\Repositories\AnswerRepository;

class AnswerController extends AdminBaseController
{
    /**
     * @var AnswerRepository
     */
    private $answer;

    public function __construct(AnswerRepository $answer)
    {
        parent::__construct();

        $this->answer = $answer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$answers = $this->answer->all();

        return view('faq::admin.answers.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('faq::admin.answers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->answer->create($request->all());

        Flash::success(trans('faq::answers.messages.answer created'));

        return redirect()->route('admin.faq.answer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Answer $answer
     * @return Response
     */
    public function edit(Answer $answer)
    {
        return view('faq::admin.answers.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Answer $answer
     * @param  Request $request
     * @return Response
     */
    public function update(Answer $answer, Request $request)
    {
        $this->answer->update($answer, $request->all());

        Flash::success(trans('faq::answers.messages.answer updated'));

        return redirect()->route('admin.faq.answer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Answer $answer
     * @return Response
     */
    public function destroy(Answer $answer)
    {
        $this->answer->destroy($answer);

        Flash::success(trans('faq::answers.messages.answer deleted'));

        return redirect()->route('admin.faq.answer.index');
    }
}
