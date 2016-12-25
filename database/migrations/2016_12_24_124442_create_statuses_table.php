<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('value');
            $table->enum('type', [ 'income', 'expense' ]);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->date('due_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statuses', function(Blueprint $table) {
            $table->dropForeign([ 'user_id' ]);
        });

        Schema::dropIfExists('statuses');
    }
}
