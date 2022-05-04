#!/usr/bin/env php
<?php
$salt = array(
    'r1d' => 'A2E371B0-B34B-48A5-8C40-A7133F3B5D88',
    'others' => '6d2df50a-250f-4a30-a5e6-d44fb0960aa0',
);

function get_salt($sn)
{
    global $salt;
    if (false === strpos($sn, '/')) {
        return $salt['r1d'];
    } else {
        return $salt['others'];
    }
}

function calc_passwd($sn)
{
    return substr(md5($sn . get_salt($sn)), 0, 8);
}

isset($argv[1]) or die("Usage: $argv[0] <SN>\n");
$sn = $argv[1];
$password = calc_passwd($sn);
print("Telnet password: $password\n");
