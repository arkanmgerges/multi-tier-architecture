<?php
namespace MultiTierArchitecture\Entity\Definition;

/**
 * This interface is implemented by each entity
 *
 * @category Entity
 * @package  MultiTierArchitecture\Entity\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
interface EntityInterface
{
    /**
     * Get all the attributes of the entity
     *
     * @return array Associated array, which is, key is the name of the attribute and value is its value
     */
    public function getAttributes();
}
