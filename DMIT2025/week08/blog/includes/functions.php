<?php
// Emoticon Functions

function emoticonPlacer($input, $src){
  echo "<a style=\"margin-right: 0.5rem;\" href=\"javascript:emoticon('$input')\"><img class=\"emoticon\" src=\"../emoticons/$src\"></a>";
}
function replaceEmoticons($txt, $input, $src) {
  $thisEmoticon = "<img class=\"emoticon\" src=\"emoticons/$src\">";
  $txt = str_replace("$input", $thisEmoticon, $txt);
  return $txt;
}
function addEmoticons($txt){
  $txt = replaceEmoticons($txt,":smile:","regularEmotes/icon_smile.gif");
  $txt = replaceEmoticons($txt,":grin:","regularEmotes/icon_biggrin.gif");
  $txt = replaceEmoticons($txt,":left-arrow:","regularEmotes/icon_arrow.gif");
  $txt = replaceEmoticons($txt,":confused:","regularEmotes/icon_confused.gif");
  $txt = replaceEmoticons($txt,":cool:","regularEmotes/icon_cool.gif");
  $txt = replaceEmoticons($txt,":cry:","regularEmotes/icon_cry.gif");
  $txt = replaceEmoticons($txt,":eek:","regularEmotes/icon_eek.gif");
  $txt = replaceEmoticons($txt,":evil:","regularEmotes/icon_evil.gif");
  $txt = replaceEmoticons($txt,":exclaim:","regularEmotes/icon_exclaim.gif");
  $txt = replaceEmoticons($txt,":idea:","regularEmotes/icon_idea.gif");
  $txt = replaceEmoticons($txt,":lol:","regularEmotes/icon_lol.gif");
  $txt = replaceEmoticons($txt,":mad:","regularEmotes/icon_mad.gif");
  $txt = replaceEmoticons($txt,":question:","regularEmotes/icon_question.gif");
  $txt = replaceEmoticons($txt,":razz:","regularEmotes/icon_razz.gif");
  $txt = replaceEmoticons($txt,":blush:","regularEmotes/icon_redface.gif");
  $txt = replaceEmoticons($txt,":rolleyes:","regularEmotes/icon_rolleyes.gif");
  $txt = replaceEmoticons($txt,":sad:","regularEmotes/icon_sad.gif");
  $txt = replaceEmoticons($txt,":surprise:","regularEmotes/icon_surprised.gif");
  $txt = replaceEmoticons($txt,":twisted:","regularEmotes/icon_twisted.gif");
  $txt = replaceEmoticons($txt,":wink:","regularEmotes/icon_wink.gif");
  
  $txt = replaceEmoticons($txt,":rooBaka:","rooEmotes/rooBaka.gif");
  $txt = replaceEmoticons($txt,":rooBlank:","rooEmotes/rooBlank.gif");
  $txt = replaceEmoticons($txt,":rooBlind:","rooEmotes/rooBlind.gif");
  $txt = replaceEmoticons($txt,":rooBlush:","rooEmotes/rooBlush.gif");
  $txt = replaceEmoticons($txt,":rooBonk:","rooEmotes/rooBonk.gif");
  $txt = replaceEmoticons($txt,":rooBooli:","rooEmotes/rooBooli.gif");
  $txt = replaceEmoticons($txt,":rooCop:","rooEmotes/rooCop.gif");
  $txt = replaceEmoticons($txt,":rooDab:","rooEmotes/rooDab.gif");
  $txt = replaceEmoticons($txt,":rooDerp:","rooEmotes/rooDerp.gif");
  $txt = replaceEmoticons($txt,":rooDuck:","rooEmotes/rooDuck.gif");
  $txt = replaceEmoticons($txt,":rooGift:","rooEmotes/rooGift.gif");
  $txt = replaceEmoticons($txt,":rooHype:","rooEmotes/rooHype.gif");
  $txt = replaceEmoticons($txt,":rooLove:","rooEmotes/rooLove.gif");
  $txt = replaceEmoticons($txt,":rooLurk:","rooEmotes/rooLurk.gif");
  $txt = replaceEmoticons($txt,":rooNap:","rooEmotes/rooNap.gif");
  $txt = replaceEmoticons($txt,":rooPog:","rooEmotes/rooPog.gif");
  $txt = replaceEmoticons($txt,":rooSip:","rooEmotes/rooSip.gif");
  $txt = replaceEmoticons($txt,":rooThink:","rooEmotes/rooThink.gif");
  $txt = replaceEmoticons($txt,":rooVV:","rooEmotes/rooVV.gif");
  $txt = replaceEmoticons($txt,":rooWhat:","rooEmotes/rooWhat.gif");
  $txt = replaceEmoticons($txt,":rooWut:","rooEmotes/rooWut.gif");
  $txt = replaceEmoticons($txt,":rooYAHAHA:","rooEmotes/rooYAHAHA.gif");
  
  $txt = replaceEmoticons($txt,":aJaePeek:","discordEmotes/aJaePeek.gif");
  $txt = replaceEmoticons($txt,":challenge_accepted:","discordEmotes/challenge_accepted.gif");
  $txt = replaceEmoticons($txt,":GWcorsairNomNomNom:","discordEmotes/GWcorsairNomNomNom.gif");
  $txt = replaceEmoticons($txt,":GWczonRemPeace:","discordEmotes/GWczonRemPeace.gif");
  $txt = replaceEmoticons($txt,":GWnanamiAbababa:","discordEmotes/GWnanamiAbababa.gif");
  $txt = replaceEmoticons($txt,":GWnanamiAlbedoBlush:","discordEmotes/GWnanamiAlbedoBlush.gif");
  $txt = replaceEmoticons($txt,":GWnanamiRamFive:","discordEmotes/GWnanamiRamFive.gif");
  $txt = replaceEmoticons($txt,":GWovoDDRem:","discordEmotes/GWovoDDRem.gif");
  $txt = replaceEmoticons($txt,":GWowoKannaBear:","discordEmotes/GWowoKannaBear.gif");
  $txt = replaceEmoticons($txt,":GWshizuWanISee:","discordEmotes/GWshizuWanISee.gif");
  $txt = replaceEmoticons($txt,":GWupuChitogeCry:","discordEmotes/GWupuChitogeCry.gif");
  $txt = replaceEmoticons($txt,":happuchinu:","discordEmotes/happuchinu.gif");
  $txt = replaceEmoticons($txt,":nom:","discordEmotes/nom.gif");
  $txt = replaceEmoticons($txt,":RemHmpf:","discordEmotes/RemHmpf.gif");
  $txt = replaceEmoticons($txt,":rikka:","discordEmotes/rikka.gif");
  $txt = replaceEmoticons($txt,":RimuruJump:","discordEmotes/RimuruJump.gif");
  $txt = replaceEmoticons($txt,":tuturu:","discordEmotes/tuturu.gif");
  $txt = replaceEmoticons($txt,":wup:","discordEmotes/wup.gif");
  $txt = replaceEmoticons($txt,":yuno:","discordEmotes/yuno.gif");
  $txt = replaceEmoticons($txt,":Z2smug:","discordEmotes/Z2smug.gif");
  return $txt;
}
function regularEmotePlacer(){
  emoticonPlacer(":smile:","regularEmotes/icon_smile.gif");
  emoticonPlacer(":grin:","regularEmotes/icon_biggrin.gif");
  emoticonPlacer(":left-arrow:","regularEmotes/icon_arrow.gif");
  emoticonPlacer(":confused:","regularEmotes/icon_confused.gif");
  emoticonPlacer(":cool:","regularEmotes/icon_cool.gif");
  emoticonPlacer(":cry:","regularEmotes/icon_cry.gif");
  emoticonPlacer(":eek:","regularEmotes/icon_eek.gif");
  emoticonPlacer(":evil:","regularEmotes/icon_evil.gif");
  emoticonPlacer(":exclaim:","regularEmotes/icon_exclaim.gif");
  emoticonPlacer(":idea:","regularEmotes/icon_idea.gif");
  emoticonPlacer(":lol:","regularEmotes/icon_lol.gif");
  emoticonPlacer(":mad:","regularEmotes/icon_mad.gif");
  emoticonPlacer(":question:","regularEmotes/icon_question.gif");
  emoticonPlacer(":razz:","regularEmotes/icon_razz.gif");
  emoticonPlacer(":blush:","regularEmotes/icon_redface.gif");
  emoticonPlacer(":rolleyes:","regularEmotes/icon_rolleyes.gif");
  emoticonPlacer(":sad:","regularEmotes/icon_sad.gif");
  emoticonPlacer(":surprise:","regularEmotes/icon_surprised.gif");
  emoticonPlacer(":twisted:","regularEmotes/icon_twisted.gif");
  emoticonPlacer(":wink:","regularEmotes/icon_wink.gif");
}
function rooEmotePlacer(){
  emoticonPlacer(":rooBaka:","rooEmotes/rooBaka.gif");
  emoticonPlacer(":rooBlank:","rooEmotes/rooBlank.gif");
  emoticonPlacer(":rooBlind:","rooEmotes/rooBlind.gif");
  emoticonPlacer(":rooBlush:","rooEmotes/rooBlush.gif");
  emoticonPlacer(":rooBonk:","rooEmotes/rooBonk.gif");
  emoticonPlacer(":rooBooli:","rooEmotes/rooBooli.gif");
  emoticonPlacer(":rooCop:","rooEmotes/rooCop.gif");
  emoticonPlacer(":rooDab:","rooEmotes/rooDab.gif");
  emoticonPlacer(":rooDerp:","rooEmotes/rooDerp.gif");
  emoticonPlacer(":rooDuck:","rooEmotes/rooDuck.gif");
  emoticonPlacer(":rooGift:","rooEmotes/rooGift.gif");
  emoticonPlacer(":rooHype:","rooEmotes/rooHype.gif");
  emoticonPlacer(":rooLove:","rooEmotes/rooLove.gif");
  emoticonPlacer(":rooLurk:","rooEmotes/rooLurk.gif");
  emoticonPlacer(":rooNap:","rooEmotes/rooNap.gif");
  emoticonPlacer(":rooPog:","rooEmotes/rooPog.gif");
  emoticonPlacer(":rooSip:","rooEmotes/rooSip.gif");
  emoticonPlacer(":rooThink:","rooEmotes/rooThink.gif");
  emoticonPlacer(":rooVV:","rooEmotes/rooVV.gif");
  emoticonPlacer(":rooWhat:","rooEmotes/rooWhat.gif");
  emoticonPlacer(":rooWut:","rooEmotes/rooWut.gif");
  emoticonPlacer(":rooYAHAHA:","rooEmotes/rooYAHAHA.gif");
}
function discordEmotePlacer(){
  emoticonPlacer(":aJaePeek:","discordEmotes/aJaePeek.gif");
  emoticonPlacer(":challenge_accepted:","discordEmotes/challenge_accepted.gif");
  emoticonPlacer(":GWcorsairNomNomNom:","discordEmotes/GWcorsairNomNomNom.gif");
  emoticonPlacer(":GWczonRemPeace:","discordEmotes/GWczonRemPeace.gif");
  emoticonPlacer(":GWnanamiAbababa:","discordEmotes/GWnanamiAbababa.gif");
  emoticonPlacer(":GWnanamiAlbedoBlush:","discordEmotes/GWnanamiAlbedoBlush.gif");
  emoticonPlacer(":GWnanamiRamFive:","discordEmotes/GWnanamiRamFive.gif");
  emoticonPlacer(":GWovoDDRem:","discordEmotes/GWovoDDRem.gif");
  emoticonPlacer(":GWowoKannaBear:","discordEmotes/GWowoKannaBear.gif");
  emoticonPlacer(":GWshizuWanISee:","discordEmotes/GWshizuWanISee.gif");
  emoticonPlacer(":GWupuChitogeCry:","discordEmotes/GWupuChitogeCry.gif");
  emoticonPlacer(":happuchinu:","discordEmotes/happuchinu.gif");
  emoticonPlacer(":nom:","discordEmotes/nom.gif");
  emoticonPlacer(":RemHmpf:","discordEmotes/RemHmpf.gif");
  emoticonPlacer(":rikka:","discordEmotes/rikka.gif");
  emoticonPlacer(":RimuruJump:","discordEmotes/RimuruJump.gif");
  emoticonPlacer(":tuturu:","discordEmotes/tuturu.gif");
  emoticonPlacer(":wup:","discordEmotes/wup.gif");
  emoticonPlacer(":yuno:","discordEmotes/yuno.gif");
  emoticonPlacer(":Z2smug:","discordEmotes/Z2smug.gif");
}
function massEmoticonPlacer(){
    regularEmotePlacer();
    echo "<br>";
    rooEmotePlacer();
    echo "<br>";
    discordEmotePlacer();
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