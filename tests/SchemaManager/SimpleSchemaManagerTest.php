<?php

/*
 * This file is part of the ParkManager project.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ParkManager\Component\Acl\Tests\SchemaManager;

use ParkManager\Component\Acl\Exception\ModuleNotRegistered;
use ParkManager\Component\Acl\Exception\ModuleSchemaAlreadyRegistered;
use ParkManager\Component\Acl\ModuleSchema;
use ParkManager\Component\Acl\Resource\ModuleId;
use ParkManager\Component\Acl\SchemaManager\SimpleSchemaManager;
use Prophecy\Argument;

final class SimpleSchemaManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $schemas;

    /**
     * @var SimpleSchemaManager
     */
    private $schemaManager;

    protected function setUp()
    {
        $this->schemas = [
            'Webhosting.Account' => $this->createModuleSchema('Webhosting.Account', ['create', 'edit', 'delete']),
            'Webhosting.Host' => $this->createModuleSchema('Webhosting.Host', ['create', 'edit', 'delete']),
        ];

        $this->schemaManager = new SimpleSchemaManager($this->schemas);
    }

    /**
     * @test
     */
    public function it_returns_all_registered_Schemas()
    {
        $this->assertEquals($this->schemas, $this->schemaManager->all());
    }

    /**
     * @test
     */
    public function it_returns_if_a_schema_is_registered()
    {
        $this->assertTrue($this->schemaManager->has(new ModuleId('Webhosting.Account')));
        $this->assertTrue($this->schemaManager->has(new ModuleId('Webhosting.Host')));
        $this->assertFalse($this->schemaManager->has(new ModuleId('Webhosting.Database')));
    }

    /**
     * @test
     */
    public function it_gets_a_single_schema()
    {
        $this->assertEquals($this->schemas['Webhosting.Account'], $this->schemaManager->get(new ModuleId('Webhosting.Account')));
        $this->assertEquals($this->schemas['Webhosting.Host'], $this->schemaManager->get(new ModuleId('Webhosting.Host')));
    }

    /**
     * @test
     */
    public function it_registers_a_schema()
    {
        $schema = $this->createModuleSchema('Webhosting.Mailbox', ['create', 'edit', 'delete']);

        $this->schemaManager->register($schema);
        $this->assertEquals($schema, $this->schemaManager->get(new ModuleId('Webhosting.Mailbox')));
    }

    /**
     * @test
     */
    public function it_allows_replacing_an_existing_schema()
    {
        $schema = $this->createModuleSchema('Webhosting.Account', ['create', 'edit', 'delete', 'show']);

        $this->schemaManager->replace($schema);
        $this->assertEquals($schema, $this->schemaManager->get(new ModuleId('Webhosting.Account')));
    }

    /**
     * @test
     */
    public function it_errors_when_registering_existing_schema()
    {
        $schema = $this->createModuleSchema('Webhosting.Account', ['create', 'edit', 'delete']);

        $this->setExpectedException(ModuleSchemaAlreadyRegistered::class);
        $this->schemaManager->register($schema);
    }


    /**
     * @test
     */
    public function it_errors_when_replacing_non_existing_schema()
    {
        $schema = $this->createModuleSchema('Webhosting.Mailbox', ['create', 'edit', 'delete', 'show']);

        $this->setExpectedException(ModuleNotRegistered::class);
        $this->schemaManager->replace($schema);
    }

    /**
     * @param string          $id
     * @param string|string[] $actions
     *
     * @return ModuleSchema
     */
    private function createModuleSchema($id, $actions)
    {
        $actions = (array) $actions;

        $schema = $this->prophesize(ModuleSchema::class);
        $schema->getId()->willReturn(new ModuleId($id));
        $schema->getActions()->willReturn($actions);
        $schema->getActions()->willReturn($actions);
        $schema->supportsAction(Argument::any())->will(
            function ($action) use ($actions) {
                $action = (array) $action;

                foreach ($action as $currentAction) {
                    if (!in_array($currentAction, $actions, true)) {
                        return false;
                    }
                }

                return true;
            }
        );

        return $schema->reveal();
    }
}
