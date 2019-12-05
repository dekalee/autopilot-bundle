<?php

namespace Dekalee\AutopilotBundle\Interceptor;

use Dekalee\AutopilotBundle\DataCollector\AutopilotDataCollector;
use CG\Proxy\MethodInterceptorInterface;
use CG\Proxy\MethodInvocation;

/**
 * Class AutopilotManagerInterceptor
 */
class AutopilotManagerInterceptor implements MethodInterceptorInterface
{
    protected $dataCollector;

    /**
     * @param AutopilotDataCollector $dataCollector
     */
    public function __construct(AutopilotDataCollector $dataCollector)
    {
        $this->dataCollector = $dataCollector;
    }

    /**
     * Called when intercepting a method call.
     *
     * @param  MethodInvocation $invocation
     *
     * @return mixed            the return value for the method invocation
     * @throws \Exception       may throw any exception
     */
    public function intercept(MethodInvocation $invocation)
    {
        $response = $invocation->proceed();

        $this->dataCollector->addCall($invocation->reflection->name, $invocation->arguments);

        return $response;
    }
}
