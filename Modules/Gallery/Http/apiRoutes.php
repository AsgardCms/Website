<?php

post('sites/submit', ['uses' => 'SitesController@create', 'as' => 'api.sites.submit']);
