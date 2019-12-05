<?php

namespace Dekalee\AutopilotBundle\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/**
 * Class AutopilotDataCollector
 */
class AutopilotDataCollector extends DataCollector
{
    /**
     * @param string $method
     * @param array  $parameters
     */
    public function addCall($method, $parameters = [])
    {
        $this->data[] = ['method' => $method, 'args' => $parameters];
    }

    /**
     * Collects data for the given Request and Response.
     *
     * @param Request    $request   A Request instance
     * @param Response   $response  A Response instance
     * @param \Exception $exception An Exception instance
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
    }

    /**
     * Returns the name of the collector.
     *
     * @return string The collector name
     */
    public function getName()
    {
        return 'autopilot';
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getCallCount()
    {
        return count($this->data);
    }

    /**
     * Reset the data collector
     */
    public function reset()
    {
        $this->data = array();
    }
}
