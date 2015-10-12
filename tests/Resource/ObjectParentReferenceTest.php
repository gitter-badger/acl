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
use ParkManager\Component\Acl\Resource\ObjectParentReference;

final class ObjectParentReferenceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider provideObjectIds
     *
     * @param string $objectIdInput
     */
    public function it_can_accept_any_id($objectIdInput)
    {
        $module = new ModuleId('ParkManager.Webhosting.Account');
        $objectId = new ObjectParentReference($module, $objectIdInput);

        $this->assertEquals($module, $objectId->module);
        $this->assertEquals($objectIdInput, (string) $objectId);

        $this->assertContains((string) $module, $objectId->dump());
        $this->assertContains((string) $objectIdInput, (string) $objectId->dump());
    }

    public function provideObjectIds()
    {
        return [
            ['12'],
            ['0012'],
            ['012'],
            ['012'],
            ['423df585-8044-48a2-8db1-6f244da3c5ca'],
            ['ParkManager.Webhosting.Database.Pgsql.User.2480848092'],
        ];
    }
}
