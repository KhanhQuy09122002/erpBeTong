<?php

use yii\db\Migration;

/**
 * Class m250409_074719_create_fk_ls
 */
class m250409_074719_create_fk_ls extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-ls_gap_mat-don_hang',
            'dh_lich_su_gap_mat',
            'id_don_hang',
            'dh_don_hang',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-ls_lien_lac-don_hang',
            'dh_lich_su_lien_lac',
            'id_don_hang',
            'dh_don_hang',
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
            'fk-ls_gap_mat-don_hang',
            'dh_lich_su_gap_mat'
        );
        $this->dropForeignKey(
            'fk-ls_lien_lac-don_hang',
            'dh_lich_su_lien_lac'
        );

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_074719_create_fk_ls cannot be reverted.\n";

        return false;
    }
    */
}
