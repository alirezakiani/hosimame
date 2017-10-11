<?php
ob_start();
define('API_KEY','344849787:AAH7Vfdzv00UHtVjBry7u3__lf2ScJL3B84');
$admin = 432799469;
$TOKEN = API_KEY;
$adminid = file_get_contents('admin/username.txt');
$helptxt = file_get_contents('admin/help.txt');
$goldtxt = file_get_contents('admin/goldtxt.txt');
$starttxt = file_get_contents('starttxt.txt');
$help = file_get_contents("help.txt");
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
$NameBot = $GetINFObot->result->first_name;
$UserNameBot = $GetINFObot->result->username;
$coinsend24 = file_get_contents('admin/coinsend.txt');
function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
function SendMessage2($chatid,$text,$message_id,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
        'reply_to_message_id'=>$message_id,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
function SendPhoto($chatid,$photo,$keyboard,$caption){
	bot('SendPhoto',[
	'chat_id'=>$chatid,
	'photo'=>$photo,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard
	]);
	}
function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
function SendVideo($chatid,$video,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard
	]);
	}
function SendChatAction($chatid,$action){
	bot('sendChatAction',[
	'chat_id'=>$chatid,
	'action'=>$action
	]);
	}
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
function LeaveChat($chatid){
	bot('LeaveChat',[
	'chat_id'=>$chatid
	]);
	}
function GetChat($chatid){
	bot('GetChat',[
	'chat_id'=>$chatid
	]);
	}
function GetChatMembersCount($chatid){
	bot('getChatMembersCount',[
	'chat_id'=>$chatid
	]);
	}
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert
    ]);
	}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
	 bot('editMessagetext',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
	'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
	]);
	}
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
	 bot('editMessageCaption',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'caption'=>$caption,
    'reply_markup'=>$keyboard,
	'inline_message_id'=>$inline_message_id
	]);
	}
