<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class logoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee(text: 'Modul 3')
            ->clickLink(link: 'Log in')
            ->assertPathIs(path: '/login')
            ->type(field: 'email', value: 'azhara@gmail.com')
            ->type(field: 'password', value: '12345678')
            ->press(button: 'LOG IN')
            ->pause(1000)
            ->assertPathIs(path: '/dashboard')
            ->waitFor('#click-dropdown', 5)
            ->click('#click-dropdown')
            ->pause(1000)
            ->waitFor('form[action="http://127.0.0.1:8000/logout"] a', 5)
            ->click('form[action="http://127.0.0.1:8000/logout"] a');
        });
    }
}
