<?php

/*
 * This file is part of the ParkManager project.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ParkManager\Component\Acl\Tests\Resource;

use ParkManager\Component\Acl\Resource\ModuleId;

final class ModuleIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider provideModuleIds
     */
    public function it_can_accept_any_id($moduleIdInput)
    {
        $module = new ModuleId($moduleIdInput);

        $this->assertEquals($moduleIdInput, (string) $module);
        $this->assertContains($moduleIdInput, $module->dump());
    }

    public function provideModuleIds()
    {
        return [
            ['ParkManager.Webhosting.Database.Pgsql.User'],
            ['ParkManager\\Webhosting\\Database\\Pgsql\\User'],
            ['Park-Manager#Webhosting=Database#Pgsql/User'],
        ];
    }
}
