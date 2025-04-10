<?php

use yii\db\Migration;

/**
 * Class m250409_021204_create_table_nv_phong_ban
 */
class m250409_021204_create_table_nv_phong_ban extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('nv_phong_ban',[
            'id'=>$this->primaryKey(),
             'ten_phong_ban'=>$this->string(30)->notNull(),
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
        $this->dropTable('nv_phong_ban');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_021204_create_table_nv_phong_ban cannot be reverted.\n";

        return false;
    }
    */
}
