<?php require APPROOT . '/views/admin/dashboard/header.php';?>
<div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Your ICO</strong>
                    </div>
                    <!-- <?php
                    // echo"<pre>";   
                    // print_r($data);
                    // echo"<pre>";
                    ?> -->
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ICO Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['ico'] as $ico): ?>
                                    <tr>
                                        <th scope="row">#</th>
                                        <td><?php echo $ico->ico_name; ?></td>
                                        <td><?php echo $ico->start_date; ?></td>
                                        <td><?php echo $ico->end_date; ?></td>
                                        <td>
                                            <a href="<?php echo URLROOT; ?>icos/ico_details/<?php echo $ico->ico_id;?>"><button type="button" class="btn btn-info">Show</button></a>
                                            <a href="<?php echo URLROOT; ?>icos/edit/<?php echo $ico->ico_id;?>">
                                            <button type="button" class="btn btn-primary">Edit</button></a>
                                            <form action="<?php echo URLROOT ?>icos/delete_ico/<?php echo $ico->ico_id;?>" method="POST">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/admin/dashboard/footer.php';?>
    <script>
    
    </script>