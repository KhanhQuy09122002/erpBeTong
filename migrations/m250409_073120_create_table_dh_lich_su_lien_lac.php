<?php

use yii\db\Migration;

/**
 * Class m250409_073120_create_table_dh_lich_su_lien_lac
 */
class m250409_073120_create_table_dh_lich_su_lien_lac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dh_lich_su_lien_lac',[
            'id'=>$this->primaryKey(),
            'id_don_hang'=>$this->integer()->notNull(),
            'nhan_vien_lien_lac'=>$this->string(50),
            'thoi_gian_lien_lac'=>$this->datetime()->notNull(),
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
        $this->dropTable('dh_lich_su_lien_lac');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_073120_create_table_dh_lich_su_lien_lac cannot be reverted.\n";

        return false;
    }
    */
}
