<?php require APPROOT . '/views/admin/dashboard/header.php';?>
<div class="col-lg-12">
  <div class="card">
    <div class="card-header">
      <strong>Fill your ico details</strong>
      <small> Form
      </small>
    </div>
  <form method="post" action="<?php echo URLROOT; ?>/icos/create_ico" enctype="multipart/form-data">
    <div class="card-body card-block">
      <div class="form-group">
        <label for="company" class=" form-control-label">ICO Name
        </label>
        <input type="text" id="iconame" name="ico_name" placeholder="Enter your ico name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="vat" class=" form-control-label">Email
        </label>
        <input type="email" id="email" name="ico_email" placeholder="Enter your email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="street" class=" form-control-label">Start Date
        </label>
        <input type="text" id="start_date" name="start_date" placeholder="Enter start date" class="form-control <?php echo (!empty($data['start_date_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['start_date_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="street" class=" form-control-label">End Date
        </label>
        <input type="text" id="end_date" name="end_date" placeholder="Enter end date" class="form-control <?php echo (!empty($data['end_date_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['end_date_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="street" class=" form-control-label">Twitter Url
        </label>
        <input type="text" id="twitter_id" name="twitter_url" placeholder="Enter end date" class="form-control <?php echo (!empty($data['twitter_id_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['twitter_id_err']; ?></span>
      </div>
      <!-- <div class="row form-group">
        <div class="col-8">
          <div class="form-group">
            <label for="city" class=" form-control-label">City
            </label>
            <input type="text" id="city" placeholder="Enter your city" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>">
          </div>
        </div>
        <div class="col-8">
          <div class="form-group">
            <label for="postal-code" class=" form-control-label">Postal Code
            </label>
            <input type="text" id="postal-code" placeholder="Postal Code" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>">
          </div>
        </div>
      </div> -->
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Whitepaper Link
        </label>
        <input type="text" id="whitepaper" name="whitepaper_link" placeholder="Enter whitepaper link" class="form-control <?php echo (!empty($data['whitepaper_link_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['whitepaper_link_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Token abbreviation
        </label>
        <input type="text" id="tokenabbreviation" name="token_abbrevation" placeholder="Enter token abbreviation" class="form-control <?php echo (!empty($data['token_abbrevation_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['token_abbrevation_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Project Website
        </label>
        <input type="text" id="projectwebsite" name="project_website" placeholder="Enter project website" class="form-control <?php echo (!empty($data['project_website_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['project_website_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">ICO Round
        </label>
        <input type="text" id="icoround" name="ico_round" placeholder="Enter ico round" class="form-control <?php echo (!empty($data['ico_round_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['ico_round_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Listing Options
        </label>
        <input type="text" id="icoround" name="listing_options" placeholder="Enter listing" class="form-control <?php echo (!empty($data['listing_options_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['listing_options_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">KYC Whitelisting
        </label>
        <input type="text" id="icoround" name="kyc_whitelisting" placeholder="Enter KYC Whitelisting" class="form-control <?php echo (!empty($data['kyc_whitelisting_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['kyc_whitelisting_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Accepted Currency
        </label>
        <input type="text" id="icoround" name="accepted_currency" placeholder="Enter Accepted Currency" class="form-control <?php echo (!empty($data['accepted_currency_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['accepted_currency_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">ICO Price
        </label>
        <input type="text" id="icoround" name="ico_price" placeholder="Enter ICO Price" class="form-control <?php echo (!empty($data['ico_price_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['ico_price_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" name="ico_supply" class="form-control-label">ICO Supply
        </label>
        <input type="text" id="icoround" name="ico_supply" placeholder="Enter ICO Supply" class="form-control <?php echo (!empty($data['ico_supply_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['ico_supply_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Total Supply
        </label>
        <input type="text" id="icoround" name="total_supply" placeholder="Enter Total Supply" class="form-control <?php echo (!empty($data['total_supply_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['total_supply_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Hard Cap
        </label>
        <input type="text" id="icoround" name="hard_cap" placeholder="Enter Hard Cap" class="form-control <?php echo (!empty($data['hard_cap_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['hard_cap_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Soft Cap
        </label>
        <input type="text" id="icoround" name="soft_cap" placeholder="Enter Soft Cap" class="form-control <?php echo (!empty($data['soft_cap_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['soft_cap_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Description
        </label>
        <textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"></textarea>
        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Logo
        </label>
        <input type="file" id="icoround" name="logo" placeholder="Enter logo" class="form-control-file">
        <span class="invalid-feedback"><?php echo $data['logo_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Youtube Link
        </label>
        <input type="text" id="icoround" name="youtube_video_link" placeholder="Enter logo" class="form-control <?php echo (!empty($data['youtube_video_link_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['youtube_video_link_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Facebook Link
        </label>
        <input type="text" id="icoround" name="facebook_url" placeholder="Enter logo" class="form-control <?php echo (!empty($data['facebook_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['facebook_url_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Twitter Link
        </label>
        <input type="text" id="icoround" name="twitter_url" placeholder="Enter logo" class="form-control <?php echo (!empty($data['twitter_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['twitter_url_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Bitcoin Link
        </label>
        <input type="text" id="icoround" name="bitcoin_url" placeholder="Enter logo" class="form-control <?php echo (!empty($data['bitcoin_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['bitcoin_url_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Medium Link
        </label>
        <input type="text" id="icoround" name="medium_url" placeholder="Enter logo" class="form-control <?php echo (!empty($data['medium_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['medium_url_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Telegram Link
        </label>
        <input type="text" id="telegram_url" name="telegram_url" placeholder="Enter logo" class="form-control <?php echo (!empty($data['telegram_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['telegram_url_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="whitepaper" class=" form-control-label">Linkedin Link
        </label>
        <input type="text" id="icoround" name="linkedin_ico_url" placeholder="Enter logo" class="form-control <?php echo (!empty($data['linkedin_ico_url_err'])) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $data['linkedin_ico_url_err']; ?></span>
      </div>
      <label for="whitepaper" class=" form-control-label">Roadmap <br><br>
      <div class="row fieldGroup">
        <div class="col-6">
            <div class="form-group">
                <label for="cc-exp" class="control-label mb-1">Timeline date</label>
                <input type="text" placeholder="Timeline date" name="roadmap_date[]" class="form-control">
                
            </div>
        </div>
        <div class="col-6">
            <label for="x_card_code" class="control-label mb-1">Timeline title</label>
            <div class="input-group">
              <input type="text" placeholder="Timeline date" name="roadmap_title[]" class="form-control"> 
            <a href="javascript:void(0)" class="btn btn-success btn-sm addMore"><span class="" aria-hidden="true"></span>+</a>
                
            </div>
        </div>
    </div>
   <!-- ico road map start -->
    <div class="row fieldGroupCopy" style="display:none;">
      <div class="col-6">
          <div class="form-group">
              <label for="cc-exp" class="control-label mb-1">Timeline date</label>
              <input type="text" id="postal-code" name="roadmap_date[]" placeholder="Timeline date" class="form-control">
              
          </div>
      </div>
      <div class="col-6">
          <label for="x_card_code" class="control-label mb-1">Timeline title</label>
          <div class="input-group">
          <input type="text" placeholder="Timeline date" name="roadmap_title[]" class="form-control"> 
          <a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><span class="" aria-hidden="true"></span>-</a>
          
      </div>
  </div>
</div>
    <!-- ico road map end -->
     <label for="whitepaper" class=" form-control-label">Team Details<br><br>
     <div class="fieldGroupteam">
        <div class="row col-md-3">
          <div class="form-group">
              <label for="cc-exp" class="control-label mb-1">Image name</label>
              <input type="file" id="postal-code" name="team_image_name[]" placeholder="Timeline date" class="form-control-file" multiple/>
              
          </div>
        </div>
        <div class="col col-md-3">
            <div class="form-group">
                <label for="cc-exp" class="control-label mb-1">Person Name</label>
                <input type="text" id="postal-code" name="person_name[]" placeholder="Timeline date" class="form-control">
                
            </div>
        </div>
        <div class="col col-md-3">
            <div class="form-group">
                <label for="cc-exp" class="control-label mb-1">Role</label>
                <input type="text" id="postal-code" name="team_role[]" placeholder="Timeline date" class="form-control">
                
            </div>
        </div>
        <div class="col col-md-3">
            <div class="form-group">
                <label for="cc-exp" class="control-label mb-1">Linkedin URL</label>
                <input type="text" id="postal-code" name="team_linkedin_url[]" placeholder="Timeline date" class="form-control">
                
            </div>
        </div>
        <a href="javascript:void(0)" class="btn btn-success btn-sm remove addMoreteam"><span aria-hidden="true"></span>+</a>
  </div>

  <!-- image clone start -->
  <div class="fieldGroupteamCopy" style="display:none;">
      <div class="row col-md-3">
        <div class="form-group">
            <label for="cc-exp" class="control-label mb-1">Image name</label>
            <input type="file" id="postal-code" name="team_image_name[]" placeholder="Timeline date" class="form-control-file" multiple/>
            
        </div>
      </div>
      <div class="col col-md-3">
          <div class="form-group">
              <label for="cc-exp" class="control-label mb-1">Name</label>
              <input type="text" id="postal-code" name="person_name[]" placeholder="Timeline date" class="form-control">
              
          </div>
      </div>
      <div class="col col-md-3">
          <div class="form-group">
              <label for="cc-exp" class="control-label mb-1">Role</label>
              <input type="text" id="postal-code" name="team_role[]" placeholder="Timeline date" class="form-control">
              
          </div>
      </div>
      <div class="col col-md-3">
          <div class="form-group">
              <label for="cc-exp" class="control-label mb-1">Linkedin URL</label>
              <input type="text" id="postal-code" name="team_linkedin_url[]" placeholder="Timeline date" class="form-control">
              
          </div>
          
      </div>
      <a href="javascript:void(0)" class="btn btn-danger btn-sm removefieldGroupteam"><span class="" aria-hidden="true"></span>-</a>
</div>
  <!-- image clone end -->
  
</div>
<div class="card-footer">
  <input type="submit" value="Submit" class="btn btn-primary btn-sm">
  </div>
</form>
</div>
<?php require APPROOT . '/views/admin/dashboard/footer.php';?>
<script>
jQuery(document).ready(function(){
    //group add limit
    
    //add more fields group
    jQuery(".addMore").click(function(){
        var fieldHTML = '<div class="row fieldGroup">'+jQuery(".fieldGroupCopy").html()+'</div>';
        jQuery('body').find('.fieldGroup:last').after(fieldHTML);
    });
    
    
    //remove fields group
    jQuery("body").on("click",".remove",function(){ 
        jQuery(this).parents(".fieldGroup").remove();
    });


    jQuery(".addMoreteam").click(function(){
        var fieldHTML = '<div class="fieldGroupteam">'+jQuery(".fieldGroupteamCopy").html()+'</div>';
        jQuery('body').find('.fieldGroupteam:last').after(fieldHTML);
    });
    
    
    //remove fields group
    jQuery("body").on("click",".removefieldGroupteam",function(){ 
        jQuery(this).parents(".fieldGroupteam").remove();
    });


});

</script>