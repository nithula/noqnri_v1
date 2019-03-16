<?php

/**
 * This is the model class for table "nq_partner".
 *
 * The followings are the available columns in table 'nq_partner':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $contact_person
 * @property string $email_id
 * @property string $geo_location
 * @property string $mode_of_business
 * @property string $working_hours
 * @property string $established_date
 * @property string $google_plus_url
 * @property string $faccebook_url
 * @property string $twitter_url
 * @property string $status
 * @property string $logo
 * @property string $currency
 * @property string $redeem_formula
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Partner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nq_partner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category_id, contact_person, mode_of_business, working_hours, established_date, currency, redeem_formula, created_at, created_by', 'required'),
			array('created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('name, contact_person, email_id, mode_of_business, working_hours, currency', 'length', 'max'=>50),
			array('geo_location, google_plus_url, faccebook_url, twitter_url, logo, redeem_formula', 'length', 'max'=>150),
			array('established_date', 'length', 'max'=>100),
			array('status', 'length', 'max'=>1),
			array('description, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, name, description, contact_person, email_id, geo_location, mode_of_business, working_hours, established_date, google_plus_url, faccebook_url, twitter_url, status, logo, currency, redeem_formula, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),
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
		    'CategoryData'=>array(self::BELONGS_TO,'Category',array('category_id'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
		    'category_id'=>'Category Id',
			'name' => 'Name',
			'description' => 'Description',
			'contact_person' => 'Contact Person',
			'email_id' => 'Email',
			'geo_location' => 'Geo Location',
			'mode_of_business' => 'Mode Of Business',
			'working_hours' => 'Working Hours',
			'established_date' => 'Established Date',
			'google_plus_url' => 'Google Plus Url',
			'faccebook_url' => 'Faccebook Url',
			'twitter_url' => 'Twitter Url',
			'status' => 'Y=Active,N=Inactive',
			'logo' => 'Logo',
			'currency' => 'Currency',
			'redeem_formula' => 'Redeem Formula',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('email_id',$this->email_id,true);
		$criteria->compare('geo_location',$this->geo_location,true);
		$criteria->compare('mode_of_business',$this->mode_of_business,true);
		$criteria->compare('working_hours',$this->working_hours,true);
		$criteria->compare('established_date',$this->established_date,true);
		$criteria->compare('google_plus_url',$this->google_plus_url,true);
		$criteria->compare('faccebook_url',$this->faccebook_url,true);
		$criteria->compare('twitter_url',$this->twitter_url,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('redeem_formula',$this->redeem_formula,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Partner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function Switch_active_inactive($data){
	    $status = ($data->status=='Y')?'checked':'';
	    echo "<input type='checkbox' class='custom-switch' ".$status." name='$data->id'>";
	}
	public function CreatedDate($data) {
	    $date       = $data->created_at;
	    $date       = Common::getTimezone($date,'d M y - h: i a');
	    echo $date;
	}
	public function Email_address($data){
	    if(isset($data->email_id) && $data->email_id != "" )
	        $html = strlen($data->email_id) > 12
	        ? CHtml::tag("span", array("title"=>$data->email_id,"style"=>"color:#555555"), CHtml::encode(substr($data->email_id, 0, 12)) . "...")
	        : CHtml::encode($data->email_id)
	        ;
	        else
	            $html =  "";
	            return $html;
	}
	
	public function PartnerName($data){
	    echo "<a href=".Yii::app()->request->baseUrl.'/Forkinduser/index?parent_id='.$data->id.">".$data->name."</a>";
	}
	
	public function check_last_child($category_id){
	    $parentCategory = Category::model()->findByAttributes(array('parent_category'=>$category_id,'status'=>'Y'));
	    if(count($parentCategory)>0){
	        return 1;
	    }else{
	        return 0;
	    }
	}
	public function get_child_cat($id){
	    $categoryList = Category::model()->findAllByAttributes(array('parent_category'=>$id,'status'=>'Y'));
	    $arr = array ();
	    foreach($categoryList as $category){
	        $arr [] = array (
	            "id" => $category ["id"],
	            "category" => $category ["category"],	            
	            "category_description" => $category ["category_discription"],
	            'image'=>$category["category_image"],
	            "Children" => self::model()->get_child_cat ( $category ["id"] )
	        );
	    }
	    return $arr;
	}
}
