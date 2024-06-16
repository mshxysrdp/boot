<?php
date_default_timezone_set("Asia/Baghdad");
error_reporting(0);
function bot($method, $datas = []) {
$token = file_get_contents("token");
$url = "https://api.telegram.org/bot$token/" . $method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}
function curl_get($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/967.46 (KHTML, like Gecko) Chrome/90.0.1931.128 Safari/967.46');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
$ch_data = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}
curl_close($ch);
return $ch_data;
}
function getupdates($up_id) {
$get = bot('getupdates', ['offset' => $up_id]);
return end($get['result']);
}
$botuser = "@" . bot('getme', ['bot']) ["result"]["username"];
file_put_contents("besso/_ad.txt", $botuser);
function stats($nn) {
$st = "";
$x = shell_exec("pm2 show $nn");
if (preg_match("/online/", $x)) {
$st = "run";
}
else {
$st = "stop";
}
return $st;
}
function states($g) {
$st = "";
$x = shell_exec("pm2 show $g");
if(preg_match("/online/", $x)) {
$st = "run";
}else{
$st = "stop";
}
return $st;
}
function countUsers($u = "2", $t = "2") {
if ($t == "2") {
$users = explode("\n", file_get_contents("users1"));
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i➧ @$user";
$i++;
}
}
if ($list == "") {
return "There is no username in the list";
}
else {
return $list;
}
}
if ($t == "1") {
$users = explode("\n", $u);
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i➧ @$user";
$i++;
}
}
if ($list == "") {
return "There is no username in the list";
}
else {
return $list;
}
}
}
$step = "";
function run($update) {
global $step;
$nn = bot('getme', ['bot']) ["result"]["username"];
$message = $update['message'];
$userID = $message['from']['id'];
$chat_id = $message['chat']['id'];
$name = $message['from']['first_name'];
$text = $message['text'];
$date = $update['callback_query']['data'];
$cq = $update['callback_query'];
$data = $cq['data'];
$message_id = $cq['message']['message_id'];
$chat_id2 = $cq['message']['chat']['id'];
$group = file_get_contents("ID");
$js = json_decode($g);
$da = $js->date;
$time = $js->time;
$day = $js->day;
$month = $js->month;
$ad = array("$group");
if($text == "/start" and !in_array($chat_id,$ad) and $chat_id != $group = null){
bot('sendmessage',[ 
'chat_id'=>$chat_id,
'text'=>" 𝗛𝗶 𝗗𝗲𝗮𝗿 . \n 𝗦𝘂𝗦 𝗖𝗵𝗲𝗰𝗸𝗲𝗿 , 𝘁𝗼 𝗯𝘂𝘆 𝗮 
𝗧𝗼 𝗽𝘂𝗿𝗰𝗵𝗮𝘀𝗲 𝗮 𝘀𝘂𝗯𝘀𝗰𝗿𝗶𝗽𝘁𝗶𝗼𝗻 𝘁𝗼 𝘁𝗵𝗲 𝗯𝗼𝘁 𝗱𝗺 𝗺𝗲 .
",'parse_mode' => "MarkDown", 'disable_web_page_preview' => true,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -'", 'url' => "https://t.me/sus_pablo"]],
]]) 
]);
}
if ($chat_id == $group) {
if ($text) {
if ($text == "/start" or $text == "->") {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text' => "Hi , [$name](tg://user?id=$chat_id)",
'parse_mode' => "MarkDown", 
'disable_web_page_preview' => true,
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"اضف او حذف رقم"],["text" =>"اضف او حذف يوزر"]],
[["text" =>"تشغيل او ايقاف"]],
[["text" =>"عرض اليوزرات"],["text" =>"الضغطات"]]], ]) 
]);
}
$info = json_decode(file_get_contents('info.json'),true);
$loop1 = $info["loop1"];
$loop2 = $info["loop2"];
$loop3 = $info["loop3"];
$loop4 = $info["loop4"];
$loop5 = $info["loop5"];
file_put_contents('info.json', json_encode($info));
if ($chat_id == $group) {
if($text == 'الضغطات'){
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"𖠜 Clicks Requests Of Numbers 𓆪 •",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"1 ↣  $loop1 ",'callback_data'=>"U"],['text'=>"2 ↣  $loop2 ",'callback_data'=>"U"]],
[['text'=>"3 ↣  $loop3 ",'callback_data'=>"U"],['text'=>"4 ↣  $loop4 ",'callback_data'=>"U"]],
[['text'=>"5 ↣  $loop5 ",'callback_data'=>"U"]],
]])]);
}}

