<?php

namespace Faker\Test\Provider;

use Faker\Provider\UserAgent;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class UserAgentTest extends TestCase
{
    public function testAllAgents()
    {
        $agent = new UserAgent($this->faker);
        $reflection = new \ReflectionClass($agent);
        $agents = $reflection->getProperty('userAgents');
        $agents->setAccessible(true);

        foreach ($agents->getValue() as $method) {
            self::assertNotNull(UserAgent::$method());
        }
    }

    public function testRandomUserAgent()
    {
        self::assertNotNull(UserAgent::userAgent());
    }

    public function testFirefoxUserAgent()
    {
        self::assertStringContainsString(' Firefox/', UserAgent::firefox());
    }

    public function testSafariUserAgent()
    {
        self::assertStringContainsString('Safari/', UserAgent::safari());
    }

    public function testInternetExplorerUserAgent()
    {
        self::assertStringStartsWith('Mozilla/5.0 (compatible; MSIE ', UserAgent::internetExplorer());
    }

    public function testOperaUserAgent()
    {
        self::assertStringStartsWith('Opera/', UserAgent::opera());
    }

    public function testChromeUserAgent()
    {
        self::assertStringContainsString('(KHTML, like Gecko) Chrome/', UserAgent::chrome());
    }

    public function testMSEdgeUserAgent()
    {
        self::assertStringContainsString('Edg', UserAgent::msedge());
    }
}
