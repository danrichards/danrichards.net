<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $layout = "templates.clean-blog.default";
    protected $page;

    public function __construct()
    {
        $this->page = new \stdClass;
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return $this
     */
    protected function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * Return data for our view
     *
     * @param $extra
     * @return array
     */
    protected function data($extra = array())
    {
        return array_merge([
            'layout'    => $this->layout,
            'site'      => (object) config('danrichards.views'),
            'page'      => $this->page,
            'server'    => $_SERVER['SERVER_NAME'],
            'errors'    => session('errors'),
            'warnings'    => session('warnings'),
            'notices'    => session('notices')
        ],
            $extra
        );
    }

}
