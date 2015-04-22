<?php namespace Modules\Faq\Http\Controllers\Frontend;

use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Faq\Repositories\FaqRepository;

class FaqController extends BasePublicController
{
    /**
     * @var FaqRepository
     */
    private $faq;

    /**
     * @param FaqRepository $faq
     */
    public function __construct(FaqRepository $faq)
    {
        parent::__construct();
        $this->faq = $faq;
    }

    /**
     * Display the questions & answers
     * @return $this
     */
    public function index()
    {
        $faqs = $this->faq->all();

        return view('faq::public.faq')->with(compact('faqs'));
    }
}
