<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group createnotes
     */
    public function testCreateNote(): void
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
                    ->clickLink(link: 'Create Note')
                    ->assertPathIs(path: '/create-note')
                    ->type(field: 'title', value: 'praktikum modul 3 PPL')
                    ->type(field: 'description', value: 'pada praktikum modul 3 PPL saya melakukan testing code Login, Register, dan notes menggunakan dusk.')
                    ->press(button: 'CREATE')
                    ->assertPathIs(path: '/notes');
        });
    }
}
