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
    public static function getUserList($roles = ['administrator']){
        $users = QueryBuilder::getUsersByRoles($roles);
        return $users;
    }
    //public static function getMemberJobTitle($member_id){
    //    $info = get_post_meta($member_id,'job_info',true);
    //    $title = $info['job_title'];
    //    return $title;
    //}
    //public static function getMemberSocialData($member_id){
    //    $info = get_post_meta($member_id,'contact_info',true);
    //    $contact = '';
    //    if(!empty($info['website'])){
    //        $contact .= '<a class="ui circular world icon button" href="'.$info['website'].'" target="_blank" style="background-color:#20866a;color:#ffffff;">
    //                        <i class="world icon"></i>
    //                    </a>';
    //    }
    //    if(!empty($info['email'])){
    //        $contact .= '<a class="ui circular mail icon button" href="'.$info['email'].'" target="_blank" style="background-color:#e86b21;color:#ffffff;">
    //                        <i class="mail icon"></i>
    //                    </a>';
    //    }
    //    if(!empty($info['linkedin'])){
    //        $contact .= '<a class="ui circular linkedin icon button" href="'.$info['linkedin'].'" target="_blank">
    //                        <i class="linkedin icon"></i>
    //                    </a>';
    //    }
    //    if(!empty($info['github'])){
    //        $contact .= '<a class="ui circular github icon button" href="'.$info['github'].'" target="_blank" style="background-color:#303335;color:#ffffff;">
    //                        <i class="github icon"></i>
    //                    </a>';
    //    }
    //    if(!empty($info['skype'])){
    //        $contact .= '<a class="ui circular skype icon button" href="'.$info['skype'].'" target="_blank" style="background-color:#3E9DD7;color:#ffffff;">
    //                        <i class="skype icon"></i>
    //                    </a>';
    //    }
    //    return $contact;
    //}
}