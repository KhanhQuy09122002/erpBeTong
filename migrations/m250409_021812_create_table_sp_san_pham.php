<?php

use yii\db\Migration;

/**
 * Class m250409_021812_create_table_sp_san_pham
 */
class m250409_021812_create_table_sp_san_pham extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sp_san_pham',[
            'id'=>$this->primaryKey(),
             'ten_san_pham'=>$this->string()->notNull(),
             'id_danh_muc'=>$this->integer()->notNull(),
             'don_vi_tinh'=>$this->string(20)->notNull(),
             'loai'=>$this->integer(),
             'gia'=>$this->double()->notNull(),
             'nguoi_tao'=>$this->integer(),
             'thoi_gian_tao'=>$this->datetime(),
           ]);   

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sp_san_pham');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_021812_create_table_sp_san_pham cannot be reverted.\n";

        return false;
    }
    */
}
