<?php
namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class TrainTest extends PantherTestCase
{
    public function testMyApp(): void
    {
        $client = static::createPantherClient(['external_base_uri' => 'http://localhost:8089']);
        $client->request('GET', '/admin/train');
        sleep(1);
        //$client->takeScreenshot("screen.png");

        /*
         * Création d'un train
         */
        $client->executeScript("document.querySelector('#nouveau-train').click()");
        $client->executeScript("document.querySelector('#train_name').value = 'testr'");
        $client->executeScript("document.querySelector('#train_description').value = 'testfsdfsdr'");
        //  Wait qui ne passe pas
        //$client->waitForAttributeToContain("#train_name", "value" ,"testezdgdfgdfr");
        $client->waitForAttributeToContain("#train_name", "value" ,"testr");
        $client->waitForAttributeToContain("#train_description", "value" ,"testfsdfsdr");
        sleep(2);
        $client->executeScript("document.querySelector('#form-train').click()");
        $this->assertSelectorIsVisible(".toast");
        sleep(5);


        /*
         * Modification d'un train
         */
        $client->executeScript("document.querySelector('#btnModifier_11').click()");
        sleep(2);
        $client->executeScript("document.querySelector('#train_name').value = 'modification du nom'");
        $client->executeScript("document.querySelector('#train_description').value = 'Description'");
        sleep(2);
        $client->waitForAttributeToContain("#train_name", "value" ,"modification du nom");
        $client->waitForAttributeToContain("#train_description", "value" ,"Description");
        $client->executeScript("document.querySelector('#form-train').click()");


    }
}