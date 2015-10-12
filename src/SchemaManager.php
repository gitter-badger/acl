<?php

/*
 * This file is part of the ParkManager project.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ParkManager\Component\Acl;

use ParkManager\Component\Acl\Exception\ModuleNotRegistered;
use ParkManager\Component\Acl\Exception\ModuleSchemaAlreadyRegistered;
use ParkManager\Component\Acl\Resource\ModuleId;

/**
 * A SchemaManager manages the registration of ModuleSchema's.
 */
interface SchemaManager
{
    /**
     * Register a new ModuleSchema.
     *
     * If a schema already exists this will throw an exception.
     *
     * @param ModuleSchema $moduleSchema
     *
     * @throws ModuleSchemaAlreadyRegistered When a ModuleSchema with the same id
     *                                       is already registered.
     */
    public function register(ModuleSchema $moduleSchema);

    /**
     * Returns a collection of the registered ModuleSchema's.
     *
     * @return ModuleSchema[]
     */
    public function all();

    /**
     * Returns the ModuleSchema by the module-id.
     *
     * @param ModuleId $module
     *
     * @throws ModuleNotRegistered When the given module is not registered
     *                             on the manager.
     *
     * @return ModuleSchema
     */
    public function get(ModuleId $module);

    /**
     * Returns whether the given module-id is registered
     * on this manager.
     *
     * @param ModuleId $module
     *
     * @return bool
     */
    public function has(ModuleId $module);
}
