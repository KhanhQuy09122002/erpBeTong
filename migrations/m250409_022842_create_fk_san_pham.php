<?php

use yii\db\Migration;

/**
 * Class m250409_022842_create_fk_san_pham
 */
class m250409_022842_create_fk_san_pham extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-san_pham-danh_muc',
            'sp_san_pham',
            'id_danh_muc',
            'sp_danh_muc',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-san_pham-loai',
            'sp_san_pham',
            'loai',
            'sp_loai',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-loai_danh_muc',
            'sp_loai',
            'id_danh_muc',
            'sp_danh_muc',
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
            'fk-san_pham-danh_muc',
            'sp_san_pham'
        );

        $this->dropForeignKey(
            'fk-san_pham-loai',
            'sp_san_pham'
        );

        $this->dropForeignKey(
            'fk-loai_danh_muc',
            'sp_loai'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_022842_create_fk_san_pham cannot be reverted.\n";

        return false;
    }
    */
}
