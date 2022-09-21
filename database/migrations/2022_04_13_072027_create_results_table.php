<?php

use App\Models\DataUser;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();
            $table->integer('total_points');
            $table->string('hasil_survei');
            $table->bigInteger('jenis_survei')->unsigned();
            // $table->foreign('jenis_survei')->references('id')->on('categories')->onDelete('cascade');;
            $table->timestamps();
            $table->foreign('jenis_survei')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
