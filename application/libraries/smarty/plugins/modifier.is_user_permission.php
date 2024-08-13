<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_is_user_permission($permission)
{
    # return true;

    $ci = ci();

    if (!$ci->user_permissions) return false;

    if (is_string($permission)) $permission = explode('.', $permission);

    return !!$ci->user_permissions->whereIn('permission', $permission)->first();
}