use Illuminate\Database\Migrations\Migration;

class SetupCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the states table
		Schema::create(\Config::get('mxdb::cities_table_name'), function($table)
		{		    
		    $table->integer('id')->index();
		    $table->string('name', 255)->nullable();
		    $table->integer('state_id')->index();
		    $table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(\Config::get('mxdb::cities_table_name'));
	}

}