<?php namespace Modules\Module\Http\Controllers\Api;

use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Packagist\Api\Client;
use Packagist\Api\Result\Package;
use PHPGit\Git;

class ModuleController extends Controller
{
    /**
     * @var Client
     */
    private $packagist;
    /**
     * @var Git
     */
    private $git;
    /**
     * @var Factory
     */
    private $finder;

    public function __construct(Client $packagist, Git $git, Factory $finder)
    {
        $this->packagist = $packagist;
        $this->git = $git;
        $this->finder = $finder;
    }

    public function packagistData(Request $request)
    {
        $package = $this->packagist->get($request->get('packagist_url'));
        list($vendor, $name) = $this->splitVendorAndName($package->getName());

//        $this->finder->disk('local')->makeDirectory('storage/modules/' . $package->getName());
//        $this->git->clone($package->getRepository(), storage_path('modules/' . $package->getName()));

        return response()->json([
            'vendor' => $vendor,
            'name' => $name,
            'excerpt' => $package->getDescription(),
            'description' => $this->finder->disk('local')->get('storage/modules/' . $package->getName() . '/readme.md'),
        ]);
    }

    private function splitVendorAndName($vendorName)
    {
        return explode('/', $vendorName);
    }
}
