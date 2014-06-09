<?php
namespace MultiTierArchitecture\Boundary\Definition;


/**
 * Request class used for communication with use cases
 *
 * @category Boundary
 * @package  MultiTierArchitecture\Boundary\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
abstract class RequestAbstract
{
    /** @var array  $data  Set of objects */
    private $data = [];

    /** @var array  $extra  Extra stuff like orderBy, limit ...etc */
    private $extra = [];

    /**
     * Initialize $data
     *
     * @param array  $data   Attributes of this object
     * @param array  $extra  Extra array that can contain orderBy, limit,...etc
     * @param int    $flags  This will determine if $data, $extra should be appended or only assigned to
     *                       $this->data and $this->extra arrays
     */
    public function __construct($data = [], $extra = [], $flags = 0)
    {
        $resultData = $this->hydrateIfJsonToArray($data);
        if (!empty($resultData)) {
            $this->data = $resultData;
        }

        $resultData = $this->hydrateIfJsonToArray($extra);
        if (!empty($resultData)) {
            $this->extra = $resultData;
        }
    }

    /**
     * Hydrate if the passed parameter is json to array
     *
     * @param mixed  $data  It can be json or array
     *
     * @return array
     */
    private function hydrateIfJsonToArray($data)
    {
        if (is_array($data)) {
            return $data;
        }
        elseif (is_string($data)) {
            return json_decode($data, true);
        }

        return [];
    }

    /**
     * Set data into data array
     *
     * @param mixed  $data  it that will have its own data
     *
     * @return void
     */
    public function addData($data)
    {
        $data = $this->hydrateIfJsonToArray($data);
        $this->data[] = $data;
    }

    /**
     * Set data into data array at a specified key
     *
     * @param int    $key   Key where the object will be saved
     * @param mixed  $data  it that will have its own data
     *
     * @return void
     */
    public function setDataByKey($key, $data)
    {
        $data = $this->hydrateIfJsonToArray($data);
        $this->data[$key] = $data;
    }

    /**
     * Set data into data array
     *
     * @param mixed  $data  it that will have its own data
     *
     * @return void
     */
    public function addExtra($data)
    {
        $data = $this->hydrateIfJsonToArray($data);
        $this->extra[] = $data;
    }

    /**
     * Set data into data array at a specified key
     *
     * @param int    $key   Key where the object will be saved
     * @param mixed  $data  it that will have its own data
     *
     * @return void
     */
    public function setExtraByKey($key, $data)
    {
        $data = $this->hydrateIfJsonToArray($data);
        $this->extra[$key] = $data;
    }

    /**
     * Get number of data items in the array
     *
     * @return int Number of data objects in the array
     */
    public function getDataCount()
    {
        return count($this->data);
    }

    /**
     * Get number of extra items in the array
     *
     * @return int Number of extra objects in the array
     */
    public function getExtraCount()
    {
        return count($this->extra);
    }

    /**
     * Get data from data array
     *
     * @param int  $key  Index of the array used in order to fetch the data object from the array
     *
     * @return mixed Data at the key passed in the parameter
     */
    public function getDataByKey($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return [];
    }

    /**
     * Get data from data array
     *
     * @param int  $key  Index of the array used in order to fetch the data object from the array
     *
     * @return mixed Data at the key passed in the parameter
     */
    public function getExtraByKey($key)
    {
        if (isset($this->extra[$key])) {
            return $this->extra[$key];
        }

        return [];
    }

    /**
     * Set data to data array
     *
     * @param string|array  $data  Data that need to be set into extra array
     *
     * @return void
     */
    public function setData($data)
    {
        $resultData = $this->hydrateIfJsonToArray($data);
        if (!empty($resultData)) {
            $this->data = $resultData;
        }
        else {
            $this->data = [];
        }
    }

    /**
     * Set data to extra array
     *
     * @param string|array  $extra  Data that need to be set into extra array
     *
     * @return void
     */
    public function setExtra($extra)
    {
        $resultData = $this->hydrateIfJsonToArray($extra);
        if (!empty($resultData)) {
            $this->extra = $resultData;
        }
        else {
            $this->extra = [];
        }
    }

    /**
     * Get all data array
     *
     * @return array All the items in the array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get all extra array
     *
     * @return array All the items in the array
     */
    public function getExtra()
    {
        return $this->extra;
    }
}
