<?php

namespace Experiensa\Modules;

use WP_Query;
/*$users = QueryBuilder::getUsersByRoles(['administrator']);
foreach($users as $user){
    $info = QueryBuilder::getUserBasicInfo($user);
    echo "<pre>";
print_r($info);
echo "</pre>";
    $metas = get_user_meta($info['ID']);
    echo "<pre>";
    print_r($metas);
    echo "</pre>";
}*/
class Users
{
    public static function getUserList($roles = ['administrator'], $basic = false){
        $users = QueryBuilder::getUsersByRoles($roles);
        if($basic){
            $info = array();
            foreach($users as $user){
                $data = QueryBuilder::getUserBasicInfo($user);
                $info[] = $data;
            }
            return $info;
        }else{
            return $users;
        }
    }

    public static function getUserMetaFields($user_id){
        return get_user_meta($user_id);
    }
    public static function getUserSingleMeta($user_id,$key){
        return get_user_meta($user_id,$key,true);
    }
    public static function getUserSocialButtons($user_id){
        $social = '';
        $fb = self::getUserSingleMeta($user_id, 'user_facebook');
        if(!empty($fb)){
            $social .= '<a class="ui circular facebook icon button" href="'.$fb.'" target="_blank">
                            <i class="facebook icon"></i>
                        </a>';
        }
        $linkedin = self::getUserSingleMeta($user_id, 'user_linkedin');
        if(!empty($linkedin)){
            $social .= '<a class="ui circular linkedin icon button" href="'.$linkedin.'" target="_blank">
                            <i class="linkedin icon"></i>
                        </a>';
        }
        $github = self::getUserSingleMeta($user_id, 'user_github');
        if(!empty($linkedin)){
            $social .= '<a class="ui circular github icon button" href="'.$github.'" target="_blank" style="background-color:#303335;color:#ffffff;">
                            <i class="github icon"></i>
                        </a>';
        }
        $twitter = self::getUserSingleMeta($user_id, 'user_twitter');
        if(!empty($twitter)){
            $social .= '<a class="ui circular twitter icon button" href="'.$twitter.'" target="_blank">
                            <i class="twitter icon"></i>
                        </a>';
        }
        $skype = self::getUserSingleMeta($user_id, 'user_skype');
        if(!empty($skype)){
            $social .= '<a class="ui circular skype icon button" href="'.$skype.'" target="_blank" style="background-color:#3E9DD7;color:#ffffff;">
                            <i class="skype icon"></i>
                        </a>';
        }
        return $social;
    }
    public static function getContactButtons($user){
        $contact = '';
        $url = $user['url'];
        if(!empty($url)){
            $contact .= '<a class="ui circular world icon button" href="'.$url.'" target="_blank" style="background-color:#20866a;color:#ffffff;">
                            <i class="world icon"></i>
                        </a>';
        }
        $email = $user['email'];
        if(!empty($email)){
            $contact .= '<a class="ui circular mail icon button" href="mailto:'.$email.'" target="_blank" style="background-color:#f9bf35;color:#ffffff;">
                            <i class="mail icon"></i>
                        </a>';
        }
        $contact .= self::getUserSocialButtons($user['ID']);
        return $contact;
    }

    public static function getExtraInfo(){

    }
    public static function getProfilePicture($user_id,$size = false){
        $profile_id = get_user_meta($user_id,'user_profile_photo',true);
        if(!empty($profile_id)){
            if($size !== false){
                if($size == 'thumbnail_url'){
                    $profile_url = wp_get_attachment_thumb_url( $profile_id );
                }else{
                    $profile_url = wp_get_attachment_image($profile_id,'thumbnail');
                }
            }else
                $profile_url = wp_get_attachment_url($profile_id);
        }else{
            $avatar = get_avatar_url($user_id,['default'=>'mm']);
            $profile_url = $avatar;
        }
        
        return $profile_url;
    }
    public static function getFullName($user_id){
        $first = get_user_meta($user_id,'first_name',true);
        $last = get_user_meta($user_id,'last_name',true);
        return $first.' '.$last;        
    }
    public static function getJobTitle($user_id){
        $title = get_user_meta($user_id,'user_title',true);
        return $title;
    }
}