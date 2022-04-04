<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;


class OptionTest extends PantherTestCase
{
    public function testCreationOption(): void
    {
        $client = static::createPantherClient(['external_base_uri' => 'http://localhost:8089']);
        $client->request('GET', '/admin/option');
        sleep(1);

        $client->executeScript("document.querySelector('#btnCreateOption').click()");
         sleep(2);
        $client->executeScript("document.querySelector('#option_name').value = 'test nom'");
        $client->executeScript("document.querySelector('#option_price').value = '123'");
        $client->executeScript("document.querySelector('#option_description').value = 'test description'");
        $client->executeScript("document.querySelector('#option_type').value = 'test type'");
        $client->executeScript("document.querySelector('#option_wagon').value = '3'");
        $client->executeScript("document.querySelector('#btnsumdinOption').click()");
        sleep(3);
        $client->waitForAttributeToContain("#option_name", "value" ,"aaaa");
    }
    public function testDeleteOption(): void
    {
        $client = static::createPantherClient(['external_base_uri' => 'http://localhost:8089']);
        $client->request('GET', '/admin/option');
        sleep(1);
        $this->assertSelectorWillExist("#btnDeleteOption_6");
        $client->executeScript("document.querySelector('#btnDeleteOption_6').click()");
    }
}