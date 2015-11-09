<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel 5');
    }

    public function testLoginPage()
    {
        $this->visit(route('auth.login'))
            ->see('Login');
    }

    public function testUserWithoutAccessToResource()
    {
        $this->unlogged();
        $this->visit('/resource')
            ->seePageIs(route('auth.login'))
            ->see('Login')
            ->dontSee('Logout');
    }

    public function testUserWithAccessToResource()
    {
        $this->logged();
        $this->visit('/resource')
        ->seePageIs('/resource');
    }

    public function unlogged(){
        Session::set('authenticated', false);
    }

    public function logged() {
        Session::set('authenticated', true);
    }

    public function testLoginPageHaveRegisterLinkAndWorksOk() {
        $this->visit('/login')
            ->click('register')
            ->seePageIs('/register');
    }

    public function testPostLoginOk(){
        $this->vist('/login')
            ->type('germangalia@iesebre.com','email')
            ->type('1234','password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }

    public function testPostLoginNotOk(){
        $this->vist('/login')
            ->type('germangalia@iesebre.com','email')
            ->type('1234','password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/login');
    }
}
