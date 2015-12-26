<?php namespace Modules\Module\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Module\Transformers\ModuleDataTransformer;
use Packagist\Api\Client;

class ModuleController extends Controller
{
    /**
     * @var Client
     */
    private $packagist;
    /**
     * @var ModuleDataTransformer
     */
    private $transformer;

    public function __construct(Client $packagist, ModuleDataTransformer $transformer)
    {
        $this->packagist = $packagist;
        $this->transformer = $transformer;
    }

    public function packagistData(Request $request)
    {
        $package = $this->packagist->get($request->get('packagist_uri'));

        return response()->json($this->transformer->transform($package));
    }
}
