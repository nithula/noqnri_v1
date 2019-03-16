<?php

class Common {
    public static function getTimezone($time = "", $format = "") {
        // timezone by php friendly values
        $date = new DateTime($time, new DateTimeZone('UTC'));
        if(isset($_COOKIE['Timezone'])){
            $date->setTimezone(new DateTimeZone($_COOKIE['Timezone']));
        }else{
            $date->setTimezone(new DateTimeZone('IST'));
        }
        $time= $date->format($format);
        return $time;
        //set the timezone here
        
    }
    public static function activityLog($user_id,$type,$message,$created_on){
        $Activity = new ActivityLog();
        $Activity->login_id=$user_id;
        $Activity->type=$type;
        $Activity->message=$message;
        $Activity->created_on=$created_on;
        $Activity->save();
    }
    public static function urldata(){
        if($_SERVER[HTTP_HOST]=="localhost"){
            return "http://localhost/app.noqnri.com";
        }else{
            return "http://app.noqnri.com";
        }
    }
}

?>
