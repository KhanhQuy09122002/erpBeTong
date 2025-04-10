<?php

namespace app\modules\nhanvien\models\base;

use Yii;
use app\modules\user\models\User;
use app\modules\nhanvien\models\PhongBan;
use app\custom\CustomFunc;
/**
 * This is the model class for table "nv_nhan_vien".
 *
 * @property int $id
 * @property int $id_phong_ban
 * @property string $ho_ten
 * @property string|null $chuc_vu
 * @property string|null $so_cccd
 * @property string|null $email
 * @property string|null $so_dien_thoai
 * @property string|null $dia_chi

 * @property int|null $tai_khoan
 * @property string|null $trinh_do
 * @property string|null $trang_thai
 * @property string|null $ngay_sinh
 * @property int|null $gioi_tinh
 * @property int|null nguoi_tao
 * @property string|null thoi_gian_tao 
 *
 * @property NvPhongBan $phongBan
 * @property User $taiKhoan
 */
class NhanVienBase extends \app\models\NvNhanVien
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nv_nhan_vien';
    }
    public function getNgaySinh(){
        return CustomFunc::convertYMDToDMY($this->ngay_sinh);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_phong_ban', 'ho_ten'], 'required'],
            [['id_phong_ban', 'tai_khoan','gioi_tinh','nguoi_tao'], 'integer'],
            [['thoi_gian_tao','ngay_sinh'], 'safe'],
            [['ho_ten', 'chuc_vu', 'email'], 'string', 'max' => 50],
            [['so_cccd'], 'string', 'max' => 15],
            [['so_dien_thoai'], 'string', 'max' => 13],
            [['dia_chi'], 'string', 'max' => 255],
            [['trinh_do', 'trang_thai'], 'string', 'max' => 20],
            [['id_phong_ban'], 'exist', 'skipOnError' => true, 'targetClass' => PhongBan::class, 'targetAttribute' => ['id_phong_ban' => 'id']],
            [['tai_khoan'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['tai_khoan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_phong_ban' => 'Phòng ban',
            'ho_ten' => 'Họ tên',
            'chuc_vu' => 'Chức vụ',
            'so_cccd' => 'Số căn cước',
            'email' => 'Email',
            'so_dien_thoai' => 'Số điện thoại',
            'dia_chi' => 'Địa chỉ',
           
            'tai_khoan' => 'Tài khoản',
            'trinh_do' => 'Trình độ',
            'trang_thai' => 'Trạng thái',
      
            'gioi_tinh'=>'Giới tính',
            'ngay_sinh'=>'Ngày sinh',
            'nguoi_tao'=>'Người tạo',
            'thoi_gian_tao'=>'Thời gian tạo',
        ];
    }


    public function beforeSave($insert) {
        $this->ngay_sinh = CustomFunc::convertDMYToYMD($this->ngay_sinh);
        if ($this->isNewRecord) {
            $this->nguoi_tao = Yii::$app->user->identity->id;
            $this->thoi_gian_tao = date('Y-m-d H:i:s');
            $this->ngay_sinh = CustomFunc::convertDMYToYMD($this->ngay_sinh);
            
        }
        return parent::beforeSave($insert);
    }

    /**
     * Gets query for [[PhongBan]].
     *
     * @return \yii\db\ActiveQuery
     */
 
}
