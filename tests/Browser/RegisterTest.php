<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testRegister(): void
    {
        $this->browse(callback: function (Browser $browser): void {

            $browser->visit(url: '/')
                    ->assertSee(text: 'Modul 3')
                    ->clickLink(link: 'Register')
                    ->assertPathIs(path: '/register')
                    ->type(field: 'name', value: 'azhara rahma')
                    ->type(field: 'email', value: 'azhara@gmail.com')
                    ->type(field: 'password', value: '12345678')
                    ->type(field: 'password_confirmation', value: '12345678')
                    ->press(button: 'REGISTER')
                    ->pause(1000)
                    ->assertPathIs(path: '/dashboard');
        });
    }
}
