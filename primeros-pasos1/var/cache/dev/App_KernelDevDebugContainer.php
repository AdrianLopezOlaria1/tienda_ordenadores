<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDH5nF5R\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDH5nF5R/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDH5nF5R.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDH5nF5R\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerDH5nF5R\App_KernelDevDebugContainer([
    'container.build_hash' => 'DH5nF5R',
    'container.build_id' => '8b0eb86f',
    'container.build_time' => 1698218120,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDH5nF5R');
