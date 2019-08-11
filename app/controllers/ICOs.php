<?php

class ICOs extends Controller{
    public function __construct(){
        if(!isLoggedin()){
            redirect('users/login');
        }
        $this->icoModel = $this->model('ICO');
        $this->userModel = $this->model('User');
    }
    public function home(){
        $this->view('admin/dashboard/index');
    }
    public function ico(){
        $icos = $this->icoModel->getIco();
        $data = [
            'ico' => $icos
        ];
        $this->view('admin/dashboard/show_ico',$data);
    }

    public function ico_details($id){
        $ico = $this->icoModel->getIcoDetails($id);
        $ico_team_image = $this->icoModel->getIcoTeamDetails($id);
        $ico_road_map = $this->icoModel->getIcoRoadMap($id);
        $data = [
        'ico' => $ico,
        'ico_team_image' => $ico_team_image,
        'ico_road_map' => $ico_road_map,
        ];
        $this->view('admin/dashboard/ico_detail',$data);
    }

    public function create_ico(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Logo upload
            if(isset($_FILES['logo'])){
                $errors= array();
                $logo_name = $_FILES['logo']['name'];
                $file_size =$_FILES['logo']['size'];
                $file_tmp =$_FILES['logo']['tmp_name'];
                $file_type=$_FILES['logo']['type'];
                $file_ext  =strtolower(end(explode('.',$_FILES['logo']['name'])));
                $extensions= array("jpeg","jpg","png");
                move_uploaded_file($file_tmp,"images/ico_logo/ico_logo".$logo_name);
                
                // if(in_array($file_ext,$extensions)=== false){
                //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                // }
                
                // if($file_size > 2097152){
                //    $errors[]='File size must be excately 2 MB';
                // }
                
                // if(empty($errors)==true){
                //    move_uploaded_file($file_tmp,"images/ico_logo/ico_logo".$file_name);
                //    echo "Success";
                // }else{
                //    print_r($errors);
                // }
             }
             $targetDir = "images/ico_team_image/";
             $allowTypes = array('jpg','png','jpeg','gif');
             
             $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
             $team_imagenamearray = $_FILES['team_image_name']['name'];
             if(!empty(array_filter($_FILES['team_image_name']['name']))){
                 foreach($_FILES['team_image_name']['name'] as $key=>$val){
                     // File upload path
                     $fileName = basename($_FILES['team_image_name']['name'][$key]);
                     $targetFilePath = $targetDir . $fileName;
                     
                     // Check whether file type is valid
                     $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                     if(in_array($fileType, $allowTypes)){
                         // Upload file to server
                         if(move_uploaded_file($_FILES["team_image_name"]["tmp_name"][$key], $targetFilePath)){
                             // Image db insert sql
                             $insertValuesSQL .= "('".$fileName."', NOW()),";
                         }else{
                             $errorUpload .= $_FILES['team_image_name']['name'][$key].', ';
                         }
                     }else{
                         $errorUploadType .= $_FILES['team_image_name']['name'][$key].', ';
                     }
                 }
                }
                 $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'ico_name'=>trim($_POST['ico_name']),
                'ico_email'=>trim($_POST['ico_email']),
                'start_date'=>trim($_POST['start_date']),
                'end_date'=>trim($_POST['end_date']),
                'twitter_id'=>'i23',
                'whitepaper_link'=>trim($_POST['whitepaper_link']),
                'token_abbrevation'=>trim($_POST['token_abbrevation']),
                'project_website'=>trim($_POST['project_website']),
                'ico_round'=>trim($_POST['ico_round']),
                'listing_options'=>trim($_POST['listing_options']),
                'kyc_whitelisting'=>trim($_POST['kyc_whitelisting']),
                'accepted_currency'=>trim($_POST['accepted_currency']),
                'ico_price'=>trim($_POST['ico_price']),
                'ico_supply'=>trim($_POST['ico_supply']),
                'total_supply'=>trim($_POST['total_supply']),
                'hard_cap'=>trim($_POST['hard_cap']),
                'soft_cap'=>trim($_POST['soft_cap']),
                'description'=>trim($_POST['description']),
                'logo'=>$logo_name,
                'youtube_video_link'=>trim($_POST['youtube_video_link']),
                'facebook_url'=>trim($_POST['facebook_url']),
                'twitter_url'=>trim($_POST['twitter_url']),
                'bitcoin_url'=>trim($_POST['bitcoin_url']),
                'medium_url'=>trim($_POST['medium_url']),
                'telegram_url'=>trim($_POST['telegram_url']),
                'linkedin_ico_url'=>trim($_POST['linkedin_ico_url']),
                'roadmap_date'=> $_POST['roadmap_date'],
                'roadmap_title'=>$_POST['roadmap_title'],
                'team_image_name'=> $team_imagenamearray,
                'person_name'=>$_POST['person_name'],
                'team_role'=>$_POST['team_role'],
                'team_linkedin_url'=>$_POST['team_linkedin_url'],
                'user_id' => $_SESSION['user_id'],
                'name_err' => '',
                'email_err' => '',
                'start_date_err' => '',
                'end_date_err' => '',
                'twitter_id_err' => '',
                'whitepaper_link_err' => '',
                'token_abbrevation_err' => '',
                'project_website_err' => '',
                'ico_round_err' => '',
                'listing_options_err' => '',
                'kyc_whitelisting_err' => '',
                'accepted_currency_err' => '',
                'ico_price_err' => '',
                'total_supply_err' => '',
                'hard_cap_err' => '',
                'soft_cap_err' => '',
                'description_err' => '',
                'logo_err' => '',
                'youtube_video_link_err' => '',
                'facebook_url_err' => '',
                'twitter_url_err' => '',
                'bitcoin_url_err' => '',
                'medium_url_err' => '',
                'telegram_url_err' => '',
                'linkedin_ico_url_err' => '',
            ];
            // $final_array= array();
            // $new_array = array('roadmap_date'=> $_POST['roadmap_date'], 'roadmap_title'=>$_POST['roadmap_title']);
            // $final_array=array_merge($data, $new_array);
                
          



