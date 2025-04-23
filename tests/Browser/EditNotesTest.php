<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editnotes
     */
    public function testEditNote(): void
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
                    ->clickLink(link: 'Edit')
                    ->assertPathIs(path: '/edit-note-page/1')
                    ->type(field: 'title', value: 'praktikum modul 3 PPL')
                    ->type(field: 'description', value: 'pada praktikum modul 3 PPL saya melakukan testing code Login, Register, dan Notes menggunakan dusk.')
                    ->press(button: 'UPDATE')
                    ->assertPathIs(path: '/notes');
        });
    }
}
