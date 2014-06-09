<?php
namespace MultiTierArchitecture\DataGateway\Definition;

/**
 * Marker interface
 *
 * @category DataGateway
 * @package  MultiTierArchitecture\DataGateway\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
interface RepositoryInterface
{
    /**
     * Get last api call response
     *
     * @return array Response of the last api call
     */
    public function getResponse();

    /**
     * Set a response
     *
     * @param array  $response  Response that need to be set
     *
     * @return void
     */
    public function setResponse(array $response);

    /**
     * Return array that is based on the entities, this means that the response will have data that is
     * mapped as objects of entities and these objects will be put into array
     *
     * @return array
     */
    public function getEntitiesFromResponse();

    /**
     * Verify if response status is success
     *
     * @return bool true if response status is success, false is otherwise
     */
    public function isResponseStatusSuccess();
}
