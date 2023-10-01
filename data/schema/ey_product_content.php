<?php 
return array (
  'id' => 
  array (
    'name' => 'id',
    'type' => 'int(10)',
    'notnull' => false,
    'default' => NULL,
    'primary' => true,
    'autoinc' => true,
  ),
  'aid' => 
  array (
    'name' => 'aid',
    'type' => 'int(10)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'content' => 
  array (
    'name' => 'content',
    'type' => 'longtext',
    'notnull' => false,
    'default' => NULL,
    'primary' => false,
    'autoinc' => false,
  ),
  'content_ey_m' => 
  array (
    'name' => 'content_ey_m',
    'type' => 'longtext',
    'notnull' => false,
    'default' => NULL,
    'primary' => false,
    'autoinc' => false,
  ),
  'add_time' => 
  array (
    'name' => 'add_time',
    'type' => 'int(11)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'update_time' => 
  array (
    'name' => 'update_time',
    'type' => 'int(11)',
    'notnull' => false,
    'default' => '0',
    'primary' => false,
    'autoinc' => false,
  ),
  'jiawei' => 
  array (
    'name' => 'jiawei',
    'type' => 'enum(\'0-1000\',\'1000-1699\',\'1700-2799\',\'2800-3500\',\'3500-10000\')',
    'notnull' => false,
    'default' => '0-1000',
    'primary' => false,
    'autoinc' => false,
  ),
  'yanse' => 
  array (
    'name' => 'yanse',
    'type' => 'enum(\'silvery\',\'green\',\'black\',\'grey\')',
    'notnull' => false,
    'default' => 'silvery',
    'primary' => false,
    'autoinc' => false,
  ),
  'jingdongjiage' => 
  array (
    'name' => 'jingdongjiage',
    'type' => 'decimal(10,2)',
    'notnull' => false,
    'default' => '0.00',
    'primary' => false,
    'autoinc' => false,
  ),
  'tianmao_price' => 
  array (
    'name' => 'tianmao_price',
    'type' => 'decimal(10,2)',
    'notnull' => false,
    'default' => '0.00',
    'primary' => false,
    'autoinc' => false,
  ),
  'pdd_price' => 
  array (
    'name' => 'pdd_price',
    'type' => 'decimal(10,2)',
    'notnull' => false,
    'default' => '0.00',
    'primary' => false,
    'autoinc' => false,
  ),
  'ymx_price' => 
  array (
    'name' => 'ymx_price',
    'type' => 'decimal(10,2)',
    'notnull' => false,
    'default' => '0.00',
    'primary' => false,
    'autoinc' => false,
  ),
  'ebay_price' => 
  array (
    'name' => 'ebay_price',
    'type' => 'decimal(10,2)',
    'notnull' => false,
    'default' => '0.00',
    'primary' => false,
    'autoinc' => false,
  ),
);