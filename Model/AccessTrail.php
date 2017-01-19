<?php

App::uses('AppModel', 'Model');

/**
 * AccessTrail Model
 *
 * @property User $User
 */
class AccessTrail extends AppModel {

    public function createAudit($user_id, $user_role, $referer, $url) {
        $ipaddress = $this->getIP();
        $user_os = $this->getOS();
        $user_browser = $this->getBrowser();
        $this->create();
        $data['AccessTrail'] = [
            'user_id' => $user_id,
            'user_role_id' => $user_role,
            'ip' => $ipaddress,
            'url' => $url,
            'browser' => $user_browser,
            'os' => $user_os,
            'referer' => $referer,
        ];
        return $this->save($data);
    }

    public function getIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_CLIENT_IP'])) { // check for shared internet/ISP IP
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { // check for IPs passing through proxies
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) { // check if multiple ips exist in var
                $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                foreach ($iplist as $ip) {
                    if ($this->validate_ip($ip)) {
                        return $ip;
                    }
                }
            } else {
                if ($this->validate_ip($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    return $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
            }
        } else if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED'])) {
            return $_SERVER['HTTP_X_FORWARDED'];
        } else if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED'])) {
            return $_SERVER['HTTP_FORWARDED'];
        } else {
            return $_SERVER['REMOTE_ADDR']; // return unreliable ip since all else failed
        }
    }

    public function validate_ip($ip) {  // Ensures an ip address is both a valid IP and does not fall within a private network range.
        if (strtolower($ip) === 'unknown') {
            return false;
        } else {
            $ip = ip2long($ip);  // generate ipv4 network address
        }
        if ($ip !== false && $ip !== -1) { // if the ip is set and not equivalent to 255.255.255.255
            // make sure to get unsigned long representation of ip
            // due to discrepancies between 32 and 64 bit OSes and
            // signed numbers (ints default to signed in PHP)
            $ip = sprintf('%u', $ip);
            if (($ip >= 0 && $ip <= 50331647) || ($ip >= 167772160 && $ip <= 184549375) || ($ip >= 2130706432 && $ip <= 2147483647) || ($ip >= 2851995648 && $ip <= 2852061183) || ($ip >= 2886729728 && $ip <= 2887778303) || ($ip >= 3221225984 && $ip <= 3221226239) || ($ip >= 3232235520 && $ip <= 3232301055) || ($ip >= 4294967040)) { // do private network range checking
                return false;
            }
        }
        return true;
    }

    public function getOS() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS Platform";
        $os_array = array('/windows nt 10/i' => 'Windows 10', '/windows nt 6.3/i' => 'Windows 8.1', '/windows nt 6.2/i' => 'Windows 8', '/windows nt 6.1/i' => 'Windows 7', '/windows nt 6.0/i' => 'Windows Vista', '/windows nt 5.2/i' => 'Windows Server 2003/XP x64', '/windows nt 5.1/i' => 'Windows XP', '/windows xp/i' => 'Windows XP', '/windows nt 5.0/i' => 'Windows 2000', '/windows me/i' => 'Windows ME', '/win98/i' => 'Windows 98', '/win95/i' => 'Windows 95', '/win16/i' => 'Windows 3.11', '/macintosh|mac os x/i' => 'Mac OS X', '/mac_powerpc/i' => 'Mac OS 9', '/linux/i' => 'Linux', '/ubuntu/i' => 'Ubuntu', '/iphone/i' => 'iPhone', '/ipod/i' => 'iPod', '/ipad/i' => 'iPad', '/android/i' => 'Android', '/blackberry/i' => 'BlackBerry', '/webos/i' => 'Mobile');
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }
        return $os_platform;
    }

    public function getBrowser() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "Unknown Browser";
        $browser_array = array('/msie/i' => 'Internet Explorer', '/firefox/i' => 'Firefox', '/safari/i' => 'Safari', '/chrome/i' => 'Chrome', '/opera/i' => 'Opera', '/netscape/i' => 'Netscape', '/maxthon/i' => 'Maxthon', '/konqueror/i' => 'Konqueror', '/mobile/i' => 'Handheld Browser');
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }
        return $browser;
    }

}
