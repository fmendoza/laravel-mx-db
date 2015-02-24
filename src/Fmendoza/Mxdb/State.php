<?php namespace Fmendoza\Mxdb;

class State extends \Eloquent {

	/**
	 * @var array
	 * Array with the cities.
	 */
	protected $states;

	/**
	 * @var string
	 * The table for the states in the database ("states" by default)
	 */
	protected $table;

    public function __construct()
    {
       $this->table = \Config::get('mxdb::states_table_name');
    }

    /**
     * Get the states from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    public function loadStates()
    {
        if(sizeof($this->states) == 0) {
            $this->states = json_decode(file_get_contents(__DIR__ . '/Models/states.json'), true);
        }
        return $this->states;
    }
    
}