<?php
$EM_CONF[$_EXTKEY] = array (
  'title' => 'TYPO3 Console',
  'description' => 'A reliable and powerful command line interface for TYPO3 CMS',
  'category' => 'cli',
  'shy' => 1,
  'dependencies' => '',
  'conflicts' => '',
  'priority' => '',
  'loadOrder' => '',
  'module' => 'mod',
  'state' => 'stable',
  'internal' => 0,
  'uploadfolder' => 0,
  'createDirs' => '',
  'modify_tables' => '',
  'clearCacheOnLoad' => 0,
  'lockType' => '',
  'author' => 'Helmut Hummel',
  'author_email' => 'info@helhum.io',
  'author_company' => '',
  'CGLcompliance' => '',
  'CGLcompliance_note' => '',
  'version' => '2.0.0',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.6.0-8.1.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  'suggests' => 
  array (
  ),
  'autoload' => 
  array (
    'psr-4' => 
    array (
      'Helhum\\Typo3Console\\' => 'Classes',
    ),
  ),
  'autoload-dev' => 
  array (
    'psr-4' => 
    array (
      'Helhum\\Typo3Console\\Tests\\' => 'Tests',
    ),
  ),
);
