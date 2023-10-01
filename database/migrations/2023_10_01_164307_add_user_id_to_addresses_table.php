<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddUserIdToAddressesTable
 */
class AddUserIdToAddressesTable extends Migration
{
    /**
     * Table names.
     *
     * @var string         The main table name for this migration.
     * @var string   The users table.
     */
    protected $table;

    protected $table_users;

    /**
     * Create a new migration instance.
     */
    public function __construct()
    {
        $this->table = config('lecturize.addresses.table', 'addresses');
        $this->table_users = config('lecturize.tables.users.main', 'users');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->unsigned()->index()->after('addressable_id');
            $table->foreign('user_id')
                ->references('id')
                ->on($this->table_users);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
