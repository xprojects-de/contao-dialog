<?php

declare(strict_types=1);


use Alpdesk\AlpdeskDialog\Controller\DialogContentController;

$GLOBALS['TL_DCA']['tl_content']['palettes'][DialogContentController::TYPE] = '
  {title_legend},name,type;
  alpdeskDialogText,alpdeskDialogUnfilteredHtml;
  alpdeskDialogOpenDelay,alpdeskDialogScrollDelay,alpdeskDialogOpenButtonLabel;
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

$GLOBALS['TL_DCA']['tl_content']['fields']['alpdeskDialogOpenDelay'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
    'sql' => "int(10) unsigned NOT NULL default 0"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['alpdeskDialogScrollDelay'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'select',
    'options' => array(0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100),
    'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
    'sql' => "int(10) unsigned NOT NULL default 0"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['alpdeskDialogOpenButtonLabel'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
    'sql' => "varchar(255) COLLATE ascii_bin NOT NULL default ''"
];
