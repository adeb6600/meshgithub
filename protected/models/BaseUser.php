<?php

/**
 * This is the model class for table "base_user".
 *
 * The followings are the available columns in table 'base_user':
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $joinStamp
 * @property integer $activityStamp
 * @property string $accountType
 * @property integer $emailVerify
 * @property integer $joinIp
 */
class BaseUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaseUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'base_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('joinIp ,email', 'required'),
			array('joinStamp, activityStamp, emailVerify,', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>128),
		array('password', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, username, password, joinStamp, activityStamp, accountType, emailVerify, joinIp', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'joinStamp' => 'Join Stamp',
			'activityStamp' => 'Activity Stamp',
			'accountType' => 'Account Type',
			'emailVerify' => 'Email Verify',
			'joinIp' => 'Join Ip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('joinStamp',$this->joinStamp);
		$criteria->compare('activityStamp',$this->activityStamp);
		$criteria->compare('accountType',$this->accountType,true);
		$criteria->compare('emailVerify',$this->emailVerify);
		$criteria->compare('joinIp',$this->joinIp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}