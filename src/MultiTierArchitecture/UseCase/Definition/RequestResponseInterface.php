<?php
namespace MultiTierArchitecture\UseCase\Definition;

use MultiTierArchitecture\Boundary\Definition\RequestAbstract;

/**
 * Marker interface
 *
 * @category DataGateway
 * @package  MultiTierArchitecture\UseCase\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
interface RequestResponseInterface
{
    /**
     * Set request that will be used for search
     *
     * @param RequestAbstract  $request  Request that is used for search
     *
     * @return void
     */
    public function setRequest(RequestAbstract $request);

    /**
     * Return the response object
     *
     * @return \MultiTierArchitecture\Boundary\Definition\ResponseAbstract|null Response object or null
     */
    public function getResponse();
}
