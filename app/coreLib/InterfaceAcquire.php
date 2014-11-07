<?php namespace coreLib;

interface InterfaceAcquire {

	public function getList($db, $table);

	public function getRecord($db, $table, $param);


}
