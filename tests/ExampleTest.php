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
             ->see('Hello');
    }

    /**
     * Check login page
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit(route('auth.login'))
             ->see('LOGIN');
    }

    /**
     * Check that a user without access go to login page
     *
     * @return void
     */
    public function testUserWithoutAccessToResource()
    {
        $this->unlogged();
        $this->visit('/resource')
            ->seePageIs(route('auth.login'))
            ->see('Login')
            ->dontSee('Logout');
             //->seePageIs('/login');
    }

    /**
     * Check that a user with access go to resource
     *
     * @return void
     */
    public function etestUserWithAccessToResource()
    {
        $this->logged();
        $this->visit('/resource')
             ->seePageIs('/resource');
    }

    private function logged()
    {
        //Session::set('authenticated',true);
        Auth::loginUsingId(1);
    }

    private function unlogged()
    {
        //Session::set('authenticated',false);
        Auth::logout();
    }

    /**
     * bla bla bla
     *
     * @return void
     */
    public function etestLoginPageHaveRegisterLinkAndWorksOk()
    {
        $this->visit('/login')
            ->click('register')
            ->seePageIs('/register');
    }

    public function etestPostLoginOk(){
        $this->visit('/login')
            ->type('pepitapalotes@gmail.com', 'email')
            ->type('123456', 'password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }

    public function etestPostLoginNotOk(){
        $this->visit('/login')
            ->type('sergiturbadenas@gmail.com', 'email')
            ->type('123456', 'password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/login');
    }

}
