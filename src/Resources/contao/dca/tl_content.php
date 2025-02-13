<?php

declare(strict_types=1);


use Alpdesk\AlpdeskDialog\Controller\DialogContentController;

$GLOBALS['TL_DCA']['tl_content']['palettes'][DialogContentController::TYPE] = '
  {title_legend},name,type;
  alpdeskDialogText,alpdeskDialogUnfilteredHtml;
  {template_legend:hide},customTpl;
  {expert_legend:hide},cssID
';

$GLOBALS['TL_DCA']['tl_content']['fields']['alpdeskDialogUnfilteredHtml'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'textarea',
    'eval' => array('useRawRequestData' => true, 'class' => 'monospace', 'rte' => 'ace|html', 'helpwizard' => true),
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['alpdeskDialogText'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'textarea',
    'eval' => ['rte' => 'tinyMCE', 'helpwizard' => true],
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
];
