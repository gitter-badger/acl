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

use ParkManager\Component\Acl\Resource\ModuleId;

/**
 * A ModuleSchema holds the supported actions of a logical Module.
 */
interface ModuleSchema
{
    /**
     * Returns the module-id of this schema.
     *
     * @return ModuleId
     */
    public function getId();

    /**
     * Returns a list of all the supported actions.
     *
     * @return string[]
     */
    public function getActions();

    /**
     * Returns whether the action(s) are supported.
     *
     * If a list of actions is provided this will return
     * FALSE when at least one action is not supported.
     *
     * @param string|string[] $actions
     *
     * @return bool
     */
    public function supportsAction($actions);
}
