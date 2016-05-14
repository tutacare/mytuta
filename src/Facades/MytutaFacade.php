<?php
namespace Tuta\Mytuta\Facades;

use Illuminate\Support\Facades\Facade;

class MytutaFacade extends Facade {

	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor()
	{
		return 'mytuta';
	}

}
