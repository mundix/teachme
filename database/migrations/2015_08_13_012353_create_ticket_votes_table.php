<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_votes', function(Blueprint $table)
		{
			$table->increments('id');
			/**
			 * Esta table de votos solo tendra dos campos adicionales, una referentcia ala tabla de usaurios y
			 * otra de ticketes
			 * Una especie de tabla pivot
			*/
			$table->integer("user_id")->unsigned();
			$table->foreign("user_id")->references("id")->on("users");

			$table->integer("ticket_id")->unsigned();
			$table->foreign("ticket_id")->references("id")->on("tickets");

			/**
			 * Ahora falta una tabla relacionada a tickets votes donde el usuario podra agrear un comentario
			 * asociado al ticket
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
		Schema::drop('ticket_votes');
	}

}
