<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertRootUser extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users')){
            Schema::disableForeignKeyConstraints();
                DB::table('users')->insert([
                    'name' => 'Root',
                    'type' => 'ADMIN',
                    'role' => 'ROOT',
                    'email' => 'root@root.com',
                    'password' => \Illuminate\Support\Facades\Hash::make('qwertyuiop') ,
                    'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
                ]);
            Schema::enableForeignKeyConstraints();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->where('email','root@root.com')->delete();
        Schema::enableForeignKeyConstraints();
    }
}
