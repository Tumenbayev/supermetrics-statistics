<?php

namespace App\Http\LogicWrappers;

interface LogicWrapperInterface
{
    /**
     * @return mixed
     */
    public function getResult();

    /**
     * Executes a workflow that's needed to be wrapped
     * @return $this
     */
    public function execute();
}
