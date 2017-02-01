<?php

namespace HealthCheck\HealthCheckService;

use HealthCheck\CheckCriteria\ICheckCriteria;

/**
 * Class HealthCheckService
 * @package HealthCheckService
 */
class HealthCheckService {

    protected $criteria = [];

    public function registerCheckCriteria(ICheckCriteria $checkCriteria){
        $this->criteria[] = $checkCriteria;
    }

    public function checkHealthCriteria(){
        $messages = [];
        foreach($this->criteria as $aCriteria){
            /** @var $aCriteria ICheckCriteria */
            $result = $aCriteria->check();
            if (TRUE !== $result){
                $messages[] = $aCriteria->getName() . ": " . $result;
            }
        }

        return $messages;
    }

}