<?php

declare(strict_types=1);

use Alpdesk\AlpdeskDialog\Controller\DialogModuleController;

$GLOBALS['TL_DCA']['tl_module']['palettes'][DialogModuleController::TYPE] = '
  {title_legend},name,headline,type;
  alpdeskDialogText,alpdeskDialogUnfilteredHtml;
  {template_legend:hide},customTpl;
  {expert_legend:hide},cssID
';

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogUnfilteredHtml'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'textarea',
    'eval' => array('useRawRequestData' => true, 'class' => 'monospace', 'rte' => 'ace|html', 'helpwizard' => true),
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogText'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'textarea',
    'eval' => ['rte' => 'tinyMCE', 'helpwizard' => true],
    'explanation' => 'insertTags',
    'sql' => "mediumtext NULL"
];
