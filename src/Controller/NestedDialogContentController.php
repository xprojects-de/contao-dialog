<?php

declare(strict_types=1);

namespace Alpdesk\AlpdeskDialog\Controller;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\StringUtil;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(self::TYPE, template: 'content_element/alpdesk_nested_dialog', nestedFragments: true)]
class NestedDialogContentController extends AbstractContentElementController
{
    public const string TYPE = 'alpdesk_nested_dialog';

    public function __construct(
        protected Packages $packages
    )
    {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $GLOBALS['TL_BODY'][] = '<script src="' . $this->packages->getUrl('alpdeskDialog.js', 'alpdesk_dialog') . '"></script>';
        $GLOBALS['TL_CSS'][] = $this->packages->getUrl('alpdeskDialog.css', 'alpdesk_dialog');

        $isModal = 'true';
        if ($model->alpdeskDialogDisableModal === true || $model->alpdeskDialogDisableModal === '1') {
            $isModal = 'false';
        }

        $cssID = StringUtil::deserialize($model->cssID, true);
        $styleId = (string)($cssID[0] ?? '');
        $styleClass = (string)($cssID[1] ?? '');

        $template->set('dialogId', \trim($styleId) !== '' ? \trim($styleId) : 'alpdeskDialog' . $model->id);
        $template->set('dialogClass', \trim($styleClass) !== '' ? \trim($styleClass) : 'alpdeskDialog');
        $template->set('dialogOpenDelay', (int)($model->alpdeskDialogOpenDelay ?? 0));
        $template->set('dialogScrollDelay', (int)($model->alpdeskDialogScrollDelay ?? 0));
        $template->set('dialogOpenButtonLabel', (string)($model->alpdeskDialogOpenButtonLabel ?? ''));
        $template->set('dialogModal', $isModal);
        $template->set('dialogStorageKey', 'nestedAlpdeskDialog' . $model->id);
        $template->set('dialogStorageExpires', (int)($model->alpdeskDialogStorageExpires ?? 0));
        $template->set('dialogPosition', (string)($model->alpdeskDialogPosition ?? 'center'));
        $template->set('dialogTransform', (string)($model->alpdeskdialogTransform ?? 'fade'));
        $template->set('closeIconUrl', $this->packages->getUrl('images/close.svg', 'alpdesk_dialog'));

        return $template->getResponse();

    }

}