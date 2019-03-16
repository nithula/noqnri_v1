<?php
class SiteController extends Controller
{
    public $layout='//layouts/column2';
    public function actionIndex() {
        $exclusive_privileges = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'created_at asc','limit' => 5));
        $enquiry = new Enquiry();
        if($_POST['Enquiry']){
            $enquiry->attributes = $_POST['Enquiry'];
            $enquiry->created_at = date('Y-m-d H:i:s');
            if($enquiry->validate()&&$enquiry->save()){
                if($_POST['Enquiry']['email_id']!=NULL){
                    $to = $_POST['Enquiry']['email_id'];
                    $subject = Yii::app()->name. " - Enquiry Submit";
                    $myfile = fopen(dirname(dirname(dirname((__FILE__)))).'/templates/enquiry_template.html', "r") or die("Unable to open file!");
                    $html =  fread($myfile,filesize(dirname((dirname(dirname(__FILE__)))).'/templates/enquiry_template.html'));
                    fclose($myfile);
                    $link = "<a href=http://noqnri.com/site/checkmystatus/code/".md5($enquiry->id).">http://noqnri.com/site/checkmystatus/code/".md5($enquiry->id)."</a>";
                    $name = $_POST['Enquiry']['full_name'];
                    $company = Yii::app()->name;
                    $phone = "0484-285-236-05";
                    $gmail = "info@gmail.com";
                    $website = "http://www.noqnri.com";
                    $keys = array('{name}','{msg}','{company_name}','{phone}','{gmail}','{website}');
                    $values =array($name,$link,$company,$phone,$gmail,$website);
                    $htmlContent=str_replace($keys,$values,$html);
                    $headers='From: noreply@noqnri.com \r\n';
                    $headers.='Reply-To: noreply@noqnri.com \r\n';
                    $headers.='X-Mailer: PHP/' . phpversion().'\r\n';
                    $headers.= 'MIME-Version: 1.0' . "\r\n";
                    $headers.= 'Content-type: text/html; charset=iso-8859-1 \r\n';
                    mail($to,$subject,$htmlContent,$headers);
                }
                Yii::app()->user->setFlash('success_flash_msg', 'Enquiry has been submitted successfully');
                $this->redirect(array('site/index'));
            }else{
                Yii::app()->user->setFlash('error_flash_msg', 'Mobile number has been already registered');
                $this->redirect(array('site/index'));
            }
        }
        $this->render('//site/index',array('exclusive_privileges'=>$exclusive_privileges,'enquiry'=>$enquiry));
    }
   
    /*public function actionCountryCode(){
        $CountryData = Country::model()->findAll();
        foreach($CountryData as $country){
            $CountrySingle = Country::model()->findByPk($country->id);
            $CountrySingle->country_phone_code = str_replace("( "," (",$CountrySingle->country_phone_code);
            $CountrySingle->save(false);
        }
    }*/
    
    public function actionCheckmystatus($code){
        $model = Enquiry::model()->findAll();
        $referenceCode = 0;
        foreach($model as $mod){
            if(md5($mod->id)==$code){
                $referenceCode = $mod->id;
                break;
            }
        }
        $modelData = Enquiry::model()->findByPk($referenceCode);
        if(count($modelData)>0){
            $this->render('mail_template',array('modelData'=>$modelData));
        }
    }
    
    public function actionRenderBanner(){
        if(isset($_POST['id'])){
            $categoryDetails = Category::model()->findByPk($_POST['id']);
            if(count($categoryDetails)>0){
                echo $categoryDetails->category_banner;
            }else{
                echo 0; 
            }
        }
    }
    
    public function actionError()
    {
        $error = Yii::app()->errorHandler->error;
        $this->render('//layouts/error',array('error'=>$error));
    }
    public  function actionContent($id){
        if($id=="all"){
            $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $this->render('privilege_list', array(
                'privilegeList' => $privilegeList
            ));
        }else{
            /*$privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>$id,'status'=>'Y'),array('order' => 'id asc','limit' => 25));
            if(!empty($privilegeList)){
                $this->render('privilege_list', array(
                    'privilegeList' => $privilegeList
                ));
            }else{*/
                $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'created_at desc','limit' => 25));
                $categoryDetails = Category::model()->findByPk($id);
                $partnerList = Partner::model()->findAllByAttributes(array('category_id'=>$id,'status'=>'Y'),array('order' => 'created_at desc','limit' => 25));
                $this->render('partner_list', array(
                    'partnerList' => $partnerList,'privilegeList'=>$privilegeList,'categoryDetails'=>$categoryDetails
                ));
            /*}*/
        }
    }
    
    public function actionDetail($id){
        if($id){
            $partnerDetail = Partner::model()->findByPk($id);
            $categoryDetails = Category::model()->findByPk($partnerDetail->category_id);
            $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'created_at desc','limit' => 25));
            $partnerPhotos = PartnerPhotos::model()->findAllByAttributes(array('owner_id'=>$partnerDetail->id));
            $reviewList  = Review::model()->findAllByAttributes(array('status'=>'Y','partner_id'=>$id),array("order" => "rating desc"));
            $reviewListRecent  = Review::model()->findAllByAttributes(array('status'=>'Y','partner_id'=>$id),array("order" => "created_at desc"));
            $review = new Review();
            if($partnerDetail){
                $this->render('partner_detail', array(
                    'partnerDetail' => $partnerDetail,'privilegeList'=>$privilegeList,'categoryDetails'=>$categoryDetails,'partnerPhotos'=>$partnerPhotos,'review'=>$review,'reviewList'=>$reviewList,'reviewListRecent'=>$reviewListRecent
                ));
            }else{
                throw new CHttpException(400,'You are requested page is not found');
            }
        }else{
            throw new CHttpException(401,'You are not authorised to perform this action');
        }
    }
    
    /*public function actionRenderDetail(){
        if($_POST['id']){
            $this->layout=false;
            $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $categoryDetails = Category::model()->findByPk($_POST['id']);
            $partnerList = Partner::model()->findAllByAttributes(array('category_id'=>$_POST['id'],'status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $this->renderPartial('searchInner', array(
                'partnerList' => $partnerList,'privilegeList'=>$privilegeList,'categoryDetails'=>$categoryDetails
            ));
        }
    }*/
    
    public function actionRenderList(){
        if($_POST['id']){
            $this->layout=false;
            $id = $_POST['id'];
            $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $categoryDetails = Category::model()->findByPk($id);
            if($_POST['key']!='0'){
                if($_POST['key']=="Latest"){
                    $order = array('order' => 'created_at desc','limit' => 25);
                }else if($_POST['key']=="Oldest"){
                    $order = array('order' => 'created_at asc','limit' => 25);
                }else if($_POST['key']=="A-Z"){
                    $order = array('order' => 'name asc','limit' => 25);
                }else{
                    $order = array('order' => 'name desc','limit' => 25);
                }
                $partnerList = Partner::model()->findAllByAttributes(array('category_id'=>$id,'status'=>'Y'),$order);
            }else{
                $partnerList = Partner::model()->findAllByAttributes(array('category_id'=>$id,'status'=>'Y'),array('order' => 'created_at desc','limit' => 25));
            }
            $this->renderPartial('partner_list_render', array(
                'partnerList' => $partnerList,'privilegeList'=>$privilegeList,'categoryDetails'=>$categoryDetails,'key'=>$_POST['key']
            ));
        }
    }
    public function actionReviewSubmit(){
        if(isset($_POST)){
            $this->layout=false;
            $review = new Review();
            $review->attributes = $_POST['Review'];
            $review->created_at = date('Y-m-d H:i:s');
            if($review->validate()&&$review->save()){
                $reviewList  = Review::model()->findAllByAttributes(array('status'=>'Y','partner_id'=>$_POST['Review']['partner_id']),array("order" => "rating desc",'limit' => 15));
                $reviewListRecent  = Review::model()->findAllByAttributes(array('status'=>'Y','partner_id'=>$_POST['Review']['partner_id']),array("order" => "created_at desc"));
                $this->renderPartial('reviewResult',array('reviewList'=>$reviewList,'reviewListRecent'=>$reviewListRecent));
            }else{
               echo "0";
            }
        }
    }
}