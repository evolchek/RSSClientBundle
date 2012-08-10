<?php

/*
 * This file is part of the symfony-madrid package.
 * 
 * Short description   
 *
 * @author Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @date Jun 19, 2012, 11:18:58 PM
 * @file RSSClientTest.php , UTF-8
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Desarrolla2\Bundle\RSSClientBundle\Test\Service;

use Desarrolla2\Bundle\RSSClientBundle\Service\RSSClient;

class RSSClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Desarrolla2\Bundle\RSSClientBundle\Service\RSSClient;
     */
    protected $client = null;

    public function setUp()
    {
        $this->client = new RSSClient();
        $this->client->addFeed('http://desarrolla2.com/feed/');
    }

    /**
     * @test
     */
    public function testAddFeed()
    {
        $this->client->addFeed('feed1');
        $this->assertEquals(count($this->client->getFeeds()), 2);
    }

    /**
     * @test
     */
    public function testAddFeeds()
    {
        $this->client->addFeeds(array('feed1', 'feed2'));
        $this->client->addFeeds(array('feed3', 'feed4'));
        $this->assertEquals(count($this->client->getFeeds()), 5);
    }

    /**
     * @test
     */
    public function testSetFeeds()
    {
        $this->client->addFeed('feed1');
        $this->client->setFeeds(array('feed1'));
        $this->assertEquals(count($this->client->getFeeds()), 1);
    }

    /**
     * @test
     */
    public function testFetch()
    {
        $this->client->fetch();
        $this->assertEquals(10, $this->client->countNodes());
    }

    public function getDataForXSS()
    {
        
    }

}