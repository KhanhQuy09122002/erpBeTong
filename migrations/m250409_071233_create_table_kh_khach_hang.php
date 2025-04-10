<?php

use yii\db\Migration;

/**
 * Class m250409_071233_create_table_kh_khach_hang
 */
class m250409_071233_create_table_kh_khach_hang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('kh_khach_hang',[
            'id'=>$this->primaryKey(),
            'doi_tuong'=>$this->string(50)->notNull(),
            'ho_ten'=>$this->string(50)->notNull(),
            'chuc_danh'=>$this->string(50),
             'ten_to_chuc'=>$this->string(255),
             'dia_chi'=>$this->string(255),
             'ma_so_thue'=>$this->string(12),
            'so_tai_khoan'=>$this->string(255),
            'dien_thoai'=>$this->string(12),
            'email'=>$this->string(50),
             'nguoi_tao'=>$this->integer(),
             'thoi_gian_tao'=>$this->datetime(),
           ]); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    { 
        $this->dropTable('kh_khach_hang');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_071233_create_table_kh_khach_hang cannot be reverted.\n";

        return false;
    }
    */
}
