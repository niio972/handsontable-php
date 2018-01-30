<?php

//******************************************************************************
//                              JavascriptFormatter.php
//
// Author(s): Arnaud Charleroy
// SILEX version 1.0
// Copyright © INRA - 2018
// Creation date: 26 Jan. 2018
// Contact: arnaud.charleroy@inra.fr, anne.tireau@inra.fr, pascal.neveu@inra.fr
// Last modification date:  29 Jan. 2018
// Subject: A class used to format or transform data in JSON
//******************************************************************************
/**
 * @link http://www.inra.fr/
 * @copyright Copyright © INRA - 2018
 * @license https://www.gnu.org/licenses/agpl-3.0.fr.html AGPL-3.0
 */

namespace openSILEX\handsontablePHP\tools;

/**
 * JavascriptFormatter class is used to format PHP object or prepare javascript text
 * @author Arnaud Charleroy <arnaud.charleroy@inra.fr>
 * @since 1.0
 */
class JavascriptFormatter {

    /**
     * This static method permits to clean any javascript text in order to be understood by a browser
     * @param string $javascriptText javascript text which will be cleaned 
     * @param boolean $utf8 if needed to be convert in UTF-8
     * @return string formatted javascript text
     */
    public static function prepareJavascriptText($javascriptText, $utf8 = false) {
        if($utf8){
            // characters need to be convert to UTF-8
            $javascriptText = iconv(
                    mb_detect_encoding($javascriptText), "UTF-8", $javascriptText
            );
        }
        // remove comments
        $jsWithoutComment = preg_replace('!/\*.*?\*/!s', '', $javascriptText);  // removes /* comments */
        $jsWithoutNewLine = preg_replace('!//.*?\n!', '', $jsWithoutComment); // removes //newline
        // remove all extra whitespace
        $jsWithoutExtraWhitespace = str_replace(array("\t", "\n", "\r\n"), '', trim($jsWithoutNewLine));

        $jsWithoutDoubleQuote = str_replace('"', '', $jsWithoutExtraWhitespace);

        return $jsWithoutDoubleQuote;
    }

    /**
     * Create a clean array from an mutliple or simple dimension array to convert it in a JS array
     * @param array $array array which needs to be cleaned
     * @return array cleaned array for a json conversion
     */
    static function preparePHPArrayToJSArray($array) {
        $newArray = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $newValue = static::preparePHPArrayToJSArray($value);
            } elseif (is_string($value)) {
                $newValue = '\'' . $value . '\'';
            } else {
                $newValue = $value;
            }
            $newArray[$key] = $newValue;
        }

        return $newArray;
    }

}