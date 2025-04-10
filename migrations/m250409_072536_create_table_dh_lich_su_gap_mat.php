<?php

use yii\db\Migration;

/**
 * Class m250409_072536_create_table_dh_lich_su_gap_mat
 */
class m250409_072536_create_table_dh_lich_su_gap_mat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dh_lich_su_gap_mat',[
            'id'=>$this->primaryKey(),
            'id_don_hang'=>$this->integer()->notNull(),
            'nhan_vien_phu_trach'=>$this->string(50),
            'thoi_gian_lam_viec'=>$this->datetime()->notNull(),
            'noi_dung_lam_viec'=>$this->text()->notNull(),
            'ket_qua'=>$this->string(30)->notNull(),
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
        $this->dropTable('dh_lich_su_gap_mat');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_072536_create_table_dh_lich_su_gap_mat cannot be reverted.\n";

        return false;
    }
    */
}
