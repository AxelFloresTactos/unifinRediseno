<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

use Sugarcrm\Sugarcrm\Util\Files\FileLoader;

class FontManager
{
    /**
     * Contain all the errors generated during the process of FontManager
     * @var String[]
     */
    public $errors = [];
    /**
     * store the log string when addFont is call
     * @var String
     */
    public $log = '';
    /**
     * Current font filename
     * @var String
     */
    public $filename = '';
    /**
     * Current font file path
     * @var String
     */
    public $fontPath = '';
    /**
     * Multidimentional array which contain all the detail of all the available fonts
     * @var Array
     */
    public $fontList = [];
    /**
     * Name of the font of the current font file
     * @var String
     */
    public $font_name = '';
    /**
     * Encoding of the current font
     * @var String
     */
    public $font_enc = '';
    /**
     * Display name of the current font
     * @var String
     */
    public $font_displayname = '';
    /**
     * Type of the current font
     * @var String
     */
    public $font_type = '';

    public function __construct()
    {
        require_once 'include/Sugarpdf/sugarpdf_config.php';
    }

    private function setFontPath()
    {
        if (file_exists(K_PATH_CUSTOM_FONTS . $this->filename)) {
            $this->fontPath = K_PATH_CUSTOM_FONTS;
        } elseif (file_exists(K_PATH_FONTS . $this->filename)) {
            $this->fontPath = K_PATH_FONTS;
        } else {
            $this->fontPath = '';
            array_push($this->errors, 'Unable to find the font!');
        }
    }

    /**
     * This method return a boolean which describe if the font define
     * in filename is embedded or not.
     * @return boolean true if embedded.
     */
    private function getEmbedded()
    {
        if (empty($this->fontList[$this->getFilenameShort()]['type'])) {
            if (!$this->loadFontFile()) {
                array_push($this->errors, translate('ERR_LOADFONTFILE', 'Configurator'));
                return false;
            }
        }
        if ($this->font_type == 'cidfont0' || $this->font_type == 'core') {
            return false;
        }
        return true;
    }

    /**
     * This method return the style of the given font set in filename
     * Values can be regular, bold, italic.
     * @return array of styles on success
     * @return empty array on failure
     */
    private function getStyle()
    {
        if (empty($this->filename)) {
            array_push($this->errors, translate('ERR_FONT_EMPTYFILE', 'Configurator'));
            return [];
        }
        if (preg_match('/bi.php$/i', $this->filename)) {
            return ['bold', 'italic'];
        } elseif (preg_match('/ib.php$/i', $this->filename)) {
            return ['bold', 'italic'];
        } elseif (preg_match('/b.php$/i', $this->filename)) {
            return ['bold'];
        } elseif (preg_match('/i.php$/i', $this->filename)) {
            return ['italic'];
        } else {
            return ['regular'];
        }
    }

    /**
     * This method calculate the font size of $this->filename in KB
     * .php file + .z file + .ctg.z file
     * @return Integer font Size in KB
     */
    private function getFontSize()
    {
        $fileSize = filesize($this->fontPath . $this->filename);
        $name = substr($this->filename, 0, strrpos($this->filename, '.'));
        if (file_exists($this->fontPath . $name . '.z')) {
            $fileSize += filesize($this->fontPath . $name . '.z');
        }
        if (file_exists($this->fontPath . $name . '.ctg.z')) {
            $fileSize += filesize($this->fontPath . $name . '.ctg.z');
        }
        return round($fileSize / 1024);
    }

