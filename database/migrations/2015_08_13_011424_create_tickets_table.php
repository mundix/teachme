<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string("title",200);
			$table->enum('status',['open','closed']);
			/**
			 * Nota:
			 * Cada ticket va a estar atado a la tabla de usuarios,
			 * un usuairo va a tener muchos ticket y un ticket tiene un usuario.
			*/
			$table->integer("user_id")->unsigned();
			$table->foreign("user_id")->references("id")->on("users");

			/**
			 * Quiero permitirle a los usuarios que voten por el mismo ticket, necesito un modelo
			 * TicketVote
			*/

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tickets');
	}

}
