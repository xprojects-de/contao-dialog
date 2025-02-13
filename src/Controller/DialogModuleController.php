<?php

declare(strict_types=1);

namespace Alpdesk\AlpdeskDialog\Controller;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(self::TYPE, template: 'frontend_module/alpdesk_dialog')]
class DialogModuleController extends AbstractFrontendModuleController
{
    public const string TYPE = 'alpdesk_dialog';

    public function __construct(
        protected Packages $packages
    )
    {
    }

    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        $GLOBALS['TL_BODY'][] = '<script src="' . $this->packages->getUrl('alpdeskDialog.js', 'alpdesk_dialog') . '"></script>';
        $GLOBALS['TL_CSS'][] = $this->packages->getUrl('alpdeskDialog.css', 'alpdesk_dialog');

        $template->dialogId = $model->id;
        $template->dialogContent = ($model->unfilteredHtml ?? '');

        return $template->getResponse();
    }

}