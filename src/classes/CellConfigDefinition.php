<?php

//******************************************************************************
//                              CellConfigDefinition.php
//
// Author(s): Arnaud Charleroy
// SILEX version 1.0
// Copyright © - INRA - 2018
// Creation date: 26 janv. 2018
// Contact: arnaud.charleroy@inra.fr, anne.tireau@inra.fr, pascal.neveu@inra.fr
// Last modification date:  26 janv. 2018
// Subject: A class which represents a cell configuration
//******************************************************************************

/**
 * @link http://www.inra.fr/
 * @copyright Copyright © INRA - 2018
 * @license https://www.gnu.org/licenses/agpl-3.0.fr.html AGPL-3.0
 */

namespace openSILEX\handsontablePHP\classes;

/**
 * Represents a cell configuration unit
 * @author Arnaud Charleroy <arnaud.charleroy@inra.fr>
 * @since 1.0
 * @link https://docs.handsontable.com/latest/Options.html#cells
 */
class CellConfigDefinition implements \JsonSerializable {

    /**
     *
     * @var int row number
     */
    protected $row;

    /**
     *
     * @var int column number
     */
    protected $column;

    /**
     *
     * @var bool if the cell can be modified or not
     */
    protected $readOnly = false;

    public function __construct($row, $col, $readOnly) {
        $this->row = $row;
        $this->column = $col;
        $this->readOnly = $readOnly;
    }

    /**
     * If this cell is correctly defined
     * @return bool
     */
    public function isValid() {
        return (!is_null($this->row) && !is_null($this->column));
    }

    /**
     * @example  {row: 0, col: 0, readOnly: true}
     */

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * Inherited from \JsonSerializable::jsonSerialize() method
     * @example  {
     *      row: 0,
     *      col: 0,
     *      readOnly: true
     *      }
     * @return mixed data which can be serialized by <b>json_encode</b>
     */
    public function jsonSerialize() {
        return [
            'row' => $this->row,
            'col' => $this->column,
            'readOnly' => $this->readOnly
        ];
    }
}
