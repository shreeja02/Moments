<?php 
                   // include '../database.php';
                    $obj=new database();
                    $email=$_SESSION["email_id"];
                    $res=$obj->peruserdisplay($email);
                    while($row=mysql_fetch_assoc($res))
                    {
                        $name=$row["name"];
                        $mobile=$row["mobileno"];
                        $gender=$row["gender"];
                        $photo=$row["photo"];
                    }
                ?>
                        <?php
                            $obj1=new database();
                            $res1=$obj1->catdisplay();
                            $obj2=new database();
                            
                        ?>
                         <div class="entry-widget">
                            <h5 class="widget-title">Categories</h5>
                            <!-- Accordion  -->
                            <div class="accordion">
                                <div class="panel-group" id="accordion">
                                    <!-- Start Accordion 1 -->
                                    <?php
                                    $res2=$obj2->postbycat();
                                    $cnt1=mysql_num_rows($res2);
                                    while($row=mysql_fetch_assoc($res2))
                                    {
                                        $cat=$row["cat_id"];
                                        ?>
                                    <div class="panel panel-default">
                                        <!-- Toggle Headin -->
                                        <h4 class="panel-title">
                                        <a href="displaycatwise.php?id=<?php echo $cat;?>"><i class=
                                        "ico-keyboard_arrow_right"></i><?php echo $row["cat_name"];?>
                                         <span style="float:right;" class="badge"><?php echo $row["cnt1"];?></span></a></h4>
                                        <!-- Toggle Content -->
                                        
                                    </div><!-- End Accordion 1 -->
                                   <?php
                                    }
                                    ?>
                                    <!-- Start Accordion 2 -->
                                    
                                </div>
                            </div>
                        </div>