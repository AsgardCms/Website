<?php

get('gallery', ['uses' => 'GalleryController@index', 'as' => 'gallery.index']);
get('reset_op_cache', ['uses' => 'GalleryController@resetOpCache']);

