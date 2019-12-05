<?php

namespace Dekalee\AutopilotBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class DekaleeAutopilotExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('dekalee_autopilot.client.api_key', $config['api_key']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('manager.yml');
        $loader->load('data_collector.yml');
        if (
            'dev' == $container->getParameter('kernel.environment')
            && array_key_exists('JMSAopBundle', $container->getParameter('kernel.bundles'))
        ) {
            $loader->load('pointcut.yml');
            $loader->load('interceptor.yml');
        }
    }
}
