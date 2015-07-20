<?php

namespace SMS\Core\Controller;

use SMS\Core\Silex\Layout;

/**
 * Class AbstractController
 * @package Exaprint\Preflight\Controller */
abstract class AbstractController
{
    /**
     * @param $url
     */
    public function redirect($url)
    {
        Layout::getInstance()->redirect($url)->send();
    }

    /**
     * @param array $data
     * @param int   $status
     * @param array $headers
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    final public function sendJson($data = array(), $status = 200, array $headers = array())
    {
        return Layout::getInstance()->json($data, $status, $headers);
    }

    /**
     * @param $file
     * @param int   $status
     * @param array $headers
     * @param null  $contentDisposition
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    final public function sendFile($file, $status = 200, array $headers = array(), $contentDisposition = null)
    {
        return Layout::getInstance()->sendFile($file, $status, $headers, $contentDisposition);
    }

    /**
     * Render template from twig engine (with default / specific template).
     *
     * @param $parameters
     * @param null $template
     *
     * @return mixed
     */
    final public function render($parameters = array(), $template = null)
    {
        if (Layout::issetService('twig.currentTmpl')) {
            $template = is_null($template) ? Layout::getService('twig.currentTmpl') : $template;
            Layout::unsetService('twig.currentTmpl');
        }

        return Layout::template()->render($template, $parameters);
    }
}
