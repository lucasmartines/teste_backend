<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class NoAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if( session()->get( "isLogged" ) ){

             return redirect()->to("/list");
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {


    }
}