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

final class ModuleNotRegistered extends \InvalidArgumentException
{
    /**
     * List of unsupported actions.
     *
     * @var string
     */
    private $moduleId;

    /**
     * @param string $moduleId
     */
    public function __construct($moduleId)
    {
        parent::__construct(sprintf('Resource "%s" is not registered in the schema-manager.', $moduleId));

        $this->moduleId = $moduleId;
    }

    /**
     * Gets the unregistered module-id.
     *
     * @return string
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }
}