    /**
     * Fill the fontList attribute with the data contains in the font file.
     */
    public function getDetail()
    {
        if ($this->loadFontFile()) {
            $this->fontList[$this->getFilenameShort()]['filename'] = $this->filename;
            $this->fontList[$this->getFilenameShort()]['fontpath'] = $this->fontPath;
            if (!empty($this->font_name)) {
                $this->fontList[$this->getFilenameShort()]['name'] = $this->font_name;
            } else {
                $this->fontList[$this->getFilenameShort()]['name'] = $this->getFilenameShort();
            }
            if (!empty($this->font_displayname)) {
                $this->fontList[$this->getFilenameShort()]['displayname'] = $this->font_displayname;
            }
            if (!empty($this->font_enc)) {
                $this->fontList[$this->getFilenameShort()]['enc'] = $this->font_enc;
            }
            if (!empty($this->font_type)) {
                if ($this->font_type == 'cidfont0' || $this->font_type == 'core' || $this->font_type == 'TrueType' || $this->font_type == 'Type1' || $this->font_type == 'TrueTypeUnicode') {
                    $this->fontList[$this->getFilenameShort()]['type'] = $this->font_type;
                } else {
                    array_push($this->errors, translate('ERR_FONT_UNKNOW_TYPE', 'Configurator') . ' ' . $this->font_type);
                }
            }
            $this->fontList[$this->getFilenameShort()]['style'] = $this->getStyle();
            $this->fontList[$this->getFilenameShort()]['filesize'] = $this->getFontSize();
            $this->fontList[$this->getFilenameShort()]['embedded'] = $this->getEmbedded();
            return true;
        }
        return false;
    }

    /**
     * This method load the font file and check if it is good formatted.
     * @return boolean true on success
     */
    private function loadFontFile()
    {
        if (empty($this->filename)) {
            return false;
        }
        $this->setFontPath();
        if (!file_exists($this->fontPath . $this->filename)) {
            return false;
        }
        include FileLoader::validateFilePath($this->fontPath . $this->filename);
        if ((!isset($type)) or (!isset($cw))) {
            //The font definition file has a bad format
            return false;
        }

        $this->font_name = '';
        $this->font_enc = '';
        $this->font_displayname = '';
        $this->font_type = '';

        if (!empty($name)) {
            $this->font_name = $name;
        }
        if (!empty($enc)) {
            $this->font_enc = $enc;
        }
        if (!empty($displayname)) {
            $this->font_displayname = $displayname;
        }
        if (!empty($type)) {
            $this->font_type = $type;
        }
        return true;
    }

