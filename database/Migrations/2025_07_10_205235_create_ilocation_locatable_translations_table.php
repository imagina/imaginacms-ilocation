<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::create('ilocation__locatable_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->string('title');
      $table->string('description');

      $table->integer('locatable_id')->unsigned();
      $table->string('locale')->index();
      $table->unique(['locatable_id', 'locale']);
      $table->foreign('locatable_id')->references('id')->on('ilocation__locatables')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('ilocation__locatable_translations', function (Blueprint $table) {
      $table->dropForeign(['locatable_id']);
    });
    Schema::dropIfExists('ilocation__locatable_translations');
  }
};
