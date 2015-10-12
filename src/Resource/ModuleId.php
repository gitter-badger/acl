<?php

/*
 * This file is part of the ParkManager project.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ParkManager\Component\Acl\Resource;

use ParkManager\Component\Acl\ResourceReference;

final class ModuleId implements ResourceReference
{
    /**
     * The Module id.
     *
     * @var string
     */
    private $moduleId;

    /**
     * @param string $moduleId
     */
    public function __construct($moduleId)
    {
        $this->moduleId = $moduleId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->moduleId;
    }

    public function dump()
    {
        return sprintf('ModuleId("%s")', $this->moduleId);
    }
}
