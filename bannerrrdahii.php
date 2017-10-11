<?php
/*
edit by : @botreborn_ch
*/
define('API_KEY','344849787:AAH7Vfdzv00UHtVjBry7u3__lf2ScJL3B84');
define('bot','https://api.telegram.org/bot'.API_KEY.'/');
function makereq($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//End Making Request
//----------#######-----------
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
//=========
$chat_id = $update->message->chat->id;
$message_id = $updata->message->message_id;
$from_id = $update->message->from->id;
$username = $update->message->from->username;
$name = $update->message->from->first_name;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$data_username = $update->callback_query->message->from->username;
$fid = $update->callback_query->from->id;
$fusername = $update->callback_query->from->username;
$messageid = $update->callback_query->message->message_id;
$data_id = $update->callback_query->id;
$reply = $update->message->reply_to_message->forward_from->id;
//-----------------
$admin = 432799469;
$ch = -1001145231133;
$chtab = -1001060016299;
$gp = -1001125954864;
$text = isset($update->message->text)?$update->message->text:'';
$date = file_get_contents("https://provps.ir/td?td=date");
$time = file_get_contents("https://provps.ir/td?td=time");
$mash = file_get_contents("data/$from_id/mash.txt");
$step = file_get_contents("data/$from_id/step.txt");
$num = file_get_contents("data/$from_id/num.txt");
$code = file_get_contents("data/$from_id/code.txt");
$type = file_get_contents("data/$from_id/type.txt");
$baner = file_get_contents("data/$from_id/baner.txt");
$warn = file_get_contents("data/$from_id/warn.txt");
$id = file_get_contents("data/$from_id/msg.txt");
$banerf = file_get_contents("data/$fid/baner.txt");
$idf = file_get_contents("data/$fid/msg.txt");
$warnf = file_get_contents("data/$fid/warn.txt");
$typef = file_get_contents("data/$fid/type.txt");
$numf = file_get_contents("data/$fid/num.txt");
$user = file_get_contents("user.txt");
$posh = file_get_contents("data/$from_id/posh.txt");
$pm = file_get_contents("data/$from_id/pm.txt");
$pmf = file_get_contents("data/$fromid/pm.txt");
$stepf = file_get_contents("data/$fromid/step.txt");
$mashf = file_get_contents("data/$fid/mash.txt");
$ban = file_get_contents("ban.txt");
$forchaneel = json_decode(file_get_contents("HTTPS://api.telegram.org/bot344849787:AAH7Vfdzv00UHtVjBry7u3__lf2ScJL3B84/getChatMember?chat_id=@Gold_Links&user_id=".$from_id));
$tch = $forchaneel->result->status;
$forward_from_chat = $update->message->forward_from_chat;
$fwd_username = $forward_from_chat->username;
$fwd_id = $forward_from_chat->id;
$textpm = "BANER";
//_______
function SendMessage($ChatId, $TextMsg)
{
 makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
	//---------------
	if (strpos($ban,"$from_id") !== false  ) {
SendMessage($chat_id,"دسترسی شما به این سرور قطع شده است💮
دوباره پیام ندهید➰");
}
elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
  SendMessage($chat_id,"دوست عزیز برای استفاده از ربات و همچنین حمایت از ما باید عضو کانال شوید ⚠️
⭕️ @Gold_Links
پس از عضو شدن روی 🗳 
/start
کلیک کنید🚿");
  }
elseif($text == "/start"){
	 if (!file_exists("data/$from_id/mash.txt")){
	     mkdir("data/$from_id");
	     save("data/$from_id/mash.txt","0");
	     save("data/$from_id/num.txt","no");
	     save("data/$from_id/code.txt","none");
	     save("data/$from_id/step.txt","none");
	     save("data/$from_id/type.txt","none");
	     save("data/$from_id/pm.txt","no");
	     save("data/$from_id/posh.txt","0");
	     save("data/$from_id/warn.txt","0");
	     save("data/$from_id/msg.txt","0");
	     save("data/$from_id/baner.txt","ثبت نشده⚠️");
	     $members = file_get_contents("member.txt");
    save("member.txt",$members."$from_id\n");
	    var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"با موفقیت یک حساب کاربری برای شما در این ربات ساخته شد🔮",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
        ])
    ]));
	 }
	 else{
var_dump(makereq('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"شما از قبل عضو ربات بودید⭕️",
    'parse_mode'=>"MarkDown",
    'reply_markup'=>json_encode([
        'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
        ])
    ]));
	}
	}
