<?php /** @noinspection PhpFullyQualifiedNameUsageInspection */
/**
 * 2003-2015 XL Soft
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    XL Soft <contact@xlsoft.fr>
 * @copyright 2015 XL Soft
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of XL Soft
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Module XLPOS pour Prestashop
 */
class ThalassaWeb25709 extends Module
{
    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->name = 'thalassaweb25709';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'thalassa-web';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => '1.7.99.99');
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Thalassa-web #25709');
        $this->description = $this->l('Simple module to test GitHub issue #25709');
        $this->confirmUninstall = $this->l('Are you sure to unistall?');
    }

    public function install()
    {
        if (parent::install()) {
            return $this->registerHook('actionObjectAddressAddAfter')
                && $this->registerHook('actionObjectCustomerAddressAddAfter');
        }
        return false;
    }

    public function uninstall()
    {
        if (parent::uninstall()) {
            return $this->unregisterHook('actionObjectAddressAddAfter')
                && $this->unregisterHook('actionObjectCustomerAddressAddAfter');
        }
    }

    /**
     * Pas de conf
     * @return array
     */
    protected function getModuleConfigurations()
    {
        return [];
    }

    public function getContent()
    {
        return "";
    }

    public function hookActionObjectAddressAddAfter()
    {
        error_log("hookActionObjectAddressAddAfter called" . PHP_EOL, 3, __DIR__ . '/test.txt');
    }

    public function hookActionObjectCustomerAddressAddAfter()
    {
        error_log("hookActionObjectCustomerAddressAddAfter called" . PHP_EOL, 3, __DIR__ . '/test.txt');
    }
}
