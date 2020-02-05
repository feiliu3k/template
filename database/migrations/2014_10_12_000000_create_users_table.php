<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('creator')->default(0)->index()->comment('创建者');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('real_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('gender')->default('none')->comment('性别：none/female/male');
            $table->unsignedBigInteger('phone')->unique()->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('password')->nullable();
            $table->string('status')->default('inactivated')->comment('状态：inactivated/active/frozen');
            $table->json('cache')->nullable()->comment('数据缓存');
            $table->json('properties')->nullable()->comment('自定义信息');
            $table->json('settings')->nullable()->comment('用户设置');
            $table->boolean('is_visible')->default(true)->comment('是否可见');
            $table->boolean('is_admin')->default(false)->comment('是否为公司管理员');
            $table->timestamp('last_active_at')->nullable()->comment('最后活跃时间');
            $table->timestamp('last_refreshed_at')->nullable()->comment('上次同步时间');
            $table->timestamp('frozen_at')->nullable();
            $table->timestamp('status_remark')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
