<?php

post('module/packagist_data', ['uses' => 'ModuleController@packagistData', 'as' => 'module.packagist_data']);
post('module/gallery/{singleModule}', ['uses' => 'ModuleController@addImages', 'as' => 'api.module.addImages']);
post('module/gallery/{singleModule}/unlink', ['uses' => 'ModuleController@unlink', 'as' => 'api.module.unlink']);
