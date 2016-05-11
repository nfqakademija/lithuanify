<?php
/**
 * Created by PhpStorm.
 * User: deividas
 * Date: 5/10/16
 * Time: 5:40 PM
 */

namespace LithuanifyBundle\Tests\Utility;

use LithuanifyBundle\Entity\DatePicker;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ArticleManagerTest
 * @package LithuanifyBundle\Tests\Utility
 */
class ArticleManagerTest extends WebTestCase
{

    /**
     *  Checks if date input form is valid
     */
    public function testIfFormIsValid()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        //date input fields
        $this->assertEquals(1, $crawler->filter('#date_pick_beginDate')->count());
        $this->assertEquals(1, $crawler->filter('#date_pick_endDate')->count());
        //Submit button
        $this->assertEquals(1, $crawler->filter('#date_pick_save')->count());
    }

    /**
     * Checks if application can find any articles
     */
    public function testIfArticleExist()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $form = $crawler->filter('#date-pick')->form();
        $form->setValues(array(
            "date_pick[beginDate]" => "01/13/1991",
            "date_pick[endDate]"  => "01/13/1991",
        ));
        $client->submit($form);
        $response = $client->getResponse();
        $this->assertContains('<article class="read-toggle pointer-events-all">', $response->getContent());

    }

    /**
     * Checks if after passing invalid data to form application still works
     */
    public function testIfArticleNotExist()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $form = $crawler->filter('#date-pick')->form();
        $form->setValues(array(
            "date_pick[beginDate]" => "",
            "date_pick[endDate]"  => "",
        ));
        $client->submit($form);
        $response = $client->getResponse();
        $this->assertContains('Straipsnių nerasta', $response->getContent());
    }
}
