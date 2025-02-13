<?php

declare(strict_types=1);

use Alpdesk\AlpdeskDialog\Controller\DialogModuleController;

$GLOBALS['TL_DCA']['tl_module']['palettes'][DialogModuleController::TYPE] = '
  {title_legend},name,headline,type;
  {html_legend},unfilteredHtml;
  {template_legend:hide},customTpl;
  {expert_legend:hide},cssID
';
