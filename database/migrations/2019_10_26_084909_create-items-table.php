<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('checklist_id')->require()->unsigned();
            $table->bigInteger('user_id')->require()->unsigned();        
            $table->string('description')->required();
            $table->boolean('is_completed')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->bigInteger('completed_by')->nullable();
            $table->timestamp('due')->nullable();
            $table->integer('due_interval')->nullable();
            $table->enum('due_unit', ['minute','hour','day','week','month'])->nullable();
            $table->tinyInteger('urgency')->nullable();           
            $table->unsignedInteger('assignee_id')->nullable();
            $table->unsignedInteger('task_id')->nullable();           
            $table->bigInteger('updated_by')->unsigned()->nullable();;
            $table->bigInteger('created_by')->unsigned()->nullable();;            
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
