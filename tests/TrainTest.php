<?php
namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class TrainTest extends PantherTestCase
{
    public function testMyApp(): void
    {
        $client = static::createPantherClient(['external_base_uri' => 'http://localhost:8081']);
        $client->request('GET', '/admin/train');
        sleep(5);
        $client->executeScript("document.querySelector('#nouveau-train').click()");
        sleep(55);
    }
}