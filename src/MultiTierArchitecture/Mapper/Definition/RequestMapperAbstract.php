<?php
namespace MultiTierArchitecture\Mapper\Definition;

use MultiTierArchitecture\Boundary\Definition\RequestAbstract;


/**
 * Mapper abstract class used to set arrays, this class will map request array to another data that the other service
 * will understand
 *
 * @category Mapper
 * @package  MultiTierArchitecture\DataGateway\Mapper\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
abstract class RequestMapperAbstract
{
    /** @var RequestAbstract  $request  Request object that will contain key, value */
    private $request = null;

    /**
     * @var array  $mappingExternalRequestToApiRequestAttributes  Mappings to api request attributes
     */
    private $mappingRequestToOtherRequestAttributes = [];

    /**
     * Initializing mapping array
     *
     * @param array  $mappingRequestToOtherRequestAttributes  Mapping array
     */
    public function __construct($mappingRequestToOtherRequestAttributes = [])
    {
        $this->mappingRequestToOtherRequestAttributes = $mappingRequestToOtherRequestAttributes;
    }

    /**
     * Set request to be its attributes to the api attributes
     *
     * @param RequestAbstract  $request  Request that its data need to be used with the api
     *
     * @return void
     */
    public function setRequest(RequestAbstract $request)
    {
        $this->request = $request;
    }

    /**
     * Get mapped array from the request attributes to the other attributes
     *
     * @return array Array of attributes and its data is taken from the request
     */
    public function getMappedAttributes()
    {
        $mappedArrayForApiRequest = [];
        $requestAttributes = $this->request->getData();
        foreach ($requestAttributes as $key => $value) {
            if (array_key_exists($key, $this->mappingRequestToOtherRequestAttributes)) {
                $mappedArrayForApiRequest[$this->mappingRequestToOtherRequestAttributes[$key]] = $value;
            }
        }

        return $mappedArrayForApiRequest;
    }
}
