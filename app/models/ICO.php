<?php

class ICO{
    private $db;
    public $user_id;
    public function __construct(){
        $this->db = new Database();
        $this->user_id = $_SESSION['user_id'];
    }

    public function getIco(){
        $this->db->query("SELECT * FROM ico_details where user_id = $this->user_id");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getIcoDetails($id){
        $this->db->query("SELECT * from ico_details where ico_id = $id");
        $row = $this->db->resultSet();
        return $row;
    }

    public function getIcoTeamDetails($id){
        $this->db->query("SELECT * from ico_images where ico_id = $id");
        $row = $row = $this->db->resultSet();
        return $row;
    }

    public function getIcoRoadMap($id){
        $this->db->query("SELECT * from ico_roadmaps where ico_id = $id");
        $row = $row = $this->db->resultSet();
        return $row;
    }

    public function addIco($data){

        $this->db->beginTransaction();
        $this->db->query('INSERT INTO ico_details(ico_name,ico_email,start_date,end_date,whitepaper_link,twitter_id,token_abbrevation,project_website,ico_round,listing_options,kyc_whitelisting,accepted_currency,ico_price,ico_supply,total_supply,hard_cap,soft_cap,description,logo,youtube_video_link,facebook_url,twitter_url,bitcoin_url,medium_url,telegram_url,linkedin_ico_url,user_id) VALUES(:ico_name,:ico_email,:start_date,:end_date,:whitepaper_link,:twitter_id,:token_abbrevation,:project_website,:ico_round,:listing_options,:kyc_whitelisting,:accepted_currency,:ico_price,:ico_supply,:total_supply,:hard_cap,:soft_cap,:description,:logo,:youtube_video_link,:facebook_url,:twitter_url,:bitcoin_url,:medium_url,:telegram_url,:linkedin_ico_url,:user_id)');
        // bind values
        $this->db->bind(':ico_name',$data['ico_name']);
        $this->db->bind(':ico_email',$data['ico_email']);
        $this->db->bind(':start_date',$data['start_date']);
        $this->db->bind(':end_date',$data['end_date']);
        $this->db->bind(':twitter_id',$data['twitter_id']);
        $this->db->bind(':twitter_url',$data['twitter_url']);
        $this->db->bind(':whitepaper_link',$data['whitepaper_link']);
        $this->db->bind(':token_abbrevation',$data['token_abbrevation']);
        $this->db->bind(':project_website',$data['project_website']);
        $this->db->bind(':ico_round',$data['ico_round']);
        $this->db->bind(':listing_options',$data['listing_options']);
        $this->db->bind(':kyc_whitelisting',$data['kyc_whitelisting']);
        $this->db->bind(':accepted_currency',$data['accepted_currency']);
        $this->db->bind(':ico_price',$data['ico_price']);
        $this->db->bind(':ico_supply',$data['ico_supply']);
        $this->db->bind(':total_supply',$data['total_supply']);
        $this->db->bind(':hard_cap',$data['hard_cap']);
        $this->db->bind(':soft_cap',$data['soft_cap']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':logo',$data['logo']);
        $this->db->bind(':youtube_video_link',$data['youtube_video_link']);
        $this->db->bind(':facebook_url',$data['facebook_url']);
        $this->db->bind(':twitter_url',$data['twitter_url']);
        $this->db->bind(':bitcoin_url',$data['bitcoin_url']);
        $this->db->bind(':medium_url',$data['medium_url']);
        $this->db->bind(':telegram_url',$data['telegram_url']);
        $this->db->bind(':linkedin_ico_url',$data['linkedin_ico_url']);
        $this->db->bind(':user_id',$data['user_id']);
        // Execute
        $this->db->execute();
        // Second Insert
        $ico_id = $this->db->lastInsertId();
        $person_name = $data['person_name'];
        for($i=0;$i<count($person_name);$i++){
            if(!empty($person_name[$i])){
                $this->db->query('INSERT INTO ico_images(image_name,person_name,team_linkedin_url,team_role,ico_id,user_id)VALUES(:image_name,:person_name,:team_linkedin_url,:team_role,:ico_id,:user_id)');
                $this->db->bind(':image_name',$data['team_image_name'][$i]);
                $this->db->bind(':person_name',$data['person_name'][$i]);
                $this->db->bind(':team_linkedin_url',$data['team_linkedin_url'][$i]);
                $this->db->bind(':team_role',$data['team_role'][$i]);
                $this->db->bind(':ico_id',$ico_id);
                $this->db->bind(':user_id',$data['user_id']);
            }
            // Execute
            $this->db->execute();
        }
        // Third Insert
        $records = $data['roadmap_date'];
        for($i=0;$i<=count($records);$i++){
            if(!empty($records[$i])){
                $this->db->query('INSERT INTO ico_roadmaps(roadmap_date,roadmap_title,ico_id,user_id)VALUES(:roadmap_date,:roadmap_title,:ico_id,:user_id)');    
                $this->db->bind(':roadmap_date',$data['roadmap_date'][$i]);
                $this->db->bind(':roadmap_title',$data['roadmap_title'][$i]);
                $this->db->bind(':ico_id',$ico_id);
                $this->db->bind(':user_id',$data['user_id']);
            }
        $this->db->execute();
    }
        $this->db->endTransaction();
        return true;
    }

    // Update ICO
    public function updateIco($data){
        $this->db->beginTransaction();
        $this->db->query('UPDATE ico_details SET ico_name = :ico_name, ico_email = :ico_email, start_date = :start_date, end_date = :end_date, twitter_url = :twitter_url, whitepaper_link = :whitepaper_link, twitter_id = :twitter_id,token_abbrevation = :token_abbrevation, project_website = :project_website, ico_round = :ico_round,listing_options = :listing_options, kyc_whitelisting = :kyc_whitelisting, accepted_currency = :accepted_currency, ico_price = :ico_price, ico_supply = :ico_supply, total_supply = :total_supply, hard_cap = :hard_cap, soft_cap = :soft_cap,linkedin_ico_url = :linkedin_ico_url, description = :description,logo = :logo, youtube_video_link = :youtube_video_link,facebook_url = :facebook_url,twitter_url = :twitter_url,bitcoin_url = :bitcoin_url,medium_url = :medium_url,telegram_url = :telegram_url, user_id = :user_id WHERE ico_id = :id');
        // bind values
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':ico_name',$data['ico_name']);
        $this->db->bind(':ico_email',$data['ico_email']);
        $this->db->bind(':start_date',$data['start_date']);
        $this->db->bind(':end_date',$data['end_date']);
        $this->db->bind(':twitter_id',$data['twitter_id']);
        $this->db->bind(':twitter_url',$data['twitter_url']);
        $this->db->bind(':whitepaper_link',$data['whitepaper_link']);
        $this->db->bind(':token_abbrevation',$data['token_abbrevation']);
        $this->db->bind(':project_website',$data['project_website']);
        $this->db->bind(':ico_round',$data['ico_round']);
        $this->db->bind(':listing_options',$data['listing_options']);
        $this->db->bind(':kyc_whitelisting',$data['kyc_whitelisting']);
        $this->db->bind(':accepted_currency',$data['accepted_currency']);
        $this->db->bind(':ico_price',$data['ico_price']);
        $this->db->bind(':ico_supply',$data['ico_supply']);
        $this->db->bind(':total_supply',$data['total_supply']);
        $this->db->bind(':hard_cap',$data['hard_cap']);
        $this->db->bind(':soft_cap',$data['soft_cap']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':logo',$data['logo']);
        $this->db->bind(':youtube_video_link',$data['youtube_video_link']);
        $this->db->bind(':facebook_url',$data['facebook_url']);
        $this->db->bind(':twitter_url',$data['twitter_url']);
        $this->db->bind(':bitcoin_url',$data['bitcoin_url']);
        $this->db->bind(':medium_url',$data['medium_url']);
        $this->db->bind(':telegram_url',$data['telegram_url']);
        $this->db->bind(':linkedin_ico_url',$data['linkedin_ico_url']);
        $this->db->bind(':user_id',$data['user_id']);
        // Execute
        $this->db->execute();
        // team update
        $person_name = $data['person_name'];
        $team_member_id = $data['ico_image_id'];
        foreach($team_member_id as $i => $id){
            if(!empty($person_name[$i])){
                $this->db->query('UPDATE ico_images SET person_name = :person_name, team_linkedin_url = :team_linkedin_url,team_role = :team_role WHERE ico_image_id = :id');
                $this->db->bind(':id', $id); 
                // $this->db->bind(':image_name',$data['team_image_name']);
                $this->db->bind(':person_name',$data['person_name'][$i]);
                $this->db->bind(':team_linkedin_url',$data['team_linkedin_url'][$i]);
                $this->db->bind(':team_role',$data['team_role'][$i]);
            }
            // Execute
            $this->db->execute();
        }
        // foreach($team_member_id as $i => $id){
                $this->db->query('UPDATE ico_images SET image_name = :image_name WHERE ico_image_id = :id');
                $this->db->bind(':id', $id); 
                $this->db->bind(':image_name',$data['team_image_name'][$i]);
                $this->db->execute();
            // }

        // roadmap update
        $records = $data['roadmap_date'];
        $roadmap_id = $data['roadmap_id'];
        foreach($roadmap_id as $i => $id){
            if(!empty($records[$i])){
                $this->db->query('UPDATE ico_roadmaps SET roadmap_date = :roadmap_date,roadmap_title = :roadmap_title,user_id = :user_id WHERE ico_roadmap_id = :id');
                $this->db->bind(':id',$id);    
                $this->db->bind(':roadmap_date',$data['roadmap_date'][$i]);
                $this->db->bind(':roadmap_title',$data['roadmap_title'][$i]);
                $this->db->bind(':user_id',$data['user_id']);
            }
        $this->db->execute();
    }

        $this->db->endTransaction();
        return true;
    }
    public function deleteIco($id){
        $this->db->query('DELETE FROM ico_details WHERE ico_id = :id');
        $this->db->bind(':id',$id);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}