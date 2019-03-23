<?php
namespace GoalioMailService\Mail\View;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\View\Renderer\PhpRenderer;

class MailPhpRendererFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $renderer = new PhpRenderer();

        $helperManager = $container->get('ViewHelperManager');
        $resolver      = $container->get('ViewResolver');

        $renderer->setHelperPluginManager($helperManager);
        $renderer->setResolver($resolver);

        $application = $container->get('Application');
        $event       = $application->getMvcEvent();

        if($event !== null) {
            $model = $container->get('Application')->getMvcEvent()->getViewModel();

            $modelHelper = $renderer->plugin('view_model');
            $modelHelper->setRoot($model);
        }

        return $renderer;
    }
}