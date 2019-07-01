 if(isset($_GET['hg']) && isset($_GET['gif'])){
        $t_id = $_GET['hg'];
        $t_root = $_GET['gif'];
        $uy = base64_decode($t_id);
         $algo = $uy / 10110;
        $yu = base64_decode($t_root);
    }
                $get_topic = "select * from topics where topic_id='$algo' and topic_root='$yu'";
                $run_topic= mysqli_query($connection,$get_topic);
                $got = mysqli_fetch_array($run_topic);
                $top_id= $got['topic_id'];
                $topic_title= $got['topic_title'];

                 $get_test = "select * from test where topic_id='$top_id'";
                $run_test= mysqli_query($connection,$get_test);

                $i=0;
                while($row_tests=mysqli_fetch_array($run_test)){

                $test_id = $row_tests['test_id'];
                $t_id = $row_tests['topic_id'];
                $ques = $row_tests['ques']; 
                $ans1 = $row_tests['ans1'];
                $ans2 = $row_tests['ans2'];
                $ans3 = $row_tests['ans3'];
                $ans4 = $row_tests['ans4'];
                $right_ans = $row_tests['right_ans'];
                $i++;


                
               echo " <form action='' method='POST' enctype='multipart/form-data'>
               <div class='jui'><p><span class=\"details\">Q$i $ques</span></p>
          
                    <input type='radio' name='ans[".$test_id."]' value='$ans1'> <span class=\"deta\">$ans1</span><br><br>
                     <input type='radio' name='ans[".$test_id."]' value='$ans2'> <span class=\"deta\">$ans2</span><br><br>
                     <input type='radio' name='ans[".$test_id."]' value='$ans3'> <span class=\"deta\">$ans3</span><br><br>
                     <input type='radio' name='ans[".$test_id."]' value='$ans4'> <span class=\"deta\">$ans4</span><br><br>
                     <input type='radio' checked='checked' name='ans[$test_id]' value='missed' style='display:none'> 
                </div>

             ";

            
        }
        echo " <input type='submit' value='Submit' name='jump' class='btn btn-primary' style='float: right;'>
    </form>";
    
    ?>
    
             
                     </div>
                    </div>
                </div>
                <?php
                       if(isset($_POST['jump'])){
                
                   $resl = 0;
                  // echo "$sct";
                   $an = $_POST['ans'];
                   //echo print_r($an);
                   //exit;

                   
                    //$val = implode(" ", $an);
                      //echo "$val";
                
                    foreach ($an as $key => $choosenanswer){

                     // echo 'key is: '.$test_id;
                
                       // echo "$key";
                   $req = "SELECT * FROM test WHERE test_id='$key'";
                   $turn = mysqli_query($connection,$req);
                   while($rio = mysqli_fetch_array($turn)){


                    $rit = $rio["right_ans"];

                    //echo $rit . ' - ' . $choosenanswer.'<hr />';

                      if ( $choosenanswer == $rit ) {

                            $resl ++;  
                                                 
                        }
                    
                  }
