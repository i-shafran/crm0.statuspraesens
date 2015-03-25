<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H6';

$current_user_parent_role_seq='H1::H2::H3::H4::H5::H6';

$current_user_profiles=array(2,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'18'=>0,'19'=>0,'20'=>0,'21'=>0,'22'=>0,'23'=>0,'24'=>0,'25'=>0,'26'=>0,'27'=>0,'30'=>1,'32'=>0,'33'=>0,'34'=>0,'35'=>0,'36'=>0,'37'=>0,'38'=>0,'39'=>0,'40'=>0,'41'=>0,'42'=>0,'44'=>0,'45'=>0,'46'=>0,'47'=>0,'48'=>0,'49'=>0,'50'=>0,'51'=>0,'52'=>0,'53'=>0,'54'=>0,'55'=>0,'56'=>0,'57'=>0,'58'=>0,'59'=>0,'60'=>0,'61'=>0,'62'=>0,'63'=>0,'64'=>0,'28'=>0,);

$profileActionPermission=array(2=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,8=>0,10=>0,),4=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,8=>0,10=>0,),6=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,8=>0,9=>0,10=>0,),8=>array(0=>0,1=>0,2=>0,3=>0,4=>0,6=>1,),9=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),13=>array(0=>1,1=>1,2=>1,3=>0,4=>0,5=>1,6=>1,8=>0,10=>0,),14=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,10=>0,),15=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),16=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),18=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,10=>0,),19=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),20=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,),21=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,),22=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,),23=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,),26=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),38=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),39=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),40=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,8=>1,),46=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),47=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),48=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),49=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),50=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),52=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),53=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),55=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),59=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),60=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),62=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),);

$current_user_groups=array(3,4,2,);

$subordinate_roles=array('H7','H8','H9',);

$parent_roles=array('H1','H2','H3','H4','H5',);

$subordinate_roles_users=array('H7'=>array(29,31,40,42,44,46,51,60,),'H8'=>array(37,),'H9'=>array(28,),);

$user_info=array('user_name'=>'ip','is_admin'=>'off','user_password'=>'$1$ip000000$yo59aHJChh3/iFMBtotBD.','confirm_password'=>'$1$ip000000$yo59aHJChh3/iFMBtotBD.','first_name'=>'Ирина','last_name'=>'Панкращенко','roleid'=>'H6','email1'=>'ip@praesens.ru','status'=>'Active','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'00:00','title'=>'Менеджер отдела по взаимодействию с компаниями','phone_work'=>'','department'=>'ОВХ','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'dd-mm-yyyy','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'oWIKVwU1Xf9ibw1i','time_zone'=>'Europe/Moscow','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>'','currency_symbol_placement'=>'1.0$','imagename'=>'','internal_mailer'=>'1','theme'=>'woodspice','language'=>'ru_ru','reminder_interval'=>'1 Minute','asterisk_extension'=>'215','use_asterisk'=>'1','currency_name'=>'Russia, Rubles','currency_code'=>'RUB','currency_symbol'=>'руб','conv_rate'=>'1.00000','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'1','dayoftheweek'=>'Monday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','record_id'=>'','record_module'=>'','id'=>'47');
?>