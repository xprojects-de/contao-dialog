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

        $dialogContent = '';

        $textContent = ($model->alpdeskDialogText ?? '');
        if (\trim($textContent) !== '') {
            $dialogContent .= $textContent;
        }

        $htmlContent = ($model->alpdeskDialogUnfilteredHtml ?? '');
        if (\trim($htmlContent) !== '') {
            $dialogContent .= $htmlContent;
        }

        $preventScroll = 'true';
        if ($model->alpdeskDialogDisablePreventScroll === true || $model->alpdeskDialogDisablePreventScroll === '1') {
            $preventScroll = 'false';
        }

        $backDrop = 'true';
        if ($model->alpdeskDialogDisableBackdrop === true || $model->alpdeskDialogDisableBackdrop === '1') {
            $backDrop = 'false';
        }

        $template->set('dialogId', $model->id);
        $template->set('dialogContent', $dialogContent);
        $template->set('dialogOpenDelay', (int)($model->alpdeskDialogOpenDelay ?? 0));
        $template->set('dialogScrollDelay', (int)($model->alpdeskDialogScrollDelay ?? 0));
        $template->set('dialogOpenButtonLabel', (string)($model->alpdeskDialogOpenButtonLabel ?? ''));
        $template->set('dialogPreventScroll', $preventScroll);
        $template->set('dialogBackdrop', $backDrop);
        $template->set('closeIconUrl', $this->packages->getUrl('images/close.svg', 'alpdesk_dialog'));

        return $template->getResponse();
    }

}