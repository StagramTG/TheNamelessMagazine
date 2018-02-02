<?php
/**
 * User: Thomas Gredin
 * Date: 27/01/2018
 * Time: 21:43
 */

namespace Fuelblade\Controller;

use Windwalker\Edge\Edge;
use Windwalker\Edge\Loader\EdgeFileLoader;

class Blade extends \Controller
{
    public $config;
    public $edge;

    public function __construct()
    {
        $this->config = \Config::load('fuelblade', false, false, false);
        $this->edge = new Edge(new EdgeFileLoader($this->config['views_path']));
    }

    protected function view($file, $data = array())
    {
        return $this->edge->render($file, $data);
    }
}