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

use ParkManager\Component\Acl\Exception\ActionNotSupported;

interface AccessManager
{
    /**
     * Returns whether $user is allowed to execute the $action
     * on the $resourceType.
     *
     * @param string            $user     Unique user identifier.
     * @param string|string[]   $action   One or more actions to check for.
     * @param ResourceReference $resource Resource to check on.
     *
     * @throws ActionNotSupported When action is not supported.
     *
     * @return bool Returns FALSE at least one action is not granted.
     *              TRUE if all the given actions are granted.
     */
    public function isGranted($user, $action, ResourceReference $resource);

    /**
     * Grants the $actions on $resourceType for $user.
     *
     * @param string|string[]   $action   One or more actions to grant to user.
     * @param ResourceReference $resource Resource to grant access on.
     * @param string            $user     Unique user identifier.
     *
     * @throws ActionNotSupported When action is not supported.
     */
    public function grant($action, ResourceReference $resource, $user);

    /**
     * Revokes the $actions on $resourceType from $user.
     *
     * @param string|string[]   $action   One or more actions to revoke from user.
     * @param ResourceReference $resource Resource to revoke from.
     * @param string            $user     Unique user identifier.
     *
     * @throws ActionNotSupported When action is not supported.
     */
    public function revoke($action, ResourceReference $resource, $user);

    /**
     * Assigns the granted $action on $resourceType for $user.
     *
     * This works similar to grant() but will explicitly
     * set the access, overwriting existing configuration.
     *
     * @param string|string[]   $action   One or more actions to assign.
     * @param ResourceReference $resource Resource to assign access on.
     * @param string            $user     Unique user identifier.
     *
     * @throws ActionNotSupported When action is not supported.
     */
    public function assign($action, ResourceReference $resource, $user);

    /**
     * Gets a collection of all currently granted access rights.
     *
     * The filter parameter allows for one or more ResourceReference
     * objects to limit the search operation.
     *
     * @param string                                     $user   Unique user identifier.
     * @param ResourceReference|ResourceReference[]|null $filter One or more filters to limit
     *                                                           selection.
     *
     * @return UserAccess[] Numeric indexed-array with UserAccess objects.
     *                      Each object holds a access-rule for a Resource/user
     *                      combination.
     */
    public function listAccessForUser($user, $filter = null);
}
