<?php

App::uses('SchemaSuite', 'SchemaSuite');


class AppTestCase extends CakeTestCase{
  /*
  * @description: checks flash message
  */
  public function assertFlash($message){
      $this->assertEquals($message,CakeSession::read("Message.flash.message"),"Failed asserting that flash message is $message.");
  }

  public function assertFlashEmpty(){
      $this->assertTrue(empty(CakeSession::read("Message.flash.message")),"Failed asserting that flash message is empty.");
  }

  public function setLoginWithRole($role_id){
    $auth = SchemaSuite::getFixture('users',["user_role_id"=>$role_id]);
    CakeSession::write('Auth.User', $auth);
  }

  public function ClearSession(){
    CakeSession::destroy();
  }
}
