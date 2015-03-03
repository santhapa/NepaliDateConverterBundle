<?php

namespace Calendar\NepaliDateConverterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('calendar_nepali_date_converter');

        $rootNode
            ->children()
                ->arrayNode('nepali')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->enumNode('date_format')
                            ->values(array('dd-mm-yyyy', 'mm-dd-yyyy', 'yyyy-mm-dd', 'dd-mmm-yyyy', 'mmm-dd-yyyy', 'dd-mmmm-yyyy', 'mmmm-dd-yyyy', 'mmmm-dd-yyyy-w', 'dd-mmmm-yyyy-w'))
                            ->defaultValue('yyyy-mm-dd')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('english')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->enumNode('date_format')
                            ->values(array('dd-mm-yyyy', 'mm-dd-yyyy', 'yyyy-mm-dd', 'dd-mmm-yyyy', 'mmm-dd-yyyy', 'dd-mmmm-yyyy', 'mmmm-dd-yyyy', 'mmmm-dd-yyyy-w', 'dd-mmmm-yyyy-w'))
                            ->defaultValue('yyyy-mm-dd')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}

