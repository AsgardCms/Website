<?php namespace Modules\Faq\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Faq\Entities\Faq;
use Modules\Faq\Http\Requests\CreateFaqRequest;
use Modules\Faq\Http\Requests\UpdateFaqRequest;
use Modules\Faq\Repositories\FaqRepository;

class FaqController extends AdminBaseController
{
    /**
     * @var FaqRepository
     */
    private $faq;

    public function __construct(FaqRepository $faq)
    {
        parent::__construct();

        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $faqs = $this->faq->all();

        return view('faq::admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('faq::admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFaqRequest $request
     * @return Response
     */
    public function store(CreateFaqRequest $request)
    {
        $this->faq->create($request->all());

        Flash::success(trans('faq::faqs.messages.faq created'));

        return redirect()->route('admin.faq.faq.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faq $faq
     * @return Response
     */
    public function edit(Faq $faq)
    {
        return view('faq::admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Faq $faq
     * @param  UpdateFaqRequest $request
     * @return Response
     */
    public function update(Faq $faq, UpdateFaqRequest $request)
    {
        $this->faq->update($faq, $request->all());

        Flash::success(trans('faq::faqs.messages.faq updated'));

        return redirect()->route('admin.faq.faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Faq $faq
     * @return Response
     */
    public function destroy(Faq $faq)
    {
        $this->faq->destroy($faq);

        Flash::success(trans('faq::faqs.messages.faq deleted'));

        return redirect()->route('admin.faq.faq.index');
    }
}
