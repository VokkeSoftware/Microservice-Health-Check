<?php

namespace CheckCriteria;

/**
 * Class ICheckCriteria
 * @package CheckCriteria
 */
interface ICheckCriteria {

    /** check
     *
     *  Returns TRUE if healthy and an error message if something is wrong.
     *
     *
     * @return TRUE|String
     */
    public function check();

    /** getName
     *
     *  Returns the print-friendly name of the check criteria.
     *
     * @return string
     */
    public function getName();

}