//----------------------
	//----------------------
 
	//-----------------------
	elseif($text == "برگشت🗑"){
	    var_dump(makereq('sendmessage',[
	        'chat_id'=>$chat_id,
	        'text'=>"به منوی اصلی برگشتیم🔋",
	        'parse_mode'=>"MarkDown",
	        'reply_markup'=>json_encode([
	           'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
	            ])
	        ]));
	        save("data/$from_id/step.txt","none");
	}
	//---------------------
	elseif($text == "نه بیخیال ✈️"){
	    var_dump(makereq('sendmessage',[
	        'chat_id'=>$chat_id,
	        'text'=>"عملیات با موفقیت لغو شد㊙️
یکی از گزینه های زیر را انتخاب کنید🚿",
	        'parse_mode'=>"MarkDown",
	        'reply_markup'=>json_encode([
	            'keyboard'=>[
	                [
	                    ['text'=>"گروه لیستی🌐"],['text'=>"گروه تکی🌀"]
	                    ],
	                    [
	                        ['text'=>"کانال💱"],['text'=>"کانال با عکس➰"]
	                        ],
	                        [
	                            ['text'=>"چالش با عکس🎵"],['text'=>"چالش 🗞"]
	                            ],
	                            [
	                            ['text'=>"برگشت🗑"]
	                ]
	                ],
	                'resize_keyboard'=>true
	            ])
	        ]));
	}
	//---------------------
	elseif($text == "/creator"){
	    SendMessage($chat_id,"کد های این ربات توسط @Koshandew نوشته شده است🚿");
	}
	//--------------------
	//******************************
	elseif($text == '/state' && $from_id == $admin) {
    $txtt = file_get_contents('member.txt');
    $membersidd= explode("\n",$txtt);
    $mmemcount = count($membersidd) -1;
    {
SendMessage($chat_id,"آخرین آمار کاربران : $mmemcount 🔸
در ساعت $time و تاریخ $date ®");
}
}
//*****************************************
//*********************************
//********************************
	elseif($text == "ارسال بنر🔊"){
	    var_dump(makereq('sendmessage',[
	        'chat_id'=>$chat_id,
	        'text'=>"بنر خود را ارسال کنید⚠️",
	        'parse_mode'=>MarkDown,
	        'reply_markup'=>json_encode([
	            'keyboard'=>[
	                [
	                    ['text'=>"برگشت🗑"]
	                    ]
	                ],
	                'resize_keyboard'=>true
	            ])
	        ]));
	        save("data/$from_id/step.txt","zhon");
	}
	elseif($step == "zhon"){
	    $hor = $update->message->message_id;
	    save("data/$from_id/step.txt","none");
	    Forward($gp,$chat_id,$hor);
	    SendMessage($chat_id,"بنر شما با موفقیت به گروه پشتیبانی ارسال شد💤
پس از تایید بنر شما در گروه پشتیبانی ، بنر شما در کانل پست خواهد شد⚠️");
	    var_dump(makereq('sendmessage',[
	        'chat_id'=>$gp,
	        'text'=>"بنر کاربر➰ :
`$from_id`
`@$username`
نوع بنر : $type 
از دستورات زیر استفاده کنید🔊
`/yes $from_id`
`/no $from_id`",
'parse_mode'=>"MarkDown"
	        ]));
	}
	
elseif (strpos($text,"/yes") !== false && $chat_id == $gp){
	    $text = explode(" ",$text);
	    $yes = $text['1'];
	    $http = file_get_contents("data/$yes/baner.txt");
	    if($text['1'] != " "){
	    save("data/$yes/mash.txt","0");
	    var_dump(makereq('sendmessage',[
    'chat_id'=>$ch,
    'text'=>"بنر کاربر $yes : 🔸
در ساعت $time و تاریخ $date باصل شد®",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$id
]));
var_dump(makereq('sendmessage',[
    'chat_id'=>$chtab,
    'text'=>$http,
'parse_mode'=>"HTML"
]));
SendMessage($chat_id,"بنر کاربر $yes توسط $from_id 🛵
در ساعت $time و تاریخ $date تایید شد🚅");	        
	    }
	    else{
	        SendMessage($chat_id,"کاربر یافت نشد 🚅");
	    }
    
}
elseif (strpos($text,"/no") !== false && $chat_id == $gp){
	    $text = explode(" ",$text);
	    if($text['1'] != " "){
	        $no = $text['1'];
     SendMessage($chat_id,"بنر کاربر ".$text['1']." توسط $from_id | `@$username` |🛵
در ساعت $time و تاریخ $date رد شد🚅");
SendMessage($text['1'],"بنر شما به دلایلی رد شد 🚗
با پشتیبانی در تماس باشید ✈️");
	    }else{
	        SendMessage($chat_id,"کاربر یافت نشد ⛑");
	        
	    }
    
}
	//*********************Baner**********
elseif (strpos($text,"/baner") !== false && $chat_id == $gp){
	    $text = explode(" ",$text);
	    if($text['1'] != " "){
	    $user = $text['1'];
	    save("data/$user/mash.txt","0");
	    var_dump(makereq('SendMessage',[
	        'chat_id'=>$gp,
	        'text'=>"کاربر $user توسط🌐 :
$from_id
@$username
در ساعت $time و تاریخ $time میتواند یک بنر اضافه بگیرید🚸",
'parse_mode'=>"HTML"
]));
	SendMessage($user,"هم اکنون میتوانید یک بنر دیگر بگیرید🈂");        
	    }
	    else{
	        SendMessage($chat_id,"یافت نشد🔇");
	    }
	           
	        }
//***************************del*******
	elseif (strpos($text,"/del") !== false && $chat_id == $gp){
	    $text = explode(" ",$text);
	    if($text['1'] != " "){
	        save("data/".$text['1']."/baner.txt","ثبت نشده⚠️");
	        SendMessage($gp,"بنر کاربر ".$text['1']." توسط🗳 :
`$from_id`
`@$username`
در ساعت $time و تاریخ $date حذف شد🌀");
	    SendMessage($text['1'],"بنر ثبت شده توسط شما ، توسط پشتیبانان به دلایلی حذف شد🗳
محتوای بنر خود را تغیر داده و دوباره آن را ثبت کنید♒️");
	        
	    }
	    else{
	        SendMessage($chat_id,"یافت نشد㊙️");
	    }
	}
	//*********************warn*********
	elseif (strpos($text,"/warn️") !== false && $chat_id == $gp) {
  $text = explode(" ",$text);
  if ($text['1'] != "") {
      $hora = file_get_contents("data/".$text['1']."/warn.txt");
      if($hora == "2"){
         SendMessage($chat_id,"کاربر".$text['1']."به دلیل داشتن دو اخطار به لیست سیاه افزوده شد⚠️");
          SendMessage($gp,"کاربر".$text['1']."قبلا یک اخطار دریافت کرده بود⭕️
هم اکنون نیز توسط :✴️
`$from_id`
`@$username`
یک اخطار دیگر دریافت کرد و به طور خودکار به لیست سیاه افزوده شد☣️");
$bban = $text['1'];
  $my = fopen("ban.txt", "a") or die("Unable to open file!"); 
fwrite($my,"$bban\n");
fclose($my);
      }
      else{
          SendMessage($text['1'],"شما از سوی پشتیبانان یک اخطار دریافت کردید🌐
در صورت داشتن اخطار دوم خودکار به لیست سیاه افزوده می‌شوید💱
رعایت کنید✳️");
SendMessage($gp,"کاربر".$text['1']." توسط💮 :
`$from_id`
`@$username`
یک اخطار دریافت کرد®");
save("data/".$text['1']."/warn.txt","2");
      }
  }
  else
  {
SendMessage($chat_id,"یافت نشد❗️");      
}
}
	//*******************ban**************
	elseif (strpos($text , "/ban️") !== false && $chat_id == $gp)
{
$bban = str_replace('/ban️','',$text);
if ($bban != '')
{
    $my2 = fopen("ban.txt", "a") or die("Unable to open file!"); 
fwrite($my2,"$bban\n");
fclose($my2);
SendMessage($chat_id,"کاربر $bban با موفقیت مسدود شد🍃");
SendMessage($gp,"🈂 کاربر $bban توسط :
`$from_id`
`@$username`
در ساعت $time و در تاریخ $date 🔺
در لیست سیاه قرار گرفت💢");
    
}
}
	//********************************
	
elseif($text == "/gid"){
    SendMessage($chat_id,$chat_id);
}
	//***********************
	//***********************

	elseif($text == "راهنما🎀"){
	    SendMessage($chat_id,"به ربات بنردهی و ثبت بنر خودکار خوش‌آمدید ➰
کدنویسی شده توسط :@Koshandew
شاید براتون سوال باشه که این ربات چیکار میکنه⁉️
این ربات برای شما بنر درست میکنه و ، وقتی بنر شما بازدیدش تکمیل شد اون رو توی دکمه ثبت بنر ارسال می‌کنید⭕️
بنر شما توسط ربات چک میشه✴️
اگر بنر شما به بازدید مورد نظر رسیده بود ربات خودکار اون رو توی کانال ثبت میکنه💮
و اینکه شما اگر یک بنر بگیرید حتما باید بنر خود تکمیل کرده و به ربات بفرستید تا در کانال ثبت شود💢
در غیر اینصورت ربات به شما بنر نمیده🔱");
	}
	//-----------------------------------
	elseif($text == "مشخصات من®"){
	    if($mash == "0"){
	        var_dump(makereq('sendmessage',[
	            'chat_id'=>$chat_id,
	            "text"=>"🈂 مشخصات شما در سرور ما : 
آیدی عددی: $from_id 🔺
نام کاربری : @$username 🔻
وضعیت شماره : تایید شده ✔️
وضعیت بنرگیری : شما می‌توانید بنر بگیرید 🔺
💤بنر شما : $baner ",
'parse_mode'=>"HTML"
	            ]));
	}	        else{
	    var_dump(makereq('sendmessage',[
	            'chat_id'=>$chat_id,
	            "text"=>"🈂 مشخصات شما در سرور ما : 
آیدی عددی: $from_id 🔺
نام کاربری : @$username 🔻
وضعیت شماره : تایید شده ✔️
وضعیت بنرگیری : شما قبلا یک بنر گرفته اید و برای گرفتن بنر دوم باید بنر قبلی را تکمیل کنید💱
💤بنر شما : $baner",
'parse_mode'=>"HTML"
]));
	    }
	    }
	    //************Support********************
	    //***************************************
	    elseif($text == "پشتیبانی🌀"){
	        if($posh == "0"){
	            save("data/$from_id/posh.txt","1");
	    var_dump(makereq('sendmessage',[
	        'chat_id'=>$gp,
	        'text'=>"درخواست پشتیبانی از طرف کاربر : 📍
`$from_id`
`@$username`
از دستورات زیر استفاده کنید📦
`/start $from_id`
`/reject $from_id`
`/baner $from_id`
`/ban $from_id`
`/del $from_id`",
	        'parse_mode'=>"MarkDown"
	        ]));
	       var_dump(makereq('sendmessage',[
	                'chat_id'=>$chat_id,
	                'text'=>"درخواست چت شما به پشتیبانان ارسال شد✴️
پس از تایید درخواست می‌توانید با پشتیبانان ارتباط برقرار کنید📦",
	                'parse_mode'=>"HTML"
	                ]));
	    }else{
	    SendMessage($chat_id,"شما قبلا یکبار درخواست پشتیبانی کرده اید🔺
صبر کنید تا درخواست قبلی شما تایید شود 🚿 ");
	        
	    }
	    }
	    elseif($text == "پایان گفتگو 🚒" && $step == "pm" && $pm == "yes"){
    save("data/$from_id/step.txt","none");
    save("data/$from_id/pm.txt","no");
    save("data/$from_id/posh.txt","0");
    var_dump(makereq('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"به درخواست خودتون این گفتگو پایان یافت📦

به منوی اصلی برگشتیم 🈂",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
   'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
    ])
        ]));
   var_dump(makereq('sendmessage',[
       'chat_id'=>$gp,
       'text'=>"گفتگوی کاربر @$username توسط خودش به پایان رسید ✈️",
'parse_mode'=>"HTML"
       ]));
}
elseif(strpos($text,"/reject") !== false && $chat_id == $gp){
    $text = explode(" ",$text);
    $yee = $text['1'];
    if($yee != " "){
 save("data/$yee/posh.txt","0");  
 SendMessage($gp,"درخواست پشتیبانی کاربر $yee توسط $from_id رد شد 🛵");
 SendMessage($yee,"متاسفانه درخواست پشتیبانی شما رد شد 🚅
شما می‌توانید دوباره درخواست پشتیبانی بدهید 🎗");
    }else{
SendMessage($chat_id,"کاربر یافت نشد ✈️️");
    }
}
elseif($text == "end" && $reply != null && $chat_id == $gp){
    save("data/$reply/step.txt","none");
    save("data/$reply/pm.txt","no");
    save("data/$reply/posh.txt","0");
    SendMessage($chat_id,"✈️ گفتگو کاربر $reply توسط : 
`$from_id`
`@$username`
پایان یافت ⛑");
var_dump(makereq('sendmessage',[
        'chat_id'=>$reply,
        'text'=>"این گفتگو توسط پشتیبانی پایان یافت 🥁

به منوی اصلی برگشتیم ✈️",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
   'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
    ])
        ]));
}
elseif($text == "ban" && $reply != null && $chat_id == $gp){
$my2 = fopen("ban.txt", "a") or die("Unable to open file!"); 
fwrite($my2,"$reply\n");
fclose($my2);    
SendMessage($chat_id,"کاربر $reply توسط $from_id در لیست سیاه قرار گرفت 🥁");
SendMessage($reply,"شما در لیست سیاه قرار گرفتید 🚅");
}
	elseif (strpos($text,"/start") !== false && $chat_id == $gp){
	    $text = explode(" ",$text);
	    $sup = $text['1'];
	    if($text['1'] != " "){
	        save("data/$sup/posh.txt","0");
	        save("data/$sup/step.txt","pm");
	        save("data/$sup/pm.txt","yes");
	        SendMessage($gp,"$from_id درخواست پشتیبانی $sub را قبول کرد🛵");
	     var_dump(makereq('sendmessage',[
        'chat_id'=>$sup,
        'text'=>"درخواست پشتیبانی شما قبول شد گفتگو را آغاز کنید🚗",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
   'keyboard'=>[
             [
        ['text'=>"پایان گفتگو 🚒"]
        ]
        
        
            ],
            'resize_keyboard'=>true
    ])
        ]));
	    }
	    else{
	        SendMessage($chat_id,"کاربر یافت نشد ✈️️");
	    }
	}
	//************
    elseif($reply != null && $chat_id == $gp){
        if($text){
    var_dump(makereq('sendMessage',[
    'chat_id'=>$reply,
    'text'=>"پشتیبان 🥁 :   $text",
    'parse_mode'=>'html'
  ]));
    SendMessage($chat_id,"به کاربر $reply ارسال شد🎒");
}else{
    SendMessage($chat_id,"فقط متن❗️");
}
}
elseif($step == "pm" && $pm == "yes" && $chat_id != $gp){
    if($text){
    $zon = $update->message->message_id;
          Forward($gp,$chat_id,$zon);
          var_dump(makereq('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"پیام شما به پشتیبانی ارسال شد 🚲",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
   'keyboard'=>[
             [
        ['text'=>"پایان گفتگو 🚒"]
        ]
        
        
            ],
            'resize_keyboard'=>true
    ])
        ]));
}
else
{
    SendMessage($chat_id,"فقط متن 🎗");
}
}
//***********************************
	    //********************************
	    elseif($text == "حذف بنر🔸"){
	        var_dump(makereq('SendMessage',[
	            'chat_id'=>$chat_id,
	            'text'=>"مطمعنی میخوای این کار رو انجام بدی؟ ㊙️
⚠️بنر شما : $baner",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
    'keyboard'=>[
        [
            ['text'=>"مطمعنم🚿"],['text'=>"منصرف شدم🕯"]
            ],
            [
            ['text'=>"برگشت🗑"]
        ]
        ],
        'resize_keyboard'=>true
    ])
	            ]));
	            save("data/$from_id/step.txt","del");
	    }
	    elseif($text == "مطمعنم🚿" && $step == "del"){
	        save("data/$from_id/step.txt","none");
	        save("data/$from_id/baner.txt","ثبت نشده⚠️");
	        var_dump(makereq('sendmessage',[
	            'chat_id'=>$chat_id,
	            'text'=>"🕯وضعیت بنر شما تغیر کرد به >> ثبت نشده⚠️

به منوی اصلی برگشتیم🈂",
'parse_mode'=>MarkDown,
'reply_markup'=>json_encode([
    'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
	            ])
	            ]));
	    }
	    elseif($text == "منصرف شدم🕯" && $step == "del"){
	        save("data/$from_id/step.txt","none");
	         var_dump(makereq('sendmessage',[
	            'chat_id'=>$chat_id,
	            'text'=>"بنا به درخواست خودتون عملیات لغو شد🌐

به منوی اصلی برگشتیم🌀",
'parse_mode'=>MarkDown,
'reply_markup'=>json_encode([
    'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
	            ])
	            ]));
	    }
	    //************************************
	    elseif($text == "ثبت بنر🈂"){
	        var_dump(makereq('sendmessage',[
	        'chat_id'=>$chat_id,
	        'text'=>"بنر تبلیغاتی خود را ارسال کنید☣️",
	        'parse_mode'=>"MarkDown",
	        'reply_markup'=>json_encode([
	            'keyboard'=>[
	                    [
	                        ['text'=>"برگشت🗑"]
	                        ]
	                ],
	                'resize_keyboard'=>true
	            ])
	        ]));
	        save("data/$from_id/step.txt","pin");
	    }
	    elseif($step == "pin"){
	        save("data/$from_id/step.txt","none");
	        save("data/$from_id/baner.txt",$text);
	        var_dump(makereq('sendmessage',[
	            'chat_id'=>$chat_id,
	            'text'=>"بنر شما ثبت شد♒️
بنر شما : $text 🔸",
'parse_mode'=>"HTML"
	            ]));
	            if($username == null){
	              var_dump(makereq('sendmessage',[
	        'chat_id'=>$gp,
	        'text'=>"کاربری با مشخصات® :
`$from_id`
نام کاربری ندارد⚠️
یک بنر در پنل مدیریت خود ثبت کرد🔻
🗳متن بنر : $text
از دستورات زیر استفاده کنید 🚗
`/del $from_id`
`/ban $from_id`
`/warn $from_id`",
'parse_mode'=>"MarkDown"
	        ]));   
	            }
	            else{
	    var_dump(makereq('sendmessage',[
	        'chat_id'=>$gp,
	        'text'=>"کاربری با مشخصات® :
`$from_id`
`@$username`
یک بنر در پنل مدیریت خود ثبت کرد🔻
🗳متن بنر : $text
از دستورات زیر استفاده کنید 🚗
`/del $from_id`
`/ban $from_id`
`/warn $from_id`",
'parse_mode'=>"MarkDown"
	        ]));
	        
	    }
	    }
	//---------------------------------baner----
	//*****************

	//**********************************

	//---------------------------------
	elseif($text == "دریافت بنر⚱️"){
	    var_dump(makereq('sendmessage',[
	        'chat_id'=>$chat_id,
	        'text'=>"یکی از زیر شاخه های زیر را انتخاب کنید🕯",
	        'parse_mode'=>"MarkDown",
	        'reply_markup'=>json_encode([
	            'keyboard'=>[
	                [
	                    ['text'=>"گروه لیستی🌐"],['text'=>"گروه تکی🌀"]
	                    ],
	                    [
	                        ['text'=>"کانال💱"],['text'=>"کانال با عکس➰"]
	                        ],
	                        [
	                            ['text'=>"چالش با عکس🎵"],['text'=>"چالش 🗞"]
	                            ],
	                            [
	                            ['text'=>"برگشت🗑"]
	                ]
	                ],
	                'resize_keyboard'=>true
	            ])
	        ]));
	}
	//-----------------------------------
	//***************************************
elseif($text == "چالش با عکس🎵") {
SendMessage($chat_id,"این دکمه و دکمه | کانال با عکس➰ |ّزودی تکمیل می‌شود 🚒");
}
elseif($text == "کانال با عکس➰"){
    SendMessage($chat_id,"این دکمه و دکمه | چالش با عکس🎵 |بزودی تکمیل می‌شود 🥁");
}
	//*******************************************
elseif($text == "گروه لیستی🌐"){
    if($mash == "0"){
    save("data/$from_id/step.txt","gplist");
    var_dump(makereq('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"باید یک بنر رو 40 بازدید بزنی ⛑ ادامه میدی؟ 🎮",
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
            'keyboard'=>[
                [
                    ['text'=>"ادامه میدم 🎗"]
                    ],
                    [
                        ['text'=>"نه بیخیال ✈️"]
                        ]
                ],
                'resize_keyboard'=>true
            ])
        ]));
}
else{
    SendMessage($chat_id,"متاسفم 🚲
شما قبلا یک بنر $type گرفته اید و هنوز آن را تکمیل نکرده‌اید✈️
پس از تکمیل بنر می‌توانید مجددا بنر بگیر🛵
یا با پشتیبانی در تماس باشید🚅");
}
}
elseif($text == "ادامه میدم 🎗" && $step == "gplist"){
$to_channel = json_decode(urldecode(file_get_contents(bot.'sendmessage?parse_mode=HTMl&chat_id='.$ch.'&text='.$textpm)))->result->message_id; file_get_contents(bot.'forwardMessage?chat_id='.$chat_id.'&from_chat_id='.$ch.'&message_id='.$to_channel);
save("data/$from_id/step.txt","none");
save("data/$from_id/type.txt","گروه لیستی - 40");
save("data/$from_id/mash.txt","1");
save("data/$from_id/msg.txt","$to_channel");
  var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"بنر شما با موفقیت ساخته شد 🎗 شما باید این بنر را 40 بازدید بزنید 🚒

به منوی اصلی برگشتیم ✈️",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
        ])
    ]));
}
	//-----------------------------------
	elseif($text == "گروه تکی🌀"){
	    if($mash == "0"){
	         save("data/$from_id/step.txt","gp");
    var_dump(makereq('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"باید یک بنر رو 50 بازدید بزنی ⛑
ادامه میدی؟ 🛵",
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
            'keyboard'=>[
                [
                    ['text'=>"حله 🚲"]
                    ],
                    [
                        ['text'=>"نه بیخیال ✈️"]
                        ]
                ],
                'resize_keyboard'=>true
            ])
        ])); 
	}else{
SendMessage($chat_id,"متاسفم 🚲
شما قبلا یک بنر $type گرفته اید و هنوز آن را تکمیل نکرده‌اید✈️
پس از تکمیل بنر می‌توانید مجددا بنر بگیر🛵
یا با پشتیبانی در تماس باشید🚅");
	}
	}
	elseif($text == "حله 🚲" && $step == "gp"){
$to_channel = json_decode(urldecode(file_get_contents(bot.'sendmessage?parse_mode=HTMl&chat_id='.$ch.'&text='.$textpm)))->result->message_id; file_get_contents(bot.'forwardMessage?chat_id='.$chat_id.'&from_chat_id='.$ch.'&message_id='.$to_channel);
save("data/$from_id/step.txt","none");
save("data/$from_id/type.txt","گروه لیستی - 40");
save("data/$from_id/mash.txt","1");
save("data/$from_id/msg.txt","$to_channel");
  var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"بنر شما با موفقیت ساخته شد 🎗 شما باید این بنر را 40 بازدید بزنید 🚒

به منوی اصلی برگشتیم ✈️",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
        ])
    ]));
	}
	elseif($text == "کانال💱"){
	    if($mash == "0"){
	        	         save("data/$from_id/step.txt","ch");
    var_dump(makereq('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"باید یک بنر رو 50 بازدید بزنی🚀 ادامه میدی؟ 🖲",
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
            'keyboard'=>[
                [
                    ['text'=>"اوکیه 🚀"]
                    ],
                    [
                        ['text'=>"نه بیخیال ✈️"]
                        ]
                ],
                'resize_keyboard'=>true
            ])
        ])); 
	}else{
	    SendMessage($chat_id,"متاسفم 🚲
شما قبلا یک بنر $type گرفته اید و هنوز آن را تکمیل نکرده‌اید✈️
پس از تکمیل بنر می‌توانید مجددا بنر بگیر🛵
یا با پشتیبانی در تماس باشید🚅");
	}
	}
	elseif($text == "اوکیه 🚀" && $step == "ch"){
	    $to_channel = json_decode(urldecode(file_get_contents(bot.'sendmessage?parse_mode=HTMl&chat_id='.$ch.'&text='.$textpm)))->result->message_id; file_get_contents(bot.'forwardMessage?chat_id='.$chat_id.'&from_chat_id='.$ch.'&message_id='.$to_channel);
save("data/$from_id/step.txt","none");
save("data/$from_id/type.txt","کانال - 50");
save("data/$from_id/mash.txt","1");
save("data/$from_id/msg.txt","$to_channel");
 var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"بنر شما با موفقیت ساخته شد شما باید این بنر را 50 بازدید بزنید 🚀

به منوی اصلی برگشتیم ✈️",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
        ])
    ]));
	}
	elseif($text == "چالش 🗞"){
	    if($mash == "0"){
	    save("data/$from_id/step.txt","chalesh");
	var_dump(makereq('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"باید یک بنر رو 100 بازدید بزنی 🥁 ادامه میدی ؟ 🚗",
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
            'keyboard'=>[
                [
                    ['text'=>"قبول دارم 🎗"]
                    ],
                    [
                        ['text'=>"نه بیخیال ✈️"]
                        ]
                ],
                'resize_keyboard'=>true
            ])
        ])); 
	        
	    }else{
		    SendMessage($chat_id,"متاسفم 🚲
شما قبلا یک بنر $type گرفته اید و هنوز آن را تکمیل نکرده‌اید✈️
پس از تکمیل بنر می‌توانید مجددا بنر بگیر🛵
یا با پشتیبانی در تماس باشید🚅");
	}
	}
