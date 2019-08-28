<?php

/**
* @copyright Copyright &copy; Gogodigital Srls
* @company Gogodigital Srls - Wide ICT Solutions
* @website http://www.gogodigital.it
* @github https://github.com/cinghie/yii2-cookie-consent
* @license GNU GENERAL PUBLIC LICENSE VERSION 3
* @package yii2-cookie-consent
* @version 1.5.0
*/

namespace cinghie\cookieconsent\assets;

use yii\helpers\ArrayHelper;
use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\base\InvalidConfigException;

class CookieAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@bower/cookieconsent/build/';

    /**
     * @inherit
     */
    public $js=[
        'cookieconsent.min.js',
    ];

    /**
     * @inherit
     */
    public $depends = [
        YiiAsset::class,
    ];

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        $lib = 'bootstrap' . self::parseVer(ArrayHelper::getValue(\Yii::$app->params, 'bsVersion', '3'));
        $this->depends[] = "yii\\{$lib}\\BootstrapAsset";
        //$this->depends[] = "yii\\{$lib}\\BootstrapPluginAsset";
        parent::init();
    }

    /**
     * Parses and returns the major BS version
     * @param string $ver
     * @return bool|string
     */
    protected static function parseVer($ver)
    {
        $ver = (string)$ver;
        return substr(trim($ver), 0, 1);
    }
}

