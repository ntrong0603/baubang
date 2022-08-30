<?php

use App\Model\SettingModel;

if (!function_exists('getSetting')) {
    function getSetting($code)
    {
        $value = (new SettingModel())->where("code_setting", $code)->first();
        if (!empty($value)) {
            return $value->value;
        }
        return null;
    }
}

if (!function_exists('saveSetting')) {
    function saveSetting($where, $data)
    {
        $value = (new SettingModel())->createdOrUpdate($where, $data);
        return $value;
    }
}
