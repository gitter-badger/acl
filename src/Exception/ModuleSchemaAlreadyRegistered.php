<?php

/*
 * This file is part of the ParkManager project.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ParkManager\Component\Acl\Exception;

use ParkManager\Component\Acl\ModuleSchema;

final class ModuleSchemaAlreadyRegistered extends \InvalidArgumentException
{
    /**
     * @var ModuleSchema
     */
    private $schema;

    /**
     * Constructor.
     *
     * @param ModuleSchema $schema
     */
    public function __construct(ModuleSchema $schema)
    {
        parent::__construct(
            sprintf('ModuleSchema "%s" is already registered in the schema-manager.', $schema->getId())
        );

        $this->schema = $schema;
    }

    /**
     * Returns the rejected ModuleSchema object.
     *
     * @return ModuleSchema
     */
    public function getSchema()
    {
        return $this->schema;
    }
}
