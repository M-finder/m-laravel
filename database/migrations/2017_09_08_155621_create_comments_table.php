<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->string('reply_uids')->nullable();
            $table->integer('aid');
            $table->string('title');
            $table->text('content');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->index(['uid', 'reply_uids','aid'], 'idx_0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
