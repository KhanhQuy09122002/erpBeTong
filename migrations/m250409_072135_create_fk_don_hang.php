<?php

use yii\db\Migration;

/**
 * Class m250409_072135_create_fk_don_hang
 */
class m250409_072135_create_fk_don_hang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-don_hang-khach_hang',
            'dh_don_hang',
            'id_khach_hang',
            'kh_khach_hang',
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
            'fk-don_hang-khach_hang',
            'dh_don_hang'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_072135_create_fk_don_hang cannot be reverted.\n";

        return false;
    }
    */
}
