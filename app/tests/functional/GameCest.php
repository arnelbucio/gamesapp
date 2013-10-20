<?php
use \TestGuy;

class GameCest
{

    public function _before()
    {
        Artisan::call('migrate');
    }

    public function addGameTest(TestGuy $I)
    {
        $I->amOnPage('/');
        $I->click('Create Game');
        $I->seeCurrentUrlEquals('/create');
        $I->submitForm('#new_game', [
            'title'     => 'Super Mario Bros',
            'publisher' => 'Nintendo'
        ]);
        $I->see('Super Mario Bros');
        $I->seeCurrentUrlEquals('/');
    }

    public function editGameTest(TestGuy $I)
    {
        $I->amOnPage('/');
        $I->click('Edit');
        $I->fillField('#title', 'Metroid');
        $I->click('Save');
        $I->seeCurrentUrlEquals('/');
        $I->dontSee('Super Mario Bros');
        $I->see('Metroid');
    }

    public function deleteGame(TestGuy $I)
    {
        $I->amOnPage('/');
        $I->click('Delete');
        $I->see('Delete Metroid');
        $I->click('Yes');
        $I->seeCurrentUrlEquals('/');
    }
}
