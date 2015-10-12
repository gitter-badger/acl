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

final class ObjectReference implements ResourceReference
{
    /**
     * READ ONLY: The module this object-reference is related to.
     *
     * @var ModuleId
     */
    public $module;

    /**
     * The object reference.
     *
     * @var string
     */
    private $reference;

    /**
     * @param ModuleId $module
     * @param string   $reference
     */
    public function __construct(ModuleId $module, $reference)
    {
        $this->module = $module;
        $this->reference = (string) $reference;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function dump()
    {
        return sprintf('ObjectReference("%s", "%s")', (string) $this->module, $this->reference);
    }
}
