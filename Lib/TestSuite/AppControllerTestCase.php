<?php

class AppControllerTestCase extends ControllerTestCase {
    /*
     * @description: checks flash message
     */

    public function assertFlash($message) {
        $this->assertEquals($message, CakeSession::read("Message.flash.message"), "Failed asserting that flash message is $message.");
    }

    public function assertFlashEmpty() {
        $this->assertTrue(empty(CakeSession::read("Message.flash.message")), "Failed asserting that flash message is empty.");
    }

    public function assertRedirectTo($url) {
        if (isset($this->headers['Location'])) {
            $this->assertContains($url, $this->headers['Location'], "Failed asserting that redirect is to $url.");
        } else {
            $this->assertTrue(false, 'No redirect avaliable');
        }
    }

    public function assertNotRedirectTo($url) {
        $this->assertNotContains($url, $this->headers['Location'], "Failed asserting that redirect is not to $url.");
    }

    public function assertHasRedirect() {
        $this->assertTrue(isset($this->headers['Location']), 'Failed asserting that redirect is false.');
    }

    public function assertHasNoRedirect() {
        $this->assertTrue(!isset($this->headers['Location']), 'Failed asserting that redirect is false.');
    }

    public function assertMandatory($vars, $field) {
        $check = count(Hash::extract($vars, "{n}.$field")) === count($vars);

        $this->assertTrue($check, "Failed assserting mandatory field $field true");
    }

    public function setLoginWithRole($role_id) {
        CakeSession::write('Auth.User', SchemaSuite::getFixture('users', ["user_role_id" => $role_id]));
    }

    public function ClearFlash() {
        CakeSession::write('Message.flash', array());
    }

    public function ClearSession() {
        CakeSession::destroy();
    }

    public function tearDown() {
        CakeSession::destroy();
        parent::tearDown();
    }

}
