

<?php
// App::Uses("JWT","Vendor/firebase");
App::import('Vendor', 'JWT', array('file' => 'firebase/php-jwt/src' . DS . 'JWT.php'));

class MolpayComponent extends Component
{
    public $merchantID = "unitar_Dev";
    public $domain=	"unitar.my";
    public $verifykey = "ea4edf0d662f84f726ac033fb33d8da3";

    public function vcode($amount,$orderid){

      $vcode = md5($amount.$this->merchantID.$orderid.$this->verifykey);
      // output of the vcode based on above information equals to :
      // $vcode = "ec7f2c6e85769728a5e9b75893ee6bc1";
      return $vcode;
    }
    
    public function sKey(){

      $vkey =$this->verifykey ;  //Replace  xxxxxxxxxx with your MOLPay Verify Key
    /******************************** *Don't change below parameters ********************************/
      extract($this->request->data);

    /** To verify the data integrity sending by MOLPay ************************************************************/
      $key0 = md5($tranID.$orderid.$status.$merchant.$amount.$currency);
      $key1 = md5($paydate.$domain.$key0.$appcode.$vkey);
    //key1 : Security key generated on Merchant system
      return ($skey === $key1);

    }

    public function setupPayment($amount, $bill_name,$order_id, $email, $mobile, $description, $country){
        
        $opt = [
          'amount'=>urlencode($amount),
          'orderid'=>urlencode($order_id),
          'bill_name'=>$bill_name,
          'bill_email'=>$email,
          'bill_mobile'=>urlencode($mobile),
          "bill_desc"=>$description,
          "country"=>urlencode($country),
          "vcode"=>$this->vcode($amount,$order_id),
          "currency" => "MYR"
      ];
        $get = http_build_query($opt);
        $merchantID = $this->merchantID;

        $url = Router::url("https://www.onlinepayment.com.my/MOLPay/pay/$merchantID/?$get");
        $opt['url']=$url;
        CakeSession::write('Molpay', $opt);
        return $url;
    }
    private function checkKey($key,$value){
      return CakeSession::read("Molpay.$key")==urlencode($value);
    }
    public function encrypt($data){
          return \Firebase\JWT\JWT::encode($data,'1d4595be063fd0120761e516ff6084e54c4998a2', 'HS256');
    }
    public function decrypt($string){
          return \Firebase\JWT\JWT::decode($string, '1d4595be063fd0120761e516ff6084e54c4998a2', array('HS256'));
    }
    
    public function recvPayment($data=null){
      $vkey =$this->verifykey;
        if(empty($data)){
            extract($this->request->data);
        }else{
            extract($data);
        }
      //Replace  xxxxxxxxxxxx  with your MOLPay Verify Key
    /******************************** *Don't change below parameters ********************************/
    // $tranID = $orderid = $status = $domain = $amount = $currency = $appcode = $paydate = $skey =
    // $_POST['tranID'];
    //         $_POST['orderid'];
    //         $_POST['status'];
    //         $_POST['domain'];
    //         $_POST['amount'];
    //         $_POST['currency'];
    //         $_POST['appcode'];
    //         $_POST['paydate'];
    //         $_POST['skey'];
      
        /* To verify the data integrity sending by MOLPay ************************************************************/
        $key0 = md5($tranID.$orderid.$status.$domain.$amount.$currency);
        $key1 = md5($paydate.$domain.$key0.$appcode.$vkey);

    // Merchant might issue a requery to MOLPay to double check payment status with MOLPay.

        return (
          $skey != $key1 ||
          $status != "00" ||
          !$this->checkKey('orderid',$orderid)||
          !$this->checkKey('amount',$amount)
        );

    }
}