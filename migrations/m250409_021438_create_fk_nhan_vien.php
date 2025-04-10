<?php

use yii\db\Migration;

/**
 * Class m250409_021438_create_fk_nhan_vien
 */
class m250409_021438_create_fk_nhan_vien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-nhan_vien-phong_ban',
            'nv_nhan_vien',
            'id_phong_ban',
            'nv_phong_ban',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-nhan_vien-phong_ban',
            'nv_nhan_vien'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_021438_create_fk_nhan_vien cannot be reverted.\n";

        return false;
    }
    */
}
