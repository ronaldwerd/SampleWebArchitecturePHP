<?

function smarty_modifier_paragraph($text)
{
    $text = str_replace("\r\n","\n",$text);

    $paragraphs = preg_split("/[\n]{2,}/",$text);
    foreach ($paragraphs as $key => $p) {
        $paragraphs[$key] = "<p>".str_replace("\n","<br />",$paragraphs[$key])."</p>";
    }

    $text = implode("", $paragraphs);

    return $text;
}
