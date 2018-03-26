<?php

namespace desarrollo\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
        $response = new Response('<html><head></head><body>sss</body></html>');
        return new Response($response);
        echo '<html><head></head><body>';
        echo 'asas';
        echo '</body></html>';
        exit();
        return '123';
    }
}