<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Code to be executed after the plugin's database scheme has been installed is defined here.
 *
 * @package     qbank_questiongen
 * @category    upgrade
 * @copyright   2023 Ruthy Salomon <ruthy.salomon@gmail.com> , Yedidia Klein <yedidia@openapp.co.il>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Deploys some initial example presets.
 */
function xmldb_qbank_questiongen_install() {
    global $CFG, $DB;
    $initialpresets = file_get_contents($CFG->dirroot . '/question/bank/questiongen/db/initial_presets.json');
    $presets = json_decode($initialpresets, true);
    foreach ($presets as $preset) {
        $DB->insert_record('qbank_questiongen_preset', $preset);
    }
    return true;
}