    /**
     * This method parse the font path defined in the sugarpdf config file
     * and fill the fontList
     * @return boolean true if font files have been found
     */
    private function parseFolder()
    {
        $result = [];
        if (!file_exists(K_PATH_FONTS) || !is_dir(K_PATH_FONTS)) {
            array_push($this->errors, translate('ERR_NO_FONT_PATH', 'Configurator'));
            return false;
        }
        $result[0] = scandir(K_PATH_FONTS);
        if (file_exists(K_PATH_CUSTOM_FONTS) && is_dir(K_PATH_CUSTOM_FONTS)) {
            $result[1] = scandir(K_PATH_CUSTOM_FONTS);
        }
        foreach ($result as $v) {
            foreach ($v as $vv) {
                if (preg_match('/.php$/i', $vv)) {
                    $this->filename = $vv;
                    $this->getDetail();
                }
            }
        }
        ksort($this->fontList);
        if (safeCount($this->fontList) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This method fill the fontList with all the fonts available
     */
    public function listFontFiles()
    {
        $cachedFontList = null;
        $this->fontList = [];
        if (file_exists($cachedfile = sugar_cached('Sugarpdf/cachedFontList.php'))) {
            include $cachedfile;
            $this->fontList = $cachedFontList;
            return true;
        } else {
            if ($this->parseFolder()) {
                $cacheDir = create_cache_directory('Sugarpdf/');
                write_array_to_file('cachedFontList', $this->fontList, $cacheDir . 'cachedFontList.php');
                return true;
            }
        }
        return false;
    }

    /**
     * This method generate an array of font which can be use with get_select_options_with_id
     * @return Array
     */
    public function getSelectFontList()
    {
        $returnArray = [];
        if ($this->listFontFiles()) {
            foreach ($this->fontList as $k => $v) {
                if (!empty($v['displayname'])) {
                    $returnArray[$k] = $v['displayname'];
                } else {
                    $returnArray[$k] = $v['name'];
                }
            }
        }
        return $returnArray;
    }

    /**
     * This method return the filename without the ".php"
     * @return String The short filename
     */
    private function getFilenameShort()
    {
        return preg_replace('/.php$/i', '', $this->filename);
    }

    /**
     * This method add a font to SugarCRM from a font file and a metric file using MakeFont()
     * @param $font_file string
     * @param $metric_file string
     * @param $embedded boolean
     * @param $encoding_table string
     * @param $patch array
     * @param $cid_info string
     * @param $style string
     * @return boolean true on success
     * @see MakeFont() in K_PATH_FONTS/utils
     */
    public function addFont($font_file, $metric_file, $embedded = true, $encoding_table = 'cp1252', $patch = [], $cid_info = '', $style = 'regular')
    {
        global $current_user;
        if (!is_admin($current_user)) {
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']);
        }
        $error = false;

        $oldStr = ob_get_contents();
        ob_clean();
        require_once 'vendor/tcpdf/fonts/utils/makefont.php';
        $filename = MakeFont($font_file, $metric_file, $embedded, $encoding_table, $patch, $cid_info);

        unlink($font_file);
        unlink($metric_file);

        $this->log = ob_get_contents();
        ob_clean();

        echo $oldStr;

        if (empty($filename)) {
            array_push($this->errors, translate('ERR_FONT_MAKEFONT', 'Configurator'));
            $error = true;
        } else {
            require_once 'include/utils/file_utils.php';
            $this->filename = basename($filename . '.php');
            if (!$this->loadFontFile()) {
                if (!mkdir_recursive(K_PATH_CUSTOM_FONTS)) {
                    array_push($this->errors, 'Error : Impossible to create the custom font directory.');
                    $error = true;
                } else {
                    $styleLetter = '';
                    switch ($style) {
                        case 'italic':
                            $styleLetter = 'i';
                            break;
                        case 'bold':
                            $styleLetter = 'b';
                            break;
                        case 'boldItalic':
                            $styleLetter = 'bi';
                            break;
                        default:
                            $styleLetter = '';
                    }
                    sugar_rename($filename . '.php', K_PATH_CUSTOM_FONTS . basename($filename . $styleLetter . '.php'));
                    $this->log .= "\n" . translate('LBL_FONT_MOVE_DEFFILE', 'Configurator') . K_PATH_CUSTOM_FONTS . basename($filename . $styleLetter . '.php');
                    if (file_exists($filename . '.z')) {
                        sugar_rename($filename . '.z', K_PATH_CUSTOM_FONTS . basename($filename . $styleLetter . '.z'));
                        $this->log .= "\n" . translate('LBL_FONT_MOVE_FILE', 'Configurator') . K_PATH_CUSTOM_FONTS . basename($filename . $styleLetter . '.z');
                    }
                    if (file_exists($filename . '.ctg.z')) {
                        sugar_rename($filename . '.ctg.z', K_PATH_CUSTOM_FONTS . basename($filename . $styleLetter . '.ctg.z'));
                        $this->log .= "\n" . translate('LBL_FONT_MOVE_FILE', 'Configurator') . K_PATH_CUSTOM_FONTS . basename($filename . $styleLetter . '.ctg.z');
                    }
                }
            } else {
                array_push($this->errors, "\n" . translate('ERR_FONT_ALREADY_EXIST', 'Configurator'));
                $error = true;
            }
            if ($error) {
                if (file_exists($filename . '.php')) {
                    unlink($filename . '.php');
                }
                if (file_exists($filename . '.ctg.z')) {
                    unlink($filename . '.ctg.z');
                }
                if (file_exists($filename . '.z')) {
                    unlink($filename . '.z');
                }
            }
        }
        $this->clearCachedFile();
        return $error;
    }

    /**
     * This method  delete the cached file cachedFontList.php
     * @return boolean
     */
    public function clearCachedFile()
    {
        global $current_user;
        if (!$current_user->isDeveloperForAnyModule()) {
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']);
        }
        if (file_exists($cachedfile = sugar_cached('Sugarpdf/cachedFontList.php'))) {
            return unlink($cachedfile);
        }
        return true;
    }

    /**
     * Check if the given font filename exist in the font directories
     * @return boolean
     */
    public function fontFileExist($filename)
    {
        $this->filename = $filename;
        return $this->loadFontFile();
    }
}
