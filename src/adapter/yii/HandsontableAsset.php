<?php
namespace openSILEX\handsontablePHP\adapter\yii;

//******************************************************************************
//                              MermaidAsset.php
//
// Author(s): Arnaud Charleroy
// SILEX version 1.0
// Copyright © - INRA - 2018
// Creation date: 26 janv. 2018
// Contact: arnaud.charleroy@inra.fr, anne.tireau@inra.fr, pascal.neveu@inra.fr
// Last modification date:  31 janv. 2018
// Subject: A class which specify Handsontable asset path used
//******************************************************************************

/**
 * @link http://www.inra.fr/
 * @copyright Copyright © INRA - 2018
 * @license https://www.gnu.org/licenses/agpl-3.0.fr.html AGPL-3.0
 */

use yii\web\AssetBundle;

class MermaidAsset extends AssetBundle
{
    public $sourcePath = '@bower/handsontable/dist';
    public $js = [
        'handsontable.full.min.js',
        'moment/moment.js',
        'pikaday/pikaday.js',
    ];
    public $css = [
        'pikaday/pikaday.css',
        'handsontable.full.min.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}