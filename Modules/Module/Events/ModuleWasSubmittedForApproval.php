<?php namespace Modules\Module\Events;

use Modules\Module\Entities\Module;

class ModuleWasSubmittedForApproval
{
    /**
     * @var Module
     */
    public $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }
}
