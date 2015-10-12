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

use ParkManager\Component\Acl\ResourceReference;

final class ActionNotSupported extends \InvalidArgumentException
{
    /**
     * List of unsupported actions.
     *
     * @var string[]
     */
    private $actions;

    /**
     * List of supported actions.
     *
     * @var string[]
     */
    private $supported;

    /**
     * The Resource that was used for checking.
     *
     * @var ResourceReference
     */
    private $resourceType;

    /**
     * @param string|string[]   $action
     * @param string[]          $supported
     * @param ResourceReference $resourceType
     */
    public function __construct($action, array $supported, ResourceReference $resourceType)
    {
        parent::__construct(
            sprintf(
                'Action(s) "%s" are not supported on "%s", supported actions are: "%s".',
                implode('", "', $action),
                $resourceType->dump(),
                implode('", "', $supported)
            )
        );

        $this->actions = (array) $action;
        $this->supported = $supported;
        $this->resourceType = $resourceType;
    }

    /**
     * Gets a list of requested but not unsupported actions.
     *
     * @return string[]
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Gets a list of supported actions.
     *
     * @return string[]
     */
    public function getSupported()
    {
        return $this->supported;
    }

    /**
     * Gets the Resource that was used for checking.
     *
     * @return ResourceReference
     */
    public function getResourceType()
    {
        return $this->resourceType;
    }
}
