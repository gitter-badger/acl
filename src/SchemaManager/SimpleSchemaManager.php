<?php

/*
 * This file is part of the ParkManager project.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ParkManager\Component\Acl\SchemaManager;

use ParkManager\Component\Acl\Exception\ModuleNotRegistered;
use ParkManager\Component\Acl\Exception\ModuleSchemaAlreadyRegistered;
use ParkManager\Component\Acl\ModuleSchema;
use ParkManager\Component\Acl\Resource\ModuleId;
use ParkManager\Component\Acl\SchemaManager;

final class SimpleSchemaManager implements SchemaManager
{
    /**
     * @var ModuleSchema[]
     */
    private $moduleSchemas;

    /**
     * Constructor.
     *
     * @param ModuleSchema[] $moduleSchemas
     */
    public function __construct(array $moduleSchemas)
    {
        foreach ($moduleSchemas as $module) {
            $id = (string) $module->getId();

            if (isset($this->moduleSchemas[$id])) {
                throw new ModuleSchemaAlreadyRegistered($module);
            }

            $this->moduleSchemas[$id] = $module;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register(ModuleSchema $moduleSchema)
    {
        $id = (string) $moduleSchema->getId();

        if (isset($this->moduleSchemas[$id])) {
            throw new ModuleSchemaAlreadyRegistered($moduleSchema);
        }

        $this->moduleSchemas[$id] = $moduleSchema;
    }

    /**
     * {@inheritdoc}
     */
    public function replace(ModuleSchema $moduleSchema)
    {
        $id = (string) $moduleSchema->getId();

        if (!isset($this->moduleSchemas[$id])) {
            throw new ModuleNotRegistered($id);
        }

        $this->moduleSchemas[$id] = $moduleSchema;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->moduleSchemas;
    }

    /**
     * {@inheritdoc}
     */
    public function get(ModuleId $module)
    {
        $id = (string) $module;

        if (!isset($this->moduleSchemas[$id])) {
            throw new ModuleNotRegistered($id);
        }

        return $this->moduleSchemas[$id];
    }

    /**
     * {@inheritdoc}
     */
    public function has(ModuleId $module)
    {
        return isset($this->moduleSchemas[(string) $module]);
    }
}
