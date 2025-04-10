<?php

use yii\db\Migration;

/**
 * Class m250409_022402_create_table_sp_danh_muc
 */
class m250409_022402_create_table_sp_danh_muc extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sp_danh_muc',[
            'id'=>$this->primaryKey(),
             'ten_danh_muc'=>$this->string(50)->notNull(),
             'ghi_chu'=>$this->text(),
             'nguoi_tao'=>$this->integer(),
             'thoi_gian_tao'=>$this->datetime(),
           ]);   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sp_danh_muc');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_022402_create_table_sp_danh_muc cannot be reverted.\n";

        return false;
    }
    */
}
