<?php
namespace MultiTierArchitecture\UseCase\Definition;

use MultiTierArchitecture\Boundary\Definition\RequestAbstract;
use MultiTierArchitecture\Boundary\Definition\ResponseAbstract;
use MultiTierArchitecture\DataGateway\Definition\RepositoryInterface;

/**
 * This is 'base' abstract use case that contains a common code for the use cases in 'profile' namespace
 *
 * @category UseCase
 * @package  MultiTierArchitecture\UseCase\Definition
 * @author   Arkan M. Gerges <arkan.m.gerges@gmail.com>
 * @version  GIT: $Id:$
 */
abstract class BaseAbstract implements UseCaseInterface, RequestResponseInterface
{
    /**
     * @var RequestAbstract  $request Object
     */
    private $request;

    /**
     * @var ResponseAbstract  $response  Object
     */
    private $response = null;

    /** @var \MultiTierArchitecture\DataGateway\Definition\RepositoryInterface  $dataGatewayRepository  The active
     * repository that is used in the execute() method, this will be set by the derived classes to let the methods
     * to use the same instance of the data gateway, like fetching total items count, this can be obtained after the
     * data gateway has done some action on fetching data, then data gateway will save the number of total items count
     * that will be taken from the response
     */
    private $repository = null;

    /**
     * Init response object
     *
     * @param ResponseAbstract  $response  Response object that need to be initialized
     */
    public function __construct(ResponseAbstract $response)
    {
        $this->response = $response;
    }

    /**
     * Execute this use case
     *
     * @return void
     */
    public function execute()
    {
        $repositoryResponse = [];
        $arrayOfObjects = [];
        $resultCount    = 0;
        $responseStatus = ResponseAbstract::STATUS_SUCCESS;

        try {
            $this->executeDataGateway();
            if ($this->repository != null) {
                $arrayOfObjects = $this->repository->getEntitiesFromResponse();
                $repositoryResponse = $this->repository->getResponse();
                $responseStatus = $this->repository->isResponseStatusSuccess() == true ?
                    ResponseAbstract::STATUS_SUCCESS :
                    ResponseAbstract::STATUS_FAIL;
            }
            else {
                $arrayOfObjects = [];
                $repositoryResponse = [];
            }

            $resultCount    = $this->getTotalResultCount();
        }
        catch (\Exception $e) {
            $responseStatus = ResponseAbstract::STATUS_FAIL;
            $this->response->setMessages(['No result was found']);
        }

        $this->response->setStatus($responseStatus);
        $this->response->setResult($arrayOfObjects);
        $this->response->setSourceResponse($repositoryResponse);
        $this->response->setTotalResultCount($resultCount);
    }

    /**
     * Return the response object
     *
     * @return ResponseAbstract|null Response object or null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get the request that will be used in the current use case
     *
     * @return RequestAbstract Request that is used in the current use case
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set request that will be used in the current use case
     *
     * @param RequestAbstract  $request  Request that is used in the current use case
     *
     * @return void
     */
    public function setRequest(RequestAbstract $request)
    {
        $this->request = $request;
    }

    /**
     * Count the number of results based on the request object. This function will be available for the derived
     * classes to be overwritten
     *
     * @return int
     */
    protected function getTotalResultCount()
    {
        return 0;
    }

    /**
     * Set repository to be used a cross the derived class
     *
     * @param RepositoryInterface  $repository  Set repository
     *
     * @return void
     */
    protected function setRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get repository that is set by the derived classes
     *
     * @return RepositoryInterface Repository that was set by the derived class
     */
    protected function getRepository()
    {
        return $this->repository;
    }

    /**
     * Initialize the repository passed by a it's name as a parameter
     *
     * @param string  $repositoryString  Name of the repository that need to be initialize
     *
     * @return void
     */
    abstract protected function initAndSetRepository($repositoryString);

    /**
     * Template pattern, this will be run by execute(), in this method, data gateway call will be executed
     *
     * @return array
     */
    abstract public function executeDataGateway();
}
