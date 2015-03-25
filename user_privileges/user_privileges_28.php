<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H9';

$current_user_parent_role_seq='H1::H2::H3::H4::H5::H6::H7::H9';

$current_user_profiles=array(7,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>1,'2'=>1,'4'=>0,'6'=>1,'7'=>0,'8'=>1,'9'=>1,'10'=>1,'13'=>1,'14'=>1,'15'=>1,'16'=>1,'18'=>1,'19'=>1,'20'=>1,'21'=>1,'22'=>1,'23'=>1,'24'=>1,'25'=>1,'26'=>1,'27'=>1,'30'=>1,'32'=>1,'33'=>1,'34'=>1,'35'=>1,'36'=>1,'37'=>1,'38'=>1,'39'=>1,'40'=>0,'41'=>1,'42'=>1,'44'=>1,'45'=>1,'46'=>1,'47'=>1,'48'=>1,'49'=>1,'50'=>1,'51'=>1,'52'=>1,'53'=>1,'54'=>1,'55'=>1,'56'=>1,'57'=>1,'58'=>1,'59'=>0,'60'=>0,'61'=>0,'62'=>0,'63'=>0,'64'=>0,'65'=>0,'66'=>0,'28'=>1,'3'=>0,);

$profileActionPermission=array(2=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,8=>0,10=>0,),4=>array(0=>0,1=>0,2=>1,3=>0,4=>0,5=>1,6=>1,8=>0,10=>0,),6=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>1,6=>1,8=>0,9=>1,10=>0,),8=>array(0=>1,1=>1,2=>1,3=>1,4=>1,6=>0,),9=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,),13=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,8=>0,10=>0,),14=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,10=>0,),15=>array(0=>1,1=>1,2=>1,3=>1,4=>1,),16=>array(0=>1,1=>1,2=>1,3=>1,4=>1,),18=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,10=>0,),19=>array(0=>1,1=>1,2=>1,3=>1,4=>1,),20=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,),21=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,),22=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,),23=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>0,6=>0,),26=>array(0=>1,1=>1,2=>1,3=>1,4=>1,),38=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),39=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),40=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,8=>0,12=>0,13=>0,),46=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),47=>array(0=>1,1=>1,2=>1,3=>1,4=>1,),48=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),49=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),50=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),52=>array(0=>1,1=>1,2=>1,3=>1,4=>1,),53=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),55=>array(0=>1,1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,10=>1,),59=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),60=>array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,10=>0,),62=>array(0=>0,1=>0,2=>0,3=>0,4=>0,),25=>array(6=>0,11=>0,),);

$current_user_groups=array(3,4,2,);

$subordinate_roles=array();

$parent_roles=array('H1','H2','H3','H4','H5','H6','H7',);

$subordinate_roles_users=array();

$user_info=array('user_name'=>'yg','is_admin'=>'off','user_password'=>'$1$yg000000$Qk0caotgX5yDPYnPaJnk/0','confirm_password'=>'$1$yg000000$Qk0caotgX5yDPYnPaJnk/0','first_name'=>'Юлия','last_name'=>'Герт','roleid'=>'H9','email1'=>'lasunya@rambler.ru','status'=>'Active','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'00:00','title'=>'','phone_work'=>'79636766722','department'=>'','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'dd-mm-yyyy','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'uXC3JBX1a5b8Bvp','time_zone'=>'Europe/Moscow','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>'&#039;','currency_symbol_placement'=>'1.0$','imagename'=>'','internal_mailer'=>'1','theme'=>'softed','language'=>'ru_ru','reminder_interval'=>'1 Minute','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'1','dayoftheweek'=>'Monday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'medium','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','phone_crm_extension'=>'','is_owner'=>'','currency_name'=>'Russia, Rubles','currency_code'=>'RUB','currency_symbol'=>'руб','conv_rate'=>'1.00000','record_id'=>'','record_module'=>'','id'=>'28');
?>