if (preg_match('/Run Account \d+/',$text)){
$ex = explode('Run Account ',$text);
shell_exec("pm2 start $ex[1].php");
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"⌁ Done type to Account ".$ex[1]."✅",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
}
##اضف رقم او حذف###
if ($chat_id == $group) {
if ($text == "اضف او حذف رقم") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"->"]],
[["text" =>"Login1"],["text" =>"Delete number1"]],
[["text" =>"Login2"],["text" =>"Delete number2"]],
[["text" =>"Login3"],["text" =>"Delete number3"]],
[["text" =>"Login4"],["text" =>"Delete number4"]],
[["text" =>"Login5"],["text" =>"Delete number5"]]],]) ]);
}}
if (preg_match('/Login\d+/',$text)){
$ex = explode('Login',$text);
bot('sendMessage',['chat_id' => $chat_id, 'text' => "• تشيكر رقم ".$ex[1].".\n• ارسل رقم الحساب الان .\n•مثال \n+3387287822"]);
file_put_contents("TheN",$ex[1]);
unlink($ex[1].".madeline");
unlink($ex[1].".madeline.lock");
file_put_contents("step","2");
system('php Login.php');
}
if (preg_match('/Delete number\d+/',$text)){
$ex = explode('Delete number',$text);
bot('sendMessage',['chat_id' => $chat_id, 'text' => "• التشيكر رقم ".$ex[1]." - \n• تم حذفه بنجاح ."]);
unlink("TheN");
unlink($ex[1].".madeline"); 
unlink($ex[1].".madeline.lock");
unlink($ex[1].".madeline.lightState.php");
unlink($ex[1].".madeline.lightState.php.lock");
unlink($ex[1].".madeline.safe.php");
unlink($ex[1].".madeline.safe.php.lock");
system('rm -rf '.$ex[1].'.madeline && rm -rf '.$ex[1].'.madeline.lock && rm -rf '.$ex[1].'.madeline.lightState.php && rm -rf '.$ex[1].'.madeline.lightState.php.lock && rm -rf '.$ex[1].'.madeline.safe.php && rm -rf '.$ex[1].'.madeline.safe.php.lock');
}
####رن او ستوب###
if ($chat_id == $group) {
if ($text == "تشغيل او ايقاف") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"->"]],
[["text" =>"Stop Run 1"],["text" =>"Run Account 1"]],
[["text" =>"Stop Run 2"],["text" =>"Run Account 2"]],
[["text" =>"Stop Run 3"],["text" =>"Run Account 3"]],
[["text" =>"Stop Run 4"],["text" =>"Run Account 4"]],
[["text" =>"Stop Run 5"],["text" =>"Run Account 5"]]],]) ]);
}}
if (preg_match('/Stop Run \d+/',$text)){
$ex = explode('Stop Run ',$text);
$info = json_decode(file_get_contents('info.json'),true);
$info["loop".$ex[1]] = "off";
file_put_contents('info.json', json_encode($info));
shell_exec("pm2 stop $ex[1].php");
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"⌁ Done Stoped Checker \n⌁ Checker Stoped List ".$ex[1]." 🔐",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],]])]);
$info = json_decode(file_get_contents('info.json'),true);
$info["num".$ex[1]] = "off";
file_put_contents('info.json', json_encode($info));
}
##اضف حذف يوزر###
if ($chat_id == $group) {
if ($text == "اضف او حذف يوزر") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"->"]],
[["text" =>"add List 1"],["text" =>"Delet - 1"]],
[["text" =>"add List 2"],["text" =>"Delet - 2"]],
[["text" =>"add List 3"],["text" =>"Delet - 3"]],
[["text" =>"add List 4"],["text" =>"Delet - 4"]],
[["text" =>"add List 5"],["text" =>"Delet - 5"]]],]) ]);
}}
if (preg_match('/add List \d+/',$text)){
$ex = explode('add List ',$text);
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"Send List ".$ex[1]." 📥",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],]])]);
file_put_contents('mode', 'besso'.$ex[1]);
}
if (preg_match('/Delet - \d+/',$text)){
$ex = explode('Delet - ',$text);
bot('sendMessage', ['chat_id' => $chat_id,'text'=>"Delet List ".$ex[1]." 🗑",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],]])]);
file_put_contents('mode', 'Unpin'.$ex[1]);
} 
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users1'));
if(preg_match("/@+/", $text)){
if($mode == 'Pi0n'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users1", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"⌁ Done Delet User List 2 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
}
unlink('mode');
} 
if($mode == 'Unpin1'){
echo 'Unpin1';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users1"));
file_put_contents("users1", $data);
file_put_contents("users1",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users1"))));
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Delet User List 1 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}elseif($mode == 'besso1'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users1"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users1", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,  'text' => "⌁ Done Added Users To List 1 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users2'));
if(preg_match("/@+/", $text)){
if($mode == 'Pi0n'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users2", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"⌁ Done Delet User List 2 : @$user" ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin2'){
echo 'Unpin2';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users2"));
file_put_contents("users2", $data);
file_put_contents("users2",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users2"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 2 : @$user" ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}elseif($mode == 'besso2'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users2"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users2", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 2 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users3'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users3", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);}
unlink('mode');
}elseif($mode == 'Unpin3'){
echo 'Unpin3';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users3"));
file_put_contents("users3", $data);
file_put_contents("users3",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users3"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 3 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}elseif($mode == 'besso3'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users3"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users3", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 3 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users4'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users4", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin4'){
echo 'Unpin4';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users4"));
file_put_contents("users4", $data);
file_put_contents("users4",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users4"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 4 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}elseif($mode == 'besso4'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users4"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users4", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 4 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}
}}
if(file_exists('mode')){
$mode = file_get_contents('mode');
$users = explode("\n", file_get_contents('users5'));
if(preg_match("/@+/", $text)){
if($mode == 'P0in'){
$user = explode("@", $text) [1];
if (!in_array($user, $users)) {
file_put_contents("users5", "\n" . $user, FILE_APPEND);
$EzTG->sendMessage(['chat_id'=>$cha,'text'=>"@$user : ⌁ Done Pin ",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
} else {
bot('sendMessage', ['chat_id' => $chat_id, 'text'=>"@$user : Already Exists.",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
}
unlink('mode');
} elseif($mode == 'Unpin5'){
echo 'Unpin5';
$user = explode("@", $text) [1];
$data = str_replace("\n" . $user, "", file_get_contents("users5"));
file_put_contents("users5", $data);
file_put_contents("users5",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users5"))));
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Delet User List 5 : @$user",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}elseif($mode == 'besso5'){
echo $mode;
$ex = explode("\n", $text);
$userT = "";
$userN = "";
foreach ($ex as $u) {
$besso1 = explode("\n", file_get_contents("users5"));
$user = explode("@", $u) [1];
if (!in_array($user, $users)) {
$userT = $userT . "\n" . $user;
}
else {
$userN = $userN . "\n" . $user;
}
}
file_put_contents("users5", $userT, FILE_APPEND);
bot('sendMessage', ['chat_id' => $chat_id,'text' => "⌁ Done Added Users To List 5 :\n" . countUsers($userT, "1") ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
unlink('mode');
}
}}
}
##عرض السته او حذف##
if ($chat_id == $group) {
if ($text == "عرض اليوزرات") {
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "𖠜 Select button",
'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [
[["text" =>"->"]],
[["text" =>"Show All - 1"],["text" =>"Clear list 1"]],
[["text" =>"Show All - 2"],["text" =>"Clear list 2"]],
[["text" =>"Show All - 3"],["text" =>"Clear list 3"]],
[["text" =>"Show All - 4"],["text" =>"Clear list 4"]],
[["text" =>"Show All - 5"]]],]) ]);
}}
if (preg_match('/Show All - \d+/',$text)){
$ex = explode('Show All - ',$text);
$users = explode("\n", file_get_contents("users".$ex[1]));
$list = "";
$i = 1;
foreach ($users as $user) {
if ($user != "") {
$list = $list . "\n$i  ➧ @$user";
$i++;}}
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "• The All Users List ".$ex[1]." 📥 \n".$list ,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
}
if (preg_match('/Clear list \d+/',$text)){
$ex = explode('Clear list ',$text);
bot('sendMessage', ['chat_id' => $chat_id, 'text' => "Done Delete all Usernames List 1",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text' => "- 𝗦𝘂𝗦 𝗣𝗮𝗕𝗟𝗼 𝗖𝗵𝗔𝗻𝗡𝗲𝗟 -", 'url' => "https://t.me/sus_pablo"]],
]])]);
file_put_contents("users".$ex[1], "");
}
}
}
while (true) {
global $last_up;
$get_up = getupdates($last_up + 1);
$last_up = $get_up['update_id'];
if ($get_up) {
run($get_up);
}
}
?>
