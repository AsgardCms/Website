<?php namespace Modules\Module\Transformers;

use Illuminate\Contracts\Filesystem\Factory;
use Packagist\Api\Result\Package;
use PHPGit\Git;

class ModuleDataTransformer
{
    /**
     * @var Factory
     */
    private $diskFactory;
    /**
     * @var Git
     */
    private $git;

    public function __construct(Factory $diskFactory, Git $git)
    {
        $this->diskFactory = $diskFactory;
        $this->git = $git;
    }

    /**
     * @param Package $package
     * @return array
     */
    public function transform(Package $package)
    {
        list($vendor, $name) = $this->splitVendorAndName($package->getName());

        $this->diskFactory->disk('local')->makeDirectory('storage/modules/' . $package->getName());

        if ($this->diskFactory->disk('local')->allDirectories('storage/modules/' . $package->getName()) === []) {
            $this->git->clone($package->getRepository(), storage_path('modules/' . $package->getName()));
        }

        return [
            'vendor' => $vendor,
            'name' => $name,
            'excerpt' => $package->getDescription(),
            'description' => $this->getReadmeFileFor($package),
            'favourites' => $package->getFavers(),
            'total_downloads' => $package->getDownloads()->getTotal(),
            'monthly_downloads' => $package->getDownloads()->getMonthly(),
            'daily_downloads' => $package->getDownloads()->getDaily(),
        ];
    }

    private function splitVendorAndName($vendorName)
    {
        return explode('/', $vendorName);
    }

    /**
     * Get the readme file contents if one exists
     * @param Package $package
     * @return string
     */
    private function getReadmeFileFor(Package $package)
    {
        $readmeLocation = 'storage/modules/' . $package->getName();
        if ($this->diskFactory->disk('local')->exists($readmeLocation . '/readme.md')) {
            return $this->diskFactory->disk('local')->get($readmeLocation . '/readme.md');
        }
        if ($this->diskFactory->disk('local')->exists($readmeLocation . '/README.md')) {
            return $this->diskFactory->disk('local')->get($readmeLocation . '/README.md');
        }
        return '';
    }
}
