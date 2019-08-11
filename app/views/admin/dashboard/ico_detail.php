<?php require APPROOT . '/views/admin/dashboard/header.php';?>
<style>
.line{
    position: relative;
    border-left: 1px solid rgba(0, 0, 0, 0.47);
    height: 20px;
    bottom: 7px;
    margin-left: 118px;
}
.line:last-child{
    position: relative;
    border:0;
    height: 20px;
    bottom: 7px;
    margin-left: 118px;
}
</style>
<?php
    //  echo"<pre>";
    //  print_r($data);
    // echo"</pre>";
     ?>
    
    <div class="row">
    <?php foreach($data['ico'] as $ico): ?>
        <div class="col-lg-5">
        <aside class="profile-nav alt">
            <section class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                        <a href="#">
                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo URLROOT; ?>images/ico_logo/ico_logo<?php echo$ico->logo;?>">
                        </a>
                        <div class="media-body">
                            <h2 class="text-light display-6"><?php echo $ico->ico_name; ?></h2>
                            <p>Name</p>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-envelope-o"></i> Email: <?php echo $ico->ico_email; ?> <span class="badge badge-primary pull-right">10</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-calendar"></i> Start Date: <?php echo $ico->start_date; ?> <span class="badge badge-danger pull-right">15</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-calendar"></i> End Date: <?php echo $ico->end_date; ?> <span class="badge badge-success pull-right">11</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-twitter"></i> Twitter Url: <?php echo $ico->twitter_id; ?>  <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-dollar"></i> Token abbreviation: <?php echo $ico->token_abbrevation; ?>  <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-globe"></i> Project Website: <?php echo $ico->project_website; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-road"></i> ICO Round: <?php echo $ico->ico_round; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-circle-o"></i> Listing Options: <?php echo $ico->listing_options; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-comments-o"></i> KYC Whitelisting: <?php echo $ico->kyc_whitelisting; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-money"></i> Accepted Currency: <?php echo $ico->accepted_currency; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-money"></i> ICO Price: <?php echo $ico->ico_price; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-money"></i> ICO Supply: <?php echo $ico->ico_supply; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-money"></i> Total Supply: <?php echo $ico->total_supply; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-money"></i> Hard Cap: <?php echo $ico->hard_cap; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-money"></i> Soft Cap: <?php echo $ico->soft_cap; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa-youtube-play"></i> Youtube Link: <?php echo $ico->youtube_video_link; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa-facebook"></i> Facebook Link: <?php echo $ico->facebook_url; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-twitter"></i> Twitter Link: <?php echo $ico->twitter_url; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-btc"></i> Bitcoin Link: <?php echo $ico->bitcoin_url; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-medium"></i> Medium Link: <?php echo $ico->medium_url; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-telegram"></i> Telegram Link: <?php echo $ico->telegram_url; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-linkedin"></i> Linkedin Link: <?php echo $ico->linkedin_ico_url; ?> <span class="badge badge-warning pull-right r-activity">03</span></a>
                    </li>
                </ul>
            </section>
            </aside>
        </div>
        <?php endforeach; ?>
        <div class="col-lg-7">
            <div class="card">
                    <div class="card-header">
                        <h4>ICO Details</h4>
                    </div>
                <div class="card-body">
                <h2>Description</h2> <br>
                    <p class="text-muted m-b-15"><?php echo $ico->description; ?></p>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="team-tab" data-toggle="tab" href="#team" role="tab" aria-controls="team" aria-selected="true">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="roadmap-tab" data-toggle="tab" href="#roadmap" role="tab" aria-controls="roadmap" aria-selected="false">Roadmap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="whitepaper-tab" data-toggle="tab" href="#whitepaper" role="tab" aria-controls="whitepaper" aria-selected="false">Whitepaper</a>
                        </li>
                    </ul><br>
                    <div class="tab-content pl-3 p-1" id="myTabContent">
                        <div class="tab-pane fade active show" id="team" role="tabpanel" aria-labelledby="team-tab">
                            <div class="row">
                            <?php foreach($data['ico_team_image'] as $ico_team):?>
                                <div class="col-md-4">
                                    <div class="feed-box text-center">
                                        <section class="card">
                                            <div class="card-body">
                                                <div class="corner-ribon blue-ribon">
                                                    <i class="fa fa-linkedin"></i>
                                                </div>
                                                <a href="#">
                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo URLROOT; ?>images/ico_team_image/<?php echo$ico_team->image_name;?>">
                                                </a>
                                                <h6> <?php echo $ico_team->person_name; ?></h6>
                                                <p><?php echo $ico_team->team_role; ?></p>
                                            </div>
                                        </section>
                                    </div>
                                </div>  
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="roadmap" role="tabpanel" aria-labelledby="roadmap-tab">
                            <div class="row">
                                    <div class="col-md-5 section-center">
                                    <?php foreach($data['ico_road_map'] as $ico_road_map):?>
                                        <div class="card" style="margin-left:auto;margin-right:auto;margin-bottom: 13px;">
                                            <div class="card-header" style="text-align:center;">
                                                <strong class="card-title"><?php echo $ico_road_map->roadmap_date; ?></strong>
                                            </div>
                                            <div class="card-body" style="text-align:center;">
                                                <p class="card-text"><?php echo $ico_road_map->roadmap_title; ?></p>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        <?php endforeach; ?>
                                    </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="whitepaper" role="tabpanel" aria-labelledby="whitepaper-tab">
                            <h3>Whitepaper</h3>
                            <p>Some content here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php require APPROOT . '/views/admin/dashboard/footer.php';?>