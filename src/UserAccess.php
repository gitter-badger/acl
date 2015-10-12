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

/**
 * A UserAccess object holds a single access-rule for a resource/user
 * combination.
 */
class UserAccess
{
    /**
     * @param ResourceReference $resource
     * @param string[]          $actions
     */
    public function __construct(ResourceReference $resource, array $actions)
    {
    }

    /**
     * Gets the resource this rule applies to.
     *
     * @return ResourceReference
     */
    public function getResourceType()
    {
    }

    /**
     * Gets a list of actions granted on the resource
     * for the user.
     *
     * @return string[]
     */
    public function getGrantedActions()
    {
    }
}
