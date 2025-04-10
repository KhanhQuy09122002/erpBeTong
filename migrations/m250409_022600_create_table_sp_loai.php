<?php

use yii\db\Migration;

/**
 * Class m250409_022600_create_table_sp_loai
 */
class m250409_022600_create_table_sp_loai extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sp_loai',[
            'id'=>$this->primaryKey(),
             'ten_loai'=>$this->string(50)->notNull(),
             'id_danh_muc'=>$this->integer()->notNull(),
             'nguoi_tao'=>$this->integer(),
             'thoi_gian_tao'=>$this->datetime(),
           ]);  
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sp_loai');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_022600_create_table_sp_loai cannot be reverted.\n";

        return false;
    }
    */
}
