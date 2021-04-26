<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('uid')->unique()->comment('用户id');
            $table->string('nickname')->comment('用户昵称');
            $table->string('email')->unique()->nullable()->comment('用户邮箱');
            $table->string('real_name')->default('')->comment('真实姓名');
            $table->integer('birthday')->default(0)->comment('生日');
            $table->string('card_id')->default('')->comment('身份证号码');
            $table->string('mark')->default('')->comment('用户备注');
            $table->integer('partner_id')->default(0)->comment('合伙人id');
            $table->integer('group_id')->default(0)->comment('用户分组id');
            $table->string('avatar')->comment('用户头像');
            $table->char('phone', 15)->nullable()->comment('手机号码');
            $table->timestamp('add_time')->nullable()->comment('添加时间');
            $table->ipAddress('add_ip')->default('')->comment('添加ip');
            $table->timestamp('last_time')->nullable()->comment('最后一次登录时间');
            $table->ipAddress('last_ip')->default('')->comment('最后一次登录ip');
            $table->decimal('now_money', 8, 2)->default(0)->comment('用户余额');
            $table->decimal('brokerage_price', 8, 2)->default(0)->comment('佣金金额');
            $table->integer('integral')->default(0)->comment('用户剩余积分');
            $table->decimal('exp', 8, 2)->default(0)->comment('会员经验');
            $table->integer('sign_num')->default(0)->comment('连续签到天数');
            $table->tinyInteger('status')->index()->default(1)->comment('1为正常，0为禁止');
            $table->tinyInteger('level')->unsigned()->index()->default(0)->comment('等级');
            $table->integer('spread_uid')->index()->default(0)->comment('推广员id');
            $table->timestamp('spread_time')->nullable()->comment('推广员关联时间');
            $table->string('user_type', 32)->comment('用户类型');
            $table->tinyInteger('is_promoter')->index()->default(0)->comment('是否为推广员');
            $table->integer('pay_count')->default(0)->comment('用户购买次数');
            $table->integer('spread_count')->default(0)->comment('下级人数');
            $table->timestamp('clean_time')->nullable()->comment('清理会员时间');
            $table->string('addres')->default('')->comment('详细地址');
            $table->string('login_type')->default('')->comment('用户登陆类型，h5,wechat,routine');
            $table->string('record_phone')->default('0')->comment('记录临时电话');
            $table->tinyInteger('is_money_level')->default(0)->comment('会员来源  0: 购买商品升级   1：花钱购买的会员2: 会员卡领取');
            $table->tinyInteger('is_ever_level')->default(0)->comment('是否永久性会员  0: 非永久会员  1：永久会员');
            $table->timestamp('overdue_time')->nullable()->comment('会员到期时间');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->comment('用户密码');
            $table->rememberToken();
            $table->timestamps();
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
