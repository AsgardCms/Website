<?php namespace Modules\Module\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Media\Image\Imagy;
use Modules\Media\Repositories\FileRepository;
use Modules\Media\Services\FileService;
use Modules\Module\Entities\Module;
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
    /**
     * @var FileService
     */
    private $fileService;

    public function __construct(Client $packagist, ModuleDataTransformer $transformer, FileService $fileService)
    {
        $this->packagist = $packagist;
        $this->transformer = $transformer;
        $this->fileService = $fileService;
    }

    public function packagistData(Request $request)
    {
        $package = $this->packagist->get($request->get('packagist_uri'));

        return response()->json($this->transformer->transform($package));
    }

    public function addImages(Module $module, Request $request)
    {
        $savedFile = $this->fileService->store($request->file('file'));

        $module->files()->attach($savedFile->id, ['imageable_type' => get_class($module), 'zone' => 'module_gallery']);
    }

    public function unlink(Module $module, Request $request, FileRepository $fileRepository, Imagy $imagy)
    {
        DB::table('media__imageables')->whereFileId($request->get('fileId'))->delete();
        $file = $fileRepository->find($request->get('fileId'));
        $imagy->deleteAllFor($file);
        $fileRepository->destroy($file);
    }
}
