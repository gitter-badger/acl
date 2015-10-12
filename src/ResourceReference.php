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

interface ResourceReference
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * Dumps a resource-type as a readable string.
     *
     * @return string
     */
    public function dump();
}
