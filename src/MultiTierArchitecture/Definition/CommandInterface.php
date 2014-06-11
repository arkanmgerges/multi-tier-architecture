<?php
namespace MultiTierArchitecture\Definition;

/**
 * Interface used to mark the class that will use the command pattern
 *
 * @category Definition
 * @package  MultiTierArchitecture\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
interface CommandInterface
{
    /**
     * Execute the method, this can be used from a wide range of classes
     *
     * @return mixed
     */
    public function execute();
}
