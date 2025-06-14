<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = ['url'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Initialize session
        $session = \Config\Services::session();

        // Get the first URL segment to determine the locale
        $segment = service('uri')->getSegment(1);

        // Determine the locale based on the URL segment ('en' or 'id'), default to 'id'
        $locale = ($segment === 'en') ? 'en' : 'id';

        // Update session language if it differs from the current session value
        if ($session->get('lang') !== $locale) {
            $session->set('lang', $locale);
        }

        // Set the application locale
        service('request')->setLocale($locale);
    }
}
