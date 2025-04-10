<?php

use yii\db\Migration;

/**
 * Class m250318_035211_create_table_nv_nhan_vien
 */
class m250318_035211_create_table_nv_nhan_vien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('nv_nhan_vien',[
            'id'=>$this->primaryKey(),
            'id_phong_ban'=>$this->integer()->notNull(),
             'ho_ten'=>$this->string(50)->notNull(),
             'chuc_vu'=>$this->string(50),
             'so_cccd'=>$this->string(15),
             'email'=>$this->string(50),
             'so_dien_thoai'=>$this->string(13),
             'dia_chi'=>$this->string(255),
             'tai_khoan'=>$this->integer(),
             'trinh_do'=>$this->string(20),
             'trang_thai'=>$this->string(20),
             'gioi_tinh'=>$this->integer(),
             'ngay_sinh'=>$this->date(),
             'nguoi_tao'=>$this->integer(),
             'thoi_gian_tao'=>$this->datetime(),
           ]);   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('nv_nhan_vien');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250318_035211_create_table_nv_nhan_vien cannot be reverted.\n";

        return false;
    }
    */
}
