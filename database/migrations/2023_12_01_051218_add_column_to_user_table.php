
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('username');
            $table->string('introduction');
            $table->string('avatar')->after('name');
            $table->string('qualification');
            $table->string('SNS');
            $table->softDeletes();  // ソフトデリート
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
          
            $table->dropColumn('username');
            $table->dropColumn('introduction');
            $table->dropColumn('avatar');
            $table->dropColumn('qualification');
            $table->dropColumn('SNS');
            $table->dropSoftDeletes();  // ソフトデリート
        });
    }
};
