
<?php

namespace WDG\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RestControllerTest extends WebTestCase
{
    public function testGetuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'users/{id}');
    }

    public function testGetusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users');
    }

}
