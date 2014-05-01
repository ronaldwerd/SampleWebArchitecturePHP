<?php

function smarty_modifier_checked($boolean)
{
    if($boolean == true || $boolean == 1) return 'checked="checked"';
    return "";
}
