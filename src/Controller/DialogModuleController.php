<?php

declare(strict_types=1);

namespace Alpdesk\AlpdeskDialog\Controller;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Contao\StringUtil;
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

        $isModal = 'true';
        if ($model->alpdeskDialogDisableModal === true || $model->alpdeskDialogDisableModal === '1') {
            $isModal = 'false';
        }

        $cssID = StringUtil::deserialize($model->cssID, true);

        $template->set('dialogId', \trim($cssID[0]) !== '' ? \trim($cssID[0]) : 'alpdeskDialog' . $model->id);
        $template->set('dialogClass', \trim($cssID[1]) !== '' ? \trim($cssID[1]) : 'alpdeskDialog');
        $template->set('dialogContent', $dialogContent);
        $template->set('dialogOpenDelay', (int)($model->alpdeskDialogOpenDelay ?? 0));
        $template->set('dialogScrollDelay', (int)($model->alpdeskDialogScrollDelay ?? 0));
        $template->set('dialogOpenButtonLabel', (string)($model->alpdeskDialogOpenButtonLabel ?? ''));
        $template->set('dialogModal', $isModal);
        $template->set('dialogPosition', (string)($model->alpdeskDialogPosition ?? 'center'));
        $template->set('closeIconUrl', $this->packages->getUrl('images/close.svg', 'alpdesk_dialog'));

        return $template->getResponse();
    }

}