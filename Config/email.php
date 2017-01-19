<?php
/**
 * This is email configuration file.
 *
 * Use it to configure email transports of Cake.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 */

/**
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *		Mail		- Send using PHP mail function
 *		Smtp		- Send using SMTP
 *		Debug		- Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'you@localhost',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		 'transport' => 'Smtp',
		 'from' => array('admin.unieccampus@unitar.my' => 'Administrator Unieccampus'),
		 'host' => '172.17.17.29',
		 'port' => 25,
		 'timeout' => 30,
		 // 'username' => 'faliqfadlullah@gmail.com',
		 // 'password' => '',
		 'client' => null,
		 'log' => false,
		 'charset' => 'utf-8',
		 'headerCharset' => 'utf-8',
		 );

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $gmail = array(
		 'transport' => 'Smtp',
		 'from' => array('uniecampus2015@gmail.com' => 'Administrator Unieccampus'),
		 'host' => 'ssl://smtp.gmail.com',
		 'port' => 465,
		 'username' => 'uniecampus2015@gmail.com',
		 'password' => 'unitar1234',
		 'transport' => 'Smtp',
		 'timeout' => '30',
		'context' => [
		 'ssl' => [
		 'verify_peer' => false,
		 'verify_peer_name' => false,
		 'allow_self_signed' => true
		 ]
		 ]
		 );

}
