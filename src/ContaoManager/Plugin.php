<?php

declare(strict_types=1);

namespace Alpdesk\AlpdeskDialog\ContaoManager;

use Alpdesk\AlpdeskDialog\AlpdeskDialogBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [BundleConfig::create(AlpdeskDialogBundle::class)->setLoadAfter([ContaoCoreBundle::class])];
    }

}
