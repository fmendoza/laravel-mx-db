use Illuminate\Database\Eloquent\Model as Eloquent;

class MexicoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the states table
        DB::table(\Config::get('mxdb::states_table_name'))->delete();
        DB::table(\Config::get('mxdb::cities_table_name'))->delete();

        //Get all of the states
        $states = State::loadStates();
        
        foreach($states as $state) {
            DB::table(\Config::get('mxdb::states_table_name'))->insert(array(
                'id' => $state['id'],
                'name' => ((isset($state['name'])) ? $state['name'] : null),
            ));
        }

        //Get all of the cities
        $cities = City::loadCities();
        
        foreach($cities as $city) {
            DB::table(\Config::get('mxdb::cities_table_name'))->insert(array(
                'id' => $city['id'],
                'name' => ((isset($city['name'])) ? $city['name'] : null),
                'state_id' => $city['state_id'],
            ));
        }
    }
}