elseif($text == "قبول دارم 🎗" && $step == "chalesh"){
     $to_channel = json_decode(urldecode(file_get_contents(bot.'sendmessage?parse_mode=HTMl&chat_id='.$ch.'&text='.$textpm)))->result->message_id; file_get_contents(bot.'forwardMessage?chat_id='.$chat_id.'&from_chat_id='.$ch.'&message_id='.$to_channel);
save("data/$from_id/step.txt","none");
save("data/$from_id/type.txt","چالش - 100");
save("data/$from_id/mash.txt","1");
save("data/$from_id/msg.txt","$to_channel");
 var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"بنر شما با موفقیت ساخته شد 🚲 شما باید این بنر 100 بازدید بزنید 🚒

به منوی اصلی برگشتید ✈️️",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
             [
        ['text'=>"ارسال بنر🔊"],['text'=>"دریافت بنر⚱️"]
        ],
[
['text'=>"حذف بنر🔸"],['text'=>"ثبت بنر🈂"]
],
        [
            ['text'=>"مشخصات من®"]
            ],
            [
                ['text'=>"راهنما🎀"],['text'=>"پشتیبانی🌀"]
                ]
        
        
            ],
            'resize_keyboard'=>true
        ])
    ]));
}
//*******************************
  else{
      SendMessage($chat_id,"");
  }
  	
	?>
