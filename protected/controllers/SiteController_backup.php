<?php
class SiteController extends Controller
{
    public $layout='//layouts/column2';
    public function actionIndex() {
        $exclusive_privileges = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 5));
        $enquiry = new Enquiry();
        if($_POST['Enquiry']){//echo "<pre>";print_r($_POST['Enquiry']);die;
            $enquiry->attributes = $_POST['Enquiry'];
            $enquiry->created_at = date('Y-m-d H:i:s');
            if($enquiry->validate()&&$enquiry->save()){
                Yii::app()->user->setFlash('success_flash_msg', 'Enquiry has been submitted successfully');
                $this->redirect(array('site/index'));
            }
        }
        $this->render('//site/index',array('exclusive_privileges'=>$exclusive_privileges,'enquiry'=>$enquiry));
        
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
                $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 25));
                $categoryDetails = Category::model()->findByPk($id);
                $partnerList = Partner::model()->findAllByAttributes(array('category_id'=>$id,'status'=>'Y'),array('order' => 'id asc','limit' => 25));
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
            $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 25));
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
    
    public function actionRenderDetail(){
        if($_POST['id']){
            $this->layout=false;
            $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $categoryDetails = Category::model()->findByPk($_POST['id']);
            $partnerList = Partner::model()->findAllByAttributes(array('category_id'=>$_POST['id'],'status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $this->renderPartial('searchInner', array(
                'partnerList' => $partnerList,'privilegeList'=>$privilegeList,'categoryDetails'=>$categoryDetails
            ));
        }
    }
    
    public function actionRenderList(){
        if($_POST['id']){
            $this->layout=false;
            $id = $_POST['id'];
            $privilegeList = Category::model()->findAllByAttributes(array('parent_category'=>'0','status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $categoryDetails = Category::model()->findByPk($id);
            $partnerList = Partner::model()->findAllByAttributes(array('category_id'=>$id,'status'=>'Y'),array('order' => 'id asc','limit' => 25));
            $this->renderPartial('partner_list_render', array(
                'partnerList' => $partnerList,'privilegeList'=>$privilegeList,'categoryDetails'=>$categoryDetails
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
                $reviewList  = Review::model()->findAllByAttributes(array('status'=>'Y','partner_id'=>$_POST['Review']['partner_id']));
                $this->renderPartial('reviewPage',array('reviewList',$reviewList));
            }else{
               echo "0";
            }
        }
    }
}