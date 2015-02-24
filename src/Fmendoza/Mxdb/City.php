<?php namespace Fmendoza\Mxdb;

class City extends \Eloquent {
	
    /**
	 * @var array
	 * Array with the states.
	 */
	protected $cities;

	/**
	 * @var string
	 * The table for the cities in the database, "cities" by default.
	 */
	protected $table;
    
    public function __construct()
    {
       $this->table = \Config::get('mxdb::cities_table_name');
    }

    /**
     * Get the cities from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    public function loadCities()
    {
        if(sizeof($this->cities) == 0) {
            $this->cities = json_decode(file_get_contents(__DIR__ . '/Models/cities.json'), true);
        }
        return $this->cities;
    }
    
}