<?php namespace Pensoft\Links\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftLinksLink extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pensoft_links_link')) {
            Schema::create('pensoft_links_link', function($table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('title', 255);
                $table->string('url');
                $table->text('content')->nullable();
                $table->integer('category_id');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->integer('sort_order')->default(0);
            });
        }
    }
    
    public function down()
    {
        if (Schema::hasTable('pensoft_links_link')) {
            Schema::dropIfExists('pensoft_links_link');
        }
    }
}
