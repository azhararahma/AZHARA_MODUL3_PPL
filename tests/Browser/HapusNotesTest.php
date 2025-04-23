<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HapusNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group hapusnotes
     */
    public function testHapusNote(): void
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
                    ->clickLink(link: 'Notes')
                    ->assertPathIs(path: '/notes')
                    ->press('#delete-4')
                    ->assertPathIs(path: '/notes');
        });
    }
}
