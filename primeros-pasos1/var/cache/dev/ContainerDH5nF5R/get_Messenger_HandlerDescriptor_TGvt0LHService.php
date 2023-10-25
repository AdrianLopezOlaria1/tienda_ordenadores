<?php

namespace ContainerDH5nF5R;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_TGvt0LHService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.messenger.handler_descriptor.tGvt0LH' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Handler/HandlerDescriptor.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Messenger/MessageHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport/TransportInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport/Transports.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/mailer/Transport.php';

        return $container->privates['.messenger.handler_descriptor.tGvt0LH'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(new \Symfony\Component\Mailer\Messenger\MessageHandler((new \Symfony\Component\Mailer\Transport(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['mailer.transport_factory.null'] ?? $container->load('getMailer_TransportFactory_NullService'));
            yield 1 => ($container->privates['mailer.transport_factory.sendmail'] ?? $container->load('getMailer_TransportFactory_SendmailService'));
            yield 2 => ($container->privates['mailer.transport_factory.native'] ?? $container->load('getMailer_TransportFactory_NativeService'));
            yield 3 => ($container->privates['mailer.transport_factory.smtp'] ?? $container->load('getMailer_TransportFactory_SmtpService'));
        }, 4)))->fromStrings(['main' => $container->getEnv('MAILER_DSN')])), []);
    }
}
