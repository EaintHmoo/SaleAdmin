<?php
include_once(__DIR__.'/../model/yarn.php');
class YarnController extends Yarn{
    function addYarn($yarn_name,$yarn_type){
        return $this->createYarn($yarn_name,$yarn_type);
    }

    function showYarn()
    {
        $results = $this->getYarn();
        return $results;
    }
    function showYarnSingleLine($yid)
    {
        $result=$this->getYarnSingleLine($yid);
        return $result;
    }
    function editYarn($yid,$yarn_name,$yarn_type)
    {
        $result = $this->updateYarn($yid,$yarn_name,$yarn_type);
        return $result;
    }
}
?>