<?php

function smarty_modifier_date_humanize($dateString)
{
    $offset = time() - strtotime($dateString);

    if($offset != null) {
        $deltaS = $offset % 60;
        $offset /= 60;
        $deltaM = $offset % 60;
        $offset /= 60;
        $deltaH = $offset % 24;
        $offset /= 24;
        $deltaD = ($offset > 1)?ceil($offset):$offset;
    }

    if($deltaD > 1) {

        if($deltaD > 365) {
            $years = ceil($deltaD/365);
            if($years ==1) {
                return "last year";
            } else{
                return $years." years ago";
            }
        }

        if($deltaD > 6) {
            return date('d-M',strtotime("$deltaD days ago"));
        }

        return "$deltaD days ago";
    }

    if($deltaD == 1) {
        return "yesterday";
    }

    if($deltaH == 1) {
        return "last hour";
    }

    if($deltaM == 1) {
        return "last minute";
    }

    if($deltaH > 0) {
        return $deltaH." hours ago";
    }

    if($deltaM > 0) {
        return $deltaM." minutes ago";
    }

    if($deltaS > 0) {
        return $deltaS." seconds ago";
    } else{
        return "few seconds ago";
    }
}
