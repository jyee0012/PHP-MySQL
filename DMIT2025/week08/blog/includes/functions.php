<?php
// Emoticon Functions

function emoticonPlacer($input, $src){
  echo "<a style=\"margin-right: 0.5rem;\" href=\"javascript:emoticon('$input')\"><img src=\"../emoticons/$src\"></a>";
}
function replaceEmoticons($txt, $input, $src) {
  $thisEmoticon = "<img src=\"emoticons/$src\">";
  $txt = str_replace("$input", $thisEmoticon, $txt);
  return $txt;
}
function addEmoticons($txt){
  $txt = replaceEmoticons($txt,":smile:","icon_smile.gif");
  $txt = replaceEmoticons($txt,":grin:","icon_biggrin.gif");
  $txt = replaceEmoticons($txt,":left-arrow:","icon_arrow.gif");
  $txt = replaceEmoticons($txt,":confused:","icon_confused.gif");
  $txt = replaceEmoticons($txt,":cool:","icon_cool.gif");
  $txt = replaceEmoticons($txt,":cry:","icon_cry.gif");
  $txt = replaceEmoticons($txt,":eek:","icon_eek.gif");
  $txt = replaceEmoticons($txt,":evil:","icon_evil.gif");
  $txt = replaceEmoticons($txt,":exclaim:","icon_exclaim.gif");
  $txt = replaceEmoticons($txt,":idea:","icon_idea.gif");
  $txt = replaceEmoticons($txt,":lol:","icon_lol.gif");
  $txt = replaceEmoticons($txt,":mad:","icon_mad.gif");
  $txt = replaceEmoticons($txt,":question:","icon_question.gif");
  $txt = replaceEmoticons($txt,":razz:","icon_razz.gif");
  $txt = replaceEmoticons($txt,":blush:","icon_redface.gif");
  $txt = replaceEmoticons($txt,":rolleyes:","icon_rolleyes.gif");
  $txt = replaceEmoticons($txt,":sad:","icon_sad.gif");
  $txt = replaceEmoticons($txt,":surprise:","icon_surprised.gif");
  $txt = replaceEmoticons($txt,":twisted:","icon_twisted.gif");
  $txt = replaceEmoticons($txt,":wink:","icon_wink.gif");
  
  $txt = replaceEmoticons($txt,":rooBaka:","rooBaka.gif");
  $txt = replaceEmoticons($txt,":rooBlank:","rooBlank.gif");
  $txt = replaceEmoticons($txt,":rooBlind:","rooBlind.gif");
  $txt = replaceEmoticons($txt,":rooBlush:","rooBlush.gif");
  $txt = replaceEmoticons($txt,":rooBonk:","rooBonk.gif");
  $txt = replaceEmoticons($txt,":rooBooli:","rooBooli.gif");
  $txt = replaceEmoticons($txt,":rooCop:","rooCop.gif");
  $txt = replaceEmoticons($txt,":rooDab:","rooDab.gif");
  $txt = replaceEmoticons($txt,":rooDerp:","rooDerp.gif");
  $txt = replaceEmoticons($txt,":rooDuck:","rooDuck.gif");
  $txt = replaceEmoticons($txt,":rooGift:","rooGift.gif");
  $txt = replaceEmoticons($txt,":rooHype:","rooHype.gif");
  $txt = replaceEmoticons($txt,":rooLove:","rooLove.gif");
  $txt = replaceEmoticons($txt,":rooLurk:","rooLurk.gif");
  $txt = replaceEmoticons($txt,":rooNap:","rooNap.gif");
  $txt = replaceEmoticons($txt,":rooPog:","rooPog.gif");
  $txt = replaceEmoticons($txt,":rooSip:","rooSip.gif");
  $txt = replaceEmoticons($txt,":rooThink:","rooThink.gif");
  $txt = replaceEmoticons($txt,":rooVV:","rooVV.gif");
  $txt = replaceEmoticons($txt,":rooWhat:","rooWhat.gif");
  $txt = replaceEmoticons($txt,":rooWut:","rooWut.gif");
  $txt = replaceEmoticons($txt,":rooYAHAHA:","rooYAHAHA.gif");
  return $txt;
}
function massEmoticonPlacer(){
    emoticonPlacer(":smile:","icon_smile.gif");
    emoticonPlacer(":grin:","icon_biggrin.gif");
    emoticonPlacer(":left-arrow:","icon_arrow.gif");
    emoticonPlacer(":confused:","icon_confused.gif");
    emoticonPlacer(":cool:","icon_cool.gif");
    emoticonPlacer(":cry:","icon_cry.gif");
    emoticonPlacer(":eek:","icon_eek.gif");
    emoticonPlacer(":evil:","icon_evil.gif");
    emoticonPlacer(":exclaim:","icon_exclaim.gif");
    emoticonPlacer(":idea:","icon_idea.gif");
    emoticonPlacer(":lol:","icon_lol.gif");
    emoticonPlacer(":mad:","icon_mad.gif");
    emoticonPlacer(":question:","icon_question.gif");
    emoticonPlacer(":razz:","icon_razz.gif");
    emoticonPlacer(":blush:","icon_redface.gif");
    emoticonPlacer(":rolleyes:","icon_rolleyes.gif");
    emoticonPlacer(":sad:","icon_sad.gif");
    emoticonPlacer(":surprise:","icon_surprised.gif");
    emoticonPlacer(":twisted:","icon_twisted.gif");
    emoticonPlacer(":wink:","icon_wink.gif");
    
    emoticonPlacer(":rooBaka:","rooBaka.gif");
    emoticonPlacer(":rooBlank:","rooBlank.gif");
    emoticonPlacer(":rooBlind:","rooBlind.gif");
    emoticonPlacer(":rooBlush:","rooBlush.gif");
    emoticonPlacer(":rooBonk:","rooBonk.gif");
    emoticonPlacer(":rooBooli:","rooBooli.gif");
    emoticonPlacer(":rooCop:","rooCop.gif");
    emoticonPlacer(":rooDab:","rooDab.gif");
    emoticonPlacer(":rooDerp:","rooDerp.gif");
    emoticonPlacer(":rooDuck:","rooDuck.gif");
    emoticonPlacer(":rooGift:","rooGift.gif");
    emoticonPlacer(":rooHype:","rooHype.gif");
    emoticonPlacer(":rooLove:","rooLove.gif");
    emoticonPlacer(":rooLurk:","rooLurk.gif");
    emoticonPlacer(":rooNap:","rooNap.gif");
    emoticonPlacer(":rooPog:","rooPog.gif");
    emoticonPlacer(":rooSip:","rooSip.gif");
    emoticonPlacer(":rooThink:","rooThink.gif");
    emoticonPlacer(":rooVV:","rooVV.gif");
    emoticonPlacer(":rooWhat:","rooWhat.gif");
    emoticonPlacer(":rooWut:","rooWut.gif");
    emoticonPlacer(":rooYAHAHA:","rooYAHAHA.gif");

}
function makeClickableLinks($text){
$text = " " . $text; // fixes problem of not linking if no chars before the link

  $text = preg_replace('/(((f|ht){1}tps?:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
              '<a href="\\1">\\1</a>', $text);
  $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
              '\\1<a href="http://\\2">\\2</a>', $text);
  $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
              '<a href="mailto:\\1">\\1</a>', $text);
  return trim($text);
} // end makeClickableLinks
function makePageTitle($conditionTxt = "", $replaceTxt = ""){
    $thisFile = basename($_SERVER['PHP_SELF']);
    $fileTitle = str_replace(".php","",$thisFile);
    if ($conditionTxt != "" && $replaceTxt != ""){
        if ($fileTitle == $conditionTxt){
            $fileTitle = $replaceTxt;
        }
    }
    $title = ucwords($fileTitle);
    return $title;
}
// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field=0) { 
  $res->data_seek($row); 
  $datarow = $res->fetch_array(); 
  return $datarow[$field]; 
} //////////////
?>