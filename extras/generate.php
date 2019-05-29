<?php

/**
 * Created by PhpStorm.
 * User: marcosamano
 * Date: 27/02/19
 * Time: 11:29 AM
 */

use Ast\MwbExporterExtra\Exporter;

require(__DIR__.'/../vendor/autoload.php');


Exporter::symfony3(__DIR__.'/../vendor/antoniosam/example-mwb/src/site.mwb',__DIR__.'/../Entity','Ast\\WebBundle');
