<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('english', [
    'as' => 'english',
    'uses' => 'Foostart\English\Controllers\Front\EnglishFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
        'namespace' => 'Foostart\English\Controllers\Admin',
    ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage english
          |-----------------------------------------------------------------------
          | 1. List of english
          | 2. Edit english
          | 3. Delete english
          | 4. Add new english
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/english', [
            'as' => 'english.list',
            'uses' => 'EnglishAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/english/edit', [
            'as' => 'english.edit',
            'uses' => 'EnglishAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/english/copy', [
            'as' => 'english.copy',
            'uses' => 'EnglishAdminController@copy'
        ]);

        /**
         * english
         */
        Route::post('admin/english/edit', [
            'as' => 'english.english',
            'uses' => 'EnglishAdminController@english'
        ]);

        /**
         * delete
         */
        Route::get('admin/english/delete', [
            'as' => 'english.delete',
            'uses' => 'EnglishAdminController@delete'
        ]);

        /**
         * trash
         */
        Route::get('admin/english/trash', [
            'as' => 'english.trash',
            'uses' => 'EnglishAdminController@trash'
        ]);

        /**
         * configs
         */
        Route::get('admin/english/config', [
            'as' => 'english.config',
            'uses' => 'EnglishAdminController@config'
        ]);

        Route::post('admin/english/config', [
            'as' => 'english.config',
            'uses' => 'EnglishAdminController@config'
        ]);

        /**
         * language
         */
        Route::get('admin/english/lang', [
            'as' => 'english.lang',
            'uses' => 'EnglishAdminController@lang'
        ]);

        Route::post('admin/english/lang', [
            'as' => 'english.lang',
            'uses' => 'EnglishAdminController@lang'
        ]);

    });
});
