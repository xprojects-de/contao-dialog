<?php

declare(strict_types=1);

use Alpdesk\AlpdeskDialog\Controller\DialogModuleController;

$GLOBALS['TL_DCA']['tl_module']['palettes'][DialogModuleController::TYPE] = '
  {title_legend},name,type;
  alpdeskDialogText,alpdeskDialogUnfilteredHtml;
  alpdeskDialogOpenDelay,alpdeskDialogScrollDelay,alpdeskDialogStorageExpires,alpdeskDialogOpenButtonLabel;
  alpdeskDialogPosition,alpdeskdialogTransform,alpdeskDialogDisableModal;
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

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogOpenDelay'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
    'sql' => "int(10) unsigned NOT NULL default 0"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogScrollDelay'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'select',
    'options' => array(0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100),
    'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
    'sql' => "int(10) unsigned NOT NULL default 0"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogStorageExpires'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
    'sql' => "int(10) unsigned NOT NULL default 0"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogOpenButtonLabel'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'text',
    'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
    'sql' => "varchar(250) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogDisableModal'] = array
(
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'w50 m12'),
    'sql' => array('type' => 'boolean', 'default' => false)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskDialogPosition'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'select',
    'options' => array('center', 'top-center', 'top-left', 'top-right', 'bottom-center', 'bottom-left', 'bottom-right'),
    'eval' => array('mandatory' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(32) NOT NULL default 'center'"
];

$GLOBALS['TL_DCA']['tl_module']['fields']['alpdeskdialogTransform'] = [
    'exclude' => true,
    'search' => false,
    'inputType' => 'select',
    'options' => array('fade', 'left', 'right', 'top', 'bottom'),
    'eval' => array('mandatory' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(32) NOT NULL default ''"
];