            if(empty($data['ico_name'])){
                $data['name_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_email'])){
                $data['email_err'] = 'Please enter the required field';
            }

            if(empty($data['start_date'])){
                $data['start_date_err'] = 'Please enter the required field';
            }

            if(empty($data['end_date'])){
                $data['end_date_err'] = 'Please enter the required field';
            }

            if(empty($data['twitter_id'])){
                $data['twitter_id_err'] = 'Please enter the required field';
            }

            if(empty($data['whitepaper_link'])){
                $data['whitepaper_link_err'] = 'Please enter the required field';
            }

            if(empty($data['token_abbrevation'])){
                $data['token_abbrevation_err'] = 'Please enter the required field';
            }

            if(empty($data['project_website'])){
                $data['project_website_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_round'])){
                $data['ico_round_err'] = 'Please enter the required field';
            }

            if(empty($data['listing_options'])){
                $data['listing_options_err'] = 'Please enter the required field';
            }

            if(empty($data['kyc_whitelisting'])){
                $data['kyc_whitelisting_err'] = 'Please enter the required field';
            }

            if(empty($data['accepted_currency'])){
                $data['accepted_currency_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_price'])){
                $data['ico_price_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_supply'])){
                $data['ico_supply_err'] = 'Please enter the required field';
            }

            if(empty($data['total_supply'])){
                $data['total_supply_err'] = 'Please enter the required field';
            }

            if(empty($data['hard_cap'])){
                $data['hard_cap_err'] = 'Please enter the required field';
            }

            if(empty($data['soft_cap'])){
                $data['soft_cap_err'] = 'Please enter the required field';
            }

            if(empty($data['description'])){
                $data['description_err'] = 'Please enter the required field';
            }

            if(empty($data['logo'])){
                $data['logo_err'] = 'Please enter the required field';
            }

            if(empty($data['youtube_video_link'])){
                $data['youtube_video_link_err'] = 'Please enter the required field';
            }

            if(empty($data['facebook_url'])){
                $data['facebook_url_err'] = 'Please enter the required field';
            }

            if(empty($data['twitter_url'])){
                $data['twitter_url_err'] = 'Please enter the required field';
            }

            if(empty($data['bitcoin_url'])){
                $data['bitcoin_url_err'] = 'Please enter the required field';
            }

            if(empty($data['medium_url'])){
                $data['medium_url_err'] = 'Please enter the required field';
            }

            if(empty($data['telegram_url'])){
                $data['telegram_url_err'] = 'Please enter the required field';
            }

            if(empty($data['linkedin_ico_url'])){
                $data['linkedin_ico_url_err'] = 'Please enter the required field';
            }
            // Check if the data is empty 
            if(empty($data['email_err']) && empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])){
                // echo"<pre>";
                //     print_r($data);
                // echo"</pre>";
                if($this->icoModel->addIco($data)){
                    return("Success");
                } else {
                    die('Something went wrong');
                }

            }else{
                $this->view('admin/dashboard/create_ico',$data);
            }
        } else {
            $this->view('admin/dashboard/create_ico');
        }
    }
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Logo upload
            if(isset($_FILES['logo'])){
                $errors= array();
                $logo_name = $_FILES['logo']['name'];
                $file_size =$_FILES['logo']['size'];
                $file_tmp =$_FILES['logo']['tmp_name'];
                $file_type=$_FILES['logo']['type'];
                $file_ext  =strtolower(end(explode('.',$_FILES['logo']['name'])));
                $extensions= array("jpeg","jpg","png");
                move_uploaded_file($file_tmp,"images/ico_logo/ico_logo".$logo_name);
                
                // if(in_array($file_ext,$extensions)=== false){
                //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                // }
                
                // if($file_size > 2097152){
                //    $errors[]='File size must be excately 2 MB';
                // }
                
                // if(empty($errors)==true){
                //    move_uploaded_file($file_tmp,"images/ico_logo/ico_logo".$file_name);
                //    echo "Success";
                // }else{
                //    print_r($errors);
                // }
             }
             $targetDir = "images/ico_team_image/";
             $allowTypes = array('jpg','png','jpeg','gif');
             
             $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
             $team_imagenamearray = $_FILES['team_image_name']['name'];
             if(!empty(array_filter($_FILES['team_image_name']['name']))){
                 foreach($_FILES['team_image_name']['name'] as $key=>$val){
                     // File upload path
                     $fileName = basename($_FILES['team_image_name']['name'][$key]);
                     $targetFilePath = $targetDir . $fileName;
                     
                     // Check whether file type is valid
                     $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                     if(in_array($fileType, $allowTypes)){
                         // Upload file to server
                         if(move_uploaded_file($_FILES["team_image_name"]["tmp_name"][$key], $targetFilePath)){
                             // Image db insert sql
                             $insertValuesSQL = $fileName;
                         }else{
                             $errorUpload .= $_FILES['team_image_name']['name'][$key].', ';
                         }
                     }else{
                         $errorUploadType .= $_FILES['team_image_name']['name'][$key].', ';
                     }
                 }
                }
                 $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'ico_name'=>trim($_POST['ico_name']),
                'ico_email'=>trim($_POST['ico_email']),
                'start_date'=>trim($_POST['start_date']),
                'end_date'=>trim($_POST['end_date']),
                'twitter_id'=>'i23',
                'whitepaper_link'=>trim($_POST['whitepaper_link']),
                'token_abbrevation'=>trim($_POST['token_abbrevation']),
                'project_website'=>trim($_POST['project_website']),
                'ico_round'=>trim($_POST['ico_round']),
                'listing_options'=>trim($_POST['listing_options']),
                'kyc_whitelisting'=>trim($_POST['kyc_whitelisting']),
                'accepted_currency'=>trim($_POST['accepted_currency']),
                'ico_price'=>trim($_POST['ico_price']),
                'ico_supply'=>trim($_POST['ico_supply']),
                'total_supply'=>trim($_POST['total_supply']),
                'hard_cap'=>trim($_POST['hard_cap']),
                'soft_cap'=>trim($_POST['soft_cap']),
                'description'=>trim($_POST['description']),
                'logo'=>$logo_name,
                'youtube_video_link'=>trim($_POST['youtube_video_link']),
                'facebook_url'=>trim($_POST['facebook_url']),
                'twitter_url'=>trim($_POST['twitter_url']),
                'bitcoin_url'=>trim($_POST['bitcoin_url']),
                'medium_url'=>trim($_POST['medium_url']),
                'telegram_url'=>trim($_POST['telegram_url']),
                'linkedin_ico_url'=>trim($_POST['linkedin_ico_url']),
                'roadmap_id' => $_POST['ico_roadmap_id'],
                'roadmap_date'=> $_POST['roadmap_date'],
                'roadmap_title'=>$_POST['roadmap_title'],
                'ico_image_id' => $_POST['ico_image_id'],
                'team_image_name'=> $insertValuesSQL,
                'person_name'=>$_POST['person_name'],
                'team_role'=>$_POST['team_role'],
                'team_linkedin_url'=>$_POST['team_linkedin_url'],
                'user_id' => $_SESSION['user_id'],
                'name_err' => '',
                'email_err' => '',
                'start_date_err' => '',
                'end_date_err' => '',
                'twitter_id_err' => '',
                'whitepaper_link_err' => '',
                'token_abbrevation_err' => '',
                'project_website_err' => '',
                'ico_round_err' => '',
                'listing_options_err' => '',
                'kyc_whitelisting_err' => '',
                'accepted_currency_err' => '',
                'ico_price_err' => '',
                'total_supply_err' => '',
                'hard_cap_err' => '',
                'soft_cap_err' => '',
                'description_err' => '',
                'logo_err' => '',
                'youtube_video_link_err' => '',
                'facebook_url_err' => '',
                'twitter_url_err' => '',
                'bitcoin_url_err' => '',
                'medium_url_err' => '',
                'telegram_url_err' => '',
                'linkedin_ico_url_err' => '',
            ];
            // $final_array= array();
            // $new_array = array('roadmap_date'=> $_POST['roadmap_date'], 'roadmap_title'=>$_POST['roadmap_title']);
            // $final_array=array_merge($data, $new_array);
                
          



            if(empty($data['ico_name'])){
                $data['name_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_email'])){
                $data['email_err'] = 'Please enter the required field';
            }

            if(empty($data['start_date'])){
                $data['start_date_err'] = 'Please enter the required field';
            }

            if(empty($data['end_date'])){
                $data['end_date_err'] = 'Please enter the required field';
            }

            if(empty($data['twitter_id'])){
                $data['twitter_id_err'] = 'Please enter the required field';
            }

            if(empty($data['whitepaper_link'])){
                $data['whitepaper_link_err'] = 'Please enter the required field';
            }

            if(empty($data['token_abbrevation'])){
                $data['token_abbrevation_err'] = 'Please enter the required field';
            }

            if(empty($data['project_website'])){
                $data['project_website_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_round'])){
                $data['ico_round_err'] = 'Please enter the required field';
            }

            if(empty($data['listing_options'])){
                $data['listing_options_err'] = 'Please enter the required field';
            }

            if(empty($data['kyc_whitelisting'])){
                $data['kyc_whitelisting_err'] = 'Please enter the required field';
            }

            if(empty($data['accepted_currency'])){
                $data['accepted_currency_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_price'])){
                $data['ico_price_err'] = 'Please enter the required field';
            }

            if(empty($data['ico_supply'])){
                $data['ico_supply_err'] = 'Please enter the required field';
            }

            if(empty($data['total_supply'])){
                $data['total_supply_err'] = 'Please enter the required field';
            }

            if(empty($data['hard_cap'])){
                $data['hard_cap_err'] = 'Please enter the required field';
            }

            if(empty($data['soft_cap'])){
                $data['soft_cap_err'] = 'Please enter the required field';
            }

            if(empty($data['description'])){
                $data['description_err'] = 'Please enter the required field';
            }

            if(empty($data['logo'])){
                $data['logo_err'] = 'Please enter the required field';
            }

            if(empty($data['youtube_video_link'])){
                $data['youtube_video_link_err'] = 'Please enter the required field';
            }

            if(empty($data['facebook_url'])){
                $data['facebook_url_err'] = 'Please enter the required field';
            }

            if(empty($data['twitter_url'])){
                $data['twitter_url_err'] = 'Please enter the required field';
            }

            if(empty($data['bitcoin_url'])){
                $data['bitcoin_url_err'] = 'Please enter the required field';
            }

            if(empty($data['medium_url'])){
                $data['medium_url_err'] = 'Please enter the required field';
            }

            if(empty($data['telegram_url'])){
                $data['telegram_url_err'] = 'Please enter the required field';
            }

            if(empty($data['linkedin_ico_url'])){
                $data['linkedin_ico_url_err'] = 'Please enter the required field';
            }
            // Check if the data is empty 
            if(empty($data['email_err']) && empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])&& empty($data['name_err'])){
                // echo"<pre>";
                //     print_r($data);
                // echo"</pre>";
                if($this->icoModel->updateIco($data)){
                    return("Success");
                } else {
                    die('Something went wrong');
                }

            }else{
                // load view with errors
                $this->view('admin/dashboard/ico_update',$data);
            }
        } else {
            $ico = $this->icoModel->getIcoDetails($id);
            $ico_team_image = $this->icoModel->getIcoTeamDetails($id);
            $ico_road_map = $this->icoModel->getIcoRoadMap($id);
            $data = [
            'id' => $id,   
            'ico' => $ico,
            'ico_team_image' => $ico_team_image,
            'ico_road_map' => $ico_road_map,
            ];
            $this->view('admin/dashboard/ico_update',$data);
        }
    }
    public function show_ico(){
        $this->view('admin/dashboard/show_ico');
    }

    public function delete_ico($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if($this->icoModel->deleteIco($id)){
                redirect('icos/ico');
            } else {
                die('Something went wrong');
            }
        }
    }
}