$button_tiid = json_encode(['keyboard'=>[
[['text'=>'تایید شماره','request_contact'=>true]],
[['text'=>'چرا باید شمارمو تایید کنم']],
],'resize_keyboard'=>true]);
$button_manage = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی']],
[['text'=>'🔊 پيام همگانی'],['text'=>'🔊 فروارد همگانی']],
[['text'=>'👥 آمار'],['text'=>'☢ تنظیم متن استارت']],
[['text'=>'💬 تنظیم متن بنر گروه'],['text'=>'☎️ تنظیم پشتیبانی']],
[['text'=>'📢 تنظیم متن بنر کانال'],['text'=>'🤖 تنظیم متن بنر ربات']],
[['text'=>'🆔 تنظیم ایدی کانال فروارد'],['text'=>'📕 تنظیم متن راهنما']],
[['text'=> 'ℹ تنظیم ایدی دکمه کانال ما'],['text'=>'📥 تنظیم متن دریافت بنر']],
[['text'=>'💯پیام به کاربر']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_nz = json_encode(['inline_keyboard'=>[
[['text'=>'نظر بعدی','callback_data'=>'nzr']],
],'resize_keyboard'=>true]);
$button_tadmin = json_encode(['inline_keyboard'=>[
[['text'=>'مشاهده بنر کاربر','callback_data'=>'viewb']],
[['text'=>'تایید بنر','callback_data'=>'taiidb'],['text'=>'رد بنر','callback_data'=>'radb']],
],'resize_keyboard'=>true]);
$button_nza = json_encode(['inline_keyboard'=>[
[['text'=>'📥 دریافت بنر','callback_data'=>'daryaftkey'],['text'=>'📤 تحویل بنر','callback_data'=>'tahvilb']],
[['text'=>'📕 راهنما','callback_data'=>'help'],['text'=>'📢 کانال ما','callback_data'=>'wchannel']],
[['text'=>'📤 ثبت بنر','callback_data'=>'sabtb'],['text'=>'♻️تغییر بنر','callback_data'=>'changeb']],
[['text'=>'☢بنر من','callback_data'=>'mybanner']],
],'resize_keyboard'=>true]);
$button_back1 = json_encode(['inline_keyboard'=>[
[['text'=>'🔙 برگشت','callback_data'=>'back menu']],
[['text'=>"☎️ ورود به پشتیبانی",'url'=>"https://telegram.me/$support"]],
],'resize_keyboard'=>true]);
$button_support = json_encode(['inline_keyboard'=>[
[['text'=>'🔙 برگشت','callback_data'=>'back menu']],
[['text'=>"☎️ پشتیبانی",'url'=>"https://telegram.me/$support"]],
],'resize_keyboard'=>true]);
$button_back2 = json_encode(['inline_keyboard'=>[
[['text'=>'🔙 برگشت','callback_data'=>'back menu']],
],'resize_keyboard'=>true]);
$button_nsend_ads = json_encode(['inline_keyboard'=>[
[['text'=>'چرا تبلیغ ارسال نشد؟🤔','callback_data'=>'nsend ads']],
],'resize_keyboard'=>true]);
$button_t_ads = json_encode(['inline_keyboard'=>[
[['text'=>'تاييد تبليغ','callback_data'=>'taiid ads'],['text'=>'رد تبليغ','callback_data'=>'rad ads']],
],'resize_keyboard'=>true]);
$send_code_kibord = json_encode(['inline_keyboard'=>[[['text'=>"🔝ورود به ربات🔝 $NameBot",'url'=>"https://telegram.me/$UserNameBot"]],]]);

$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$usrn = $update->callback_query->message->chat->username;
$usrn1 = $update->callback_query->message->from->username;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$txt = $update->callback_query->message->text;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$text = $update->message->text;
$message_id = $update->message->message_id;
//debuged
//debuged
//debuged
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$caption = $update->message->caption;
$cde = time();
$code = "$from_id$cde";
$datetime = json_decode(file_get_contents("https://api.feelthecode.xyz/date/?timezone=Asia/tehran"));
$time = $datetime->time;
$date = $datetime->date;
$spam1 = file_get_contents('user/'.$from_id."/spam1.txt");
$spam2 = file_get_contents('user/'.$from_id."/spam2.txt");
$antispam12 = $spam1 - $spam2;
$antispam121 = $antispam12;
$command = file_get_contents('command.txt');
$gold = file_get_contents('user/'.$from_id."/gold.txt");
$coin = file_get_contents('user/'.$from_id."/coin.txt");
$wait = file_get_contents('user/'.$from_id."/wait.txt");
$coin_wait = file_get_contents('user/'.$wait."/coin.txt");
$number = file_get_contents('user/'.$from_id."/number.txt");
$code_taiid = file_get_contents('user/'.$from_id."/code taiid.txt");
$bannerk = file_get_contents('user/'.$from_id."/banner.txt");
$step = file_get_contents('user/'.$from_id."/step.txt");
mkdir("user/$from_id");
$Member = file_get_contents('admin/Member.txt');
$NZR = file_get_contents('admin/NZR.txt');
$bot_type_ads = file_get_contents('bot_type_ads.txt');
$Tedad_Nazar = file_get_contents('admin/Tedad Nazar.txt');
$ads = file_get_contents('ads/Ads.txt');
$cd = file_get_contents("user/$from_id/cd24.txt");
//debuged
//debuged
//debuged
$coinsend = file_get_contents("admin/coinsend.txt");
$Tedad_Ads = file_get_contents('admin/Tedad Ads.txt');
$antispam = file_get_contents('user/'.$from_id."/antospam.txt");
$tch1 = file_get_contents('chanel.txt');
$allads = file_get_contents('ads/allads.txt');
$radads = file_get_contents("ads/radads.txt");
$shoptext = file_get_contents('admin/shoptext.txt');
$coinozv = file_get_contents('admin/coinozv.txt');
$fads = file_get_contents("ads/fads.txt");
$sdaycoin = file_get_contents('user/'.$from_id."/sdaycoin.txt");
$sdaycoin2 = $cde;
$sdaycoin1 = $sdaycoin2 - $sdaycoin;
$coinday = file_get_contents('user/'.$from_id."/coinday.txt");
$username = $update->message->from->username;
$banerctxt = file_get_contents("banerctxt.txt");
$banergtxt = file_get_contents("banergtxt.txt");
$banerrtxt = file_get_contents("banerrtxt.txt");
$support = file_get_contents("support.txt");
$wchannel = file_get_contents("wchannel.txt");
//channel = file_get_contents("channel.txt");
//schannel = "-1001145231133";
$dkeytxt = file_get_contents("dkeytxt.txt");
$bot_type_ads = file_get_contents("bot_type_ads.txt");
//debuged
//debuged
//debuged
    if (strpos($block , "$from_id") !== false) {
	return false;
	}
	elseif ($from_id != $chat_id and $chat_id != $feed) {
	LeaveChat($chat_id);
	}
//debuged
//debuged
//debuged
	elseif($data == 'poshtiban'){
		EditMessageText($chatid,$messageid,"بنر خود را پس از تکمیل کردن به ربات زیر بفرستید 
		@$support",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>'🔙 برگشت','callback_data'=>'back menu']],
[['text'=>"☎️ ورود به پشتیبانی",'url'=>"https://telegram.me/$support"]],
],'resize_keyboard'=>true]));
	}
