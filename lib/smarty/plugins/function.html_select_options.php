<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {html_select} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_options<br>
 * Date:     Feb 16, 2014<br>
 * Purpose:  format HTML tags for the image<br>
 * Examples: {html_select_options list=$country_array selected=$selected_country}<br>
 * Output:   <option value='AL'>Albania</option><option value='DZ'>Algeria</option><option value='AS'>American Samoa</option>...
 * Params:
 * <pre>
 * - $list        - (required) - list (array list which is a key value pair)
 * - $selected    - (optional) - selected (the key to have selected in the <option></option> list)
 * </pre>
 *
 * @link http://www.smarty.net/manual/en/language.function.html.image.php {html_image}
 *      (Smarty online manual)
 * @author  Ronald Partridge <rond at ronald-douglas dot com>
 * @version 0.5
 * @param array $params parameters
 * @param Smarty_Internal_Template $template template object
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_html_select_options($params)
{
    foreach ($params as $_key => $_val) {
        switch ($_key) {
            case 'list':
                if (!is_array($_val)) {
                    throw new SmartyException ("html_select: attribute '$_key' must be an array", E_USER_NOTICE);
                }
                break;
            case 'selected':
                if($_val != null) {
                    if (!is_string($_val)) {
                        throw new SmartyException ("html_select: attribute '$_key' must be a string", E_USER_NOTICE);
                    }
                }
                break;
        }
    }

    $optionStr = "";

    foreach($params['list'] as $k => $v) {

        if($k == $params['selected']) {
            $optionStr .= "<option value='".$k."' selected='selected'>".$v."</option>\n";
        } else {
            $optionStr .= "<option value='".$k."'>".$v."</option>\n";
        }
    }

    return $optionStr;
}
