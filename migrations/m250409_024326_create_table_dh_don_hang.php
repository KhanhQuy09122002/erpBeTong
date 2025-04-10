<?php

use yii\db\Migration;

/**
 * Class m250409_024326_create_table_dh_don_hang
 */
class m250409_024326_create_table_dh_don_hang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dh_don_hang',[
            'id'=>$this->primaryKey(),
            'id_khach_hang'=>$this->integer()->notNull(),
            'ten_cong_trinh'=>$this->string(50),
            'dia_diem'=>$this->string(),
            'hang_muc_xay_dung'=>$this->string(20),
            'nguoi_tiep_nhan_don_hang'=>$this->string(50)->notNull(),
            'ngay_nhap_don_hang'=>$this->date()->notNull(),
            'nhan_vien_thuc_hien'=>$this->integer(),
            'tong_gia_tri_don_hang'=>$this->integer(),
            'yeu_cau_giam_gia'=>$this->text(),
            'trang_thai_duyet_giam_gia'=>$this->string(20),
            'nguoi_duyet'=>$this->integer(),
            'ghi_chu_nguoi_duyet'=>$this->text(),
            'gia_cuoi_cung'=>$this->integer(),
            'trang_thai'=>$this->string(30),
            'nguoi_tao'=>$this->integer(),
            'thoi_gian_tao'=>$this->datetime(),
           ]); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dh_don_hang');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250409_024326_create_table_dh_don_hang cannot be reverted.\n";

        return false;
    }
    */
}
