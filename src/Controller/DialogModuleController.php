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

        /*$template->id = $model->id;

        switch ($model->overlay_loadingTime) {
            case 'onLeave':
                $GLOBALS['TL_BODY'][] = '<script src="' . $this->packages->getUrl('plentatooltip/overlay_showOnExit.js', 'plentatooltip') . '"></script>';
                break;
            case 'onLoad':
                $GLOBALS['TL_BODY'][] = '<script src="' . $this->packages->getUrl('plentatooltip/overlay_showOnPageLoad.js', 'plentatooltip') . '"></script>';
                break;
            case 'afterTime':
                $GLOBALS['TL_BODY'][] = '<script src="' . $this->packages->getUrl('plentatooltip/overlay_showAfterTime.js', 'plentatooltip') . '"></script>';
                $template->data_delay = $model->overlay_delay;
                break;
            case 'afterScroll':
                $GLOBALS['TL_BODY'][] = '<script src="' . $this->packages->getUrl('plentatooltip/overlay_showAfterScroll.js', 'plentatooltip') . '"></script>';
                $template->data_percent = $model->overlay_percent;
                break;
        }

        $GLOBALS['TL_CSS'][] = $this->packages->getUrl('plentatooltip/overlay_default.css', 'plentatooltip');

        $template->data_expires = $model->overlay_cookie_expires;
        $template->overlay_html = $model->overlay_html;
        $template->overlay_richtext = $model->overlay_richtext;*/

        return $template->getResponse();
    }

}