//debuged
//debuged
//debuged
elseif($data == 'tahvilb'){
  EditMessageText($chatid,$messageid,"👤کاربر عزیز
اگر به بنر خود بازدید زدید بروی دکمه ارسال در پایین کلیک و بنر خود را به ربات فروارد کنید✅
توجه❗️اگر قبلا بنری که میخواهید در کانال گذاشته شود را با استفاده از دکمه ثبت بنر ثبت نکرده اید بنر خود را ارسال نکنید❗️
ابتدا بروی دکمه ثبت بنر لمس و سپس بنری که میخواهید بعد از بازدید زدن در کانال ما ثبت شود را ارسال کنید✅
و سپس به همین بخش مراجعه و بنری که بازدید زدید را ارسال کنید",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>'🔙 برگشت','callback_data'=>'back menu']],
[['text'=>'☢ ارسال','callback_data'=>'tahvil']],
],'resize_keyboard'=>true]));
}
elseif($data == 'tahvil'){
EditMessageText($chatid,$messageid,"کاربر عزیز برای تحویل بنر خود دستور :
/tahvil 
را ارسال کنید...","html","true",$button_nza);
}
elseif($text == '/tahvil'){
save("user/$from_id/step.txt","sendfb");
SendMessage($chat_id,"لطفا بنر خود را که بازدید زدید فروارد کنید...");
}
elseif($step == 'sendfb'){
save("user/$from_id/step.txt","none");
$msidb = $update->message->message_id;
SendMessage($admin,"بنر زیر توسط کاربر با مشخصات :

ایدی = @$username
شناسه = $from_id
ارسال شده👇","html","true",$button_tadmin);
ForwardMessage($admin,$chat_id,$msidb);
SendMessage($chat_id,"بنر شما با موفقیت به دست پشتیبانی رسید
در همین ربات به شما در مورد بنرتان اطلاع خواهیم داد
لطفا منتظر باشید...");
}
elseif($data == 'viewb'){
EditMessageText($chatid,$messageid,"جهت مشاهده بنر کاربر شناسه آن را در ربات جستجو کنید.
اگر چیزی یافت نشد یعنی کاربر بنر خود را ثبت نکرده است.");
}
//elseif($data == 'radb'){
//SendMessage($channel,"بنر زیر توسط پشتیبانی رد شد‼️
//با پشتیبانی با استفاده از ایدی زیر در ارتباط باشید...
//@$support");
//}
//elseif($data == 'taiidb'){
//SendMessage($channel,"بنر زیر توسط پشتیبانی تایید شد.
//بزودی به کانال اصلی ارسال خواهد شد");
//}
elseif($data == 'sabtb'){
EditMessageText($chatid,$messageid,"کاربر عزیز جهت ثبت بنر خود دستور :
/sabt 
را ارسال کنید...");
}
elseif($text == '/sabt'){
save("user/$from_id/step.txt","sabt");
SendMessage($chat_id,"بنر خود را ارسال کنید :
❗️توجه فقط میتوانید بنر متنی ارسال کنید✅","html","true",$button_back2);
}
elseif($step == 'sabt'){
save("user/$from_id/banner.txt","$text");
save("user/$from_id/step.txt","none");
$tbanner = $text;
SendMessage($admin,"کاربر با شناسه $from_id
بنر جدید ثبت کرد :
$tbanner");
SendMessage($chat_id,"بنر شما ثبت شد...✔");
}
elseif($data == 'mybanner'){
if($bannerk != null){
EditMessageText($chatid,$messageid,"💯بنر ثبت شده شما :
$bannerk
جهت تغییر بنر = /change ✅","html","true",$button_back2);
}else{
EditMessageText($chatid,$messageid,"❗️شما بنر خود را ثبت نکرده اید❗️","html","true",$button_back2);
}
}
elseif($data == 'changeb'){
EditMessageText($chatid,$messageid,"کاربر عزیز جهت تغییر بنر خود دستور :
/change
را ارسال کنید...");
}
//debuged//debuged


elseif($text == '/change'){
save("user/$from_id/step.txt","changeb");
SendMessage($chat_id,"بنر جدید خود را ارسال کنید :
❗️توجه فقط میتوانید بنر متنی ارسال کنید✅","html","true",$button_back2);
}
elseif($step == 'changeb'){
save("user/$from_id/step.txt","none");
save("user/$from_id/banner.txt","$text");
$cbanner = $text;
SendMessage($admin,"کاربر با شناسه $from_id
بنر خود را تغییر داد :
$cbanner");
SendMessage($chat_id,"بنر شما تغییر یافت...♻");
}

//debuged
//debuged
elseif($data == 'daryaftkey'){
  EditMessageText($chatid,$messageid,"$dkeytxt",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>'📢 بنر کانال','callback_data'=>'daryaftc'],['text'=>'💬 بنر گروه','callback_data'=>'daryaftg']],
[['text'=>'🤖 بنر ربات','callback_data'=>'daryaftr']],
[['text'=>'🔙 برگشت','callback_data'=>'back menu']],
],'resize_keyboard'=>true]));
 }
//debuged
//debuged
//debuged
	elseif($data == 'back menu'){
	 save("user/$from_id/step.txt","none"); 	EditMessageText($chatid,$messageid,"$starttxt","html","true",$button_nza);
	}
//debuged
//debuged
//debuged
elseif($data == 'daryaftc'){
  if($usrn == null){
   $pmctext = "$banerctxt

🆔 $chatid

📅 تاریخ :$date
⏰ ساعت : $time
";
  }else{
      $pmctext = "$banerctxt

🆔 @$usrn

📅 تاریخ :$date
⏰ ساعت : $time
";
  }
  $msgid = json_decode(file_get_contents("https://api.telegram.org/bot$TOKEN/sendMessage?parse_mode=HTML&chat_id=$tch1&text=".urlencode($pmctext)));
  $msg_id = $msgid->result->message_id;
   ForwardMessage($chatid,$tch1,$msg_id);
   AnswerCallbackQuery($data_id,"بنر برای شما با موفقیت ارسال شد");
  }
//debuged
//debuged
//debuged
elseif($data == 'daryaftg'){
  if($usrn == null){
   $pmgtext = "$banergtxt

🆔 $chatid

📅 تاریخ :$date
⏰ ساعت : $time
";
  }else{
      $pmgtext = "$banergtxt

🆔 @$usrn

📅 تاریخ :$date
⏰ ساعت : $time
";
  }
  $msgid = json_decode(file_get_contents("https://api.telegram.org/bot$TOKEN/sendMessage?parse_mode=HTML&chat_id=$tch1&text=".urlencode($pmgtext)));
  $msg_id = $msgid->result->message_id;
   ForwardMessage($chatid,$tch1,$msg_id);
   AnswerCallbackQuery($data_id,"بنر برای شما با موفقیت ارسال شد");
  }
//debuged
//debuged
//debuged
 elseif($data == 'daryaftr'){
  if($usrn == null){
   $pmrtext = "$banerrtxt

🆔 $chatid

📅 تاریخ :$date
⏰ ساعت : $time
";
  }else{
      $pmrtext = "$banerrtxt

🆔 @$usrn

📅 تاریخ :$date
⏰ ساعت : $time
";
  }
  $msgid = json_decode(file_get_contents("https://api.telegram.org/bot$TOKEN/sendMessage?parse_mode=HTML&chat_id=$tch1&text=".urlencode($pmrtext)));
  $msg_id = $msgid->result->message_id;
   ForwardMessage($chatid,$tch1,$msg_id);
   AnswerCallbackQuery($data_id,"بنر برای شما با موفقیت ارسال شد");
  }
//===============
  elseif(preg_match('/^\/([Ss]tart)(.*)/',$text)){
	preg_match('/^\/([Ss]tart)(.*)/',$text,$match);
	$match[2] = str_replace(" ","",$match[2]);
	$match[2] = str_replace("\n","",$match[2]);
    mkdir("user/$from_id");
save("user/$from_id/step.txt","none");
	if($match[2] != null){
	if (strpos($Member , "$from_id") == false){
	if($match[2] != $from_id){
	if (strpos($gold , "$from_id") == false){
	$txxt = file_get_contents('user/'.$match[2]."/gold.txt");
    $pmembersid= explode("\n",$txxt);
    if (!in_array($from_id,$pmembersid)){
      $aaddd = file_get_contents('user/'.$match[2]."/gold.txt");
      $aaddd .= $from_id."\n";
		file_put_contents('user/'.$match[2]."/gold.txt",$aaddd);
    }
	$mtch = file_get_contents('user/'.$match[2]."/coin.txt");
	if($coinozv != null){
	file_put_contents("user/".$match[2]."/coin.txt",($mtch+10) );
	}else{
	file_put_contents("user/".$match[2]."/coin.txt",($mtch+$coinozv) );
	SendMessage($match[2],"🆕 یک نفر با لینک اختصاصی شما وارد ربات شد","html","true",$button_official);
	}
	}
	}
	}
	}
	if($bot_type_ads != 'gold'){
	SendMessage($chat_id,"$starttxt","html","true",$button_nza);
	}else{
		SendMessage($chat_id,"$starttxt","html","true",$button_nza);
	}   
	}
//debuged
//debuged
//debuged
	elseif($text == '/panel'){
		if($from_id == $admin | $from_id == $admin2){
		SendMessage($chat_id,"به مدیریت خوش آمدید.","html","true",$button_manage);
	}
	}
	//===============
	elseif($text == '/creator'){
			SendMessage($chat_id,"این ربات توسط سودو شایان ساخته شده است
شما هم میتوانید با پرداخت ماهی 10 تومن یک ربات بنردهی داشته باشید .
@SudoShayan
@master_shayan_bot","html","true");
	}
  //===============
  elseif($text == '↩️منوی اصلی'){
	  if($from_id == $admin | $from_id == $admin2){
  file_put_contents('command.txt',"none");
  SendMessage($chat_id,"↩️ شما به منوی اصلی برگشتید

⏺ چه کاری میتونم براتون انجام بدم؟","html","true",$button_manage);
  }
  }
 //===============
elseif($data == 'help'){
  EditMessageText($chatid,$messageid,"$help","html","true",$button_nza);
 }
//debuged
//debuged
//debuged
elseif($data == 'daryaftkey'){
  EditMessageText($chatid,$messageid,"$dkeytxt","html","true",$button_dhey);
 }
 //===============
	elseif($data == 'wchannel'){
		EditMessageText($chatid,$messageid,"کاربر عزیز $from_first 😊
جهت ورود به کانال ما بروی دکمه عضویت کلیک کنید...✔️",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>'🔙 برگشت','callback_data'=>'back menu']],
[['text'=>"🔰 عضویت",'url'=>"https://telegram.me/$wchannel"]],
],'resize_keyboard'=>true]));
	}
//===============
  elseif($text == ' 📢 تنظیم متن بنر کانال' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('command.txt',"set banerc");
  SendMessage($chat_id,"لطفا متن بنر را ارسال کنید","html","true",$button_back);
  }
//debuged
//debuged
//debuged
  elseif($command == 'set banerc' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('banerctxt.txt',$text);
  file_put_contents('command.txt',"none");
  SendMessage($chat_id,"ثبت شد","html","true",$button_manage);
  }
//===============
  elseif($text == '💬 تنظیم متن بنر گروه' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('command.txt',"set banerg");
  SendMessage($chat_id,"لطفا متن بنر را ارسال کنید","html","true",$button_back);
  }
  //===============
  elseif($command == 'set banerg' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('banergtxt.txt',$text);
  file_put_contents('command.txt',"none");
  SendMessage($chat_id,"ثبت شد","html","true",$button_manage);
  }
//debuged
//debuged
//debuged
  elseif($text == '🤖 تنظیم متن بنر ربات' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('command.txt',"set banerr");
  SendMessage($chat_id,"لطفا متن بنر را ارسال کنید","html","true",$button_back);
  }
  //===============
  elseif($command == 'set banerr' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('banerrtxt.txt',$text);
  file_put_contents('command.txt',"none");
  SendMessage($chat_id,"ثبت شد","html","true",$button_manage);
  }
  //===============
  elseif($text == '🆔 تنظیم ایدی کانال فروارد' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('command.txt',"set chanel");
  SendMessage($chat_id,"لطفا ایدی کانال برای ارسال بنر در آن را با @ وارد کنید","html","true",$button_back);
  }
  //===============
  elseif($command == 'set chanel' and $from_id == $admin | $from_id == $admin2){
$truechannel1 = json_decode(file_get_contents("https://api.telegram.org/bot$TOKEN/getChat?chat_id=$text"));
$tch1 = $truechannel1->result->id;
  file_put_contents('chanel.txt',$tch1);
  file_put_contents('command.txt',"none");
  SendMessage($chat_id,"عالیه
  حالا کانال رو خصوصی کن تا ایدی نداشته باشه.","html","true",$button_manage);
  }
//debuged
//debuged
//debuged
  elseif($text == '👥 آمار' and $from_id == $admin | $from_id == $admin2){
  $txtt = file_get_contents('Member.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
	SendMessage($chat_id,"آمار شما تا ساعت $time و تاریخ $date به تعداد $mmemcount ممبر میباشد.","html","true",$button_manage);
  }
  //===============
	elseif($text == '🔊 پيام همگانی' and $from_id == $admin | $from_id == $admin2){
	file_put_contents("command.txt","s2a");
	SendMessage($chat_id,"پيامتون رو وارد کنيد","html","true",$button_back);
	}
	//===============
	elseif($command == 's2a' and $from_id == $admin | $from_id == $admin2){
	file_put_contents("command.txt","none");
	SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "Member.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$stickerid);
			}
			elseif($videoid != null){
			SendVideo($user,$videoid,$caption);
			}
			elseif($voiceid != null){
			SendVoice($user,$voiceid,'',$caption);
			}
			elseif($fileid != null){
			SendDocument($user,$fileid,'',$caption);
			}
			elseif($musicid != null){
			SendAudio($user,$musicid,'',$caption);
			}
			elseif($photoid != null){
			SendPhoto($user,$photoid,'',$caption);
			}
			elseif($text != null){
			SendMessage($user,$text,"html","true");
			}
		}
	}
//debuged
//debuged
//debuged
  elseif($text == '🔊 فروارد همگانی'and $from_id == $admin | $from_id == $admin2){
	file_put_contents("command.txt","s2a fwd");
	SendMessage($chat_id,"پیام مورد نظر را فوروارد کنید","html","true",$button_back);
    }
    //===============
	elseif($command == 's2a fwd' and $from_id == $admin | $from_id == $admin2){
	file_put_contents("command.txt","none");
	SendMessage($chat_id,"پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "Member.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			ForwardMessage($user,$admin,$message_id);
		}
	}
	//===============
  elseif($text == '☢ تنظیم متن استارت'and $from_id == $admin | $from_id == $admin2){
	file_put_contents("command.txt","set starttxt");
	SendMessage($chat_id,"پیامی که میخواهید به عنوان متن استارت باشد را ارسال کنید.","html","true",$button_back);
    }
    //===============
	elseif($command == 'set starttxt' and $from_id == $admin | $from_id == $admin2 ){
		file_put_contents("starttxt.txt","$text");
	file_put_contents("command.txt","none");
	SendMessage($chat_id,"متن استارت تنظیم شد","html","true",$button_manage);
		}
		//===============
  elseif($text == '☎️ تنظیم پشتیبانی'and $from_id == $admin | $from_id == $admin2){
	file_put_contents("command.txt","set support");
	SendMessage($chat_id,"لطفا آیدی پشتیبانی را بدون @ وارد کنید","html","true",$button_back);
    }
    //===============
	elseif($command == 'set support' and $from_id == $admin | $from_id == $admin2){
		file_put_contents("support.txt","$text");
	file_put_contents("command.txt","none");
	SendMessage($chat_id,"ایدی پشتیبانی تنظیم شد
ایدی جدید : @$text","html","true",$button_manage);
		}
//debuged
//debuged
//debuged
elseif($text == '📕 تنظیم متن راهنما'and $from_id == $admin | $from_id == $admin2){
 file_put_contents("command.txt","set help");
 SendMessage($chat_id,"متن جدید راهنما را ارسال کنید:","html","true",$button_back);
    }
    //===============
 elseif($command == 'set help' and $from_id == $admin | $from_id == $admin2){
  file_put_contents("help.txt","$text");
 file_put_contents("command.txt","none");
 SendMessage($chat_id,"متن راهنما تنظیم شد.","html","true",$button_manage);
  }
 //===============
elseif($text == 'ℹ تنظیم ایدی دکمه کانال ما'and $from_id == $admin | $from_id == $admin2){
	file_put_contents("command.txt","set wchannel");
	SendMessage($chat_id,"لطفا آیدی را بدون @ وارد کنید","html","true",$button_back);
    }
    //===============
	elseif($command == 'set wchannel' and $from_id == $admin | $from_id == $admin2){
		file_put_contents("wchannel.txt","$text");
	file_put_contents("command.txt","none");
	SendMessage($chat_id,"ایدی کانال تنظیم شد
ایدی جدید : @$text","html","true",$button_manage);
		}
//debuged
//debuged
//debuged
  elseif($text == '📥 تنظیم متن دریافت بنر' and $from_id == $admin | $from_id == $admin2){
  file_put_contents('command.txt',"set dkey");
  SendMessage($chat_id,"لطفا متن بنر را ارسال کنید","html","true",$button_back);
  }
  //===============
  elseif($command == 'set dkey' and $from_id == $admin | $from_id == $admin2 ){
  file_put_contents('dkeytxt.txt',$text);
  file_put_contents('command.txt',"none");
  SendMessage($chat_id,"ثبت شد","html","true",$button_manage);
  }
//debuged
//debuged
//debuged
elseif($text == '💯پیام به کاربر' and $from_id == $admin | $from_id == $admin2){
save("user/$from_id/step.txt","pk");
SendMessage($chat_id,"شناسه کاربر را وارد کتید :","html","true",$button_back);
}
elseif($step == 'pk' and $from_id == $admin | $from_id == $admin2){
save("user/$from_id/step.txt","pk2");
$useri = $text;
SendMessage($chat_id,"حال پیام خود را وارد کنید :","html","true",$button_back);
}
elseif($step == 'pk2' and $from_id == $admin | $from_id == $admin2){
$pktext = $text;
SendMessage($useri,"پیام جدید از طرف پشتیبانی :
$pktext");
save("user/$from_id/step.txt","none");
SendMessage($chat_id,"ارسال شد.","html","true",$button_manage);
}
//debuged
//debuged
//debuged
  if(!file_exists('user/'.$from_id)){
  mkdir('user/'.$from_id);
  }
  if(!file_exists('user/'.$from_id."/coin.txt")){
  file_put_contents('user/'.$from_id."/coin.txt","1");
  }
  $txxt = file_get_contents('Member.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('Member.txt');
      $aaddd .= $chat_id."\n";
		file_put_contents('Member.txt',$aaddd);
    }unlink('error_log');
    //debuged
    //debuged
    //debuged
	?>
