    
            <?php
                    //Connecting to our DATA base[needmeds]
                    include 'connection.php' ;

                         $ids=$_GET['Did'];

                         $name=$_GET['Pname'];


                         $showquery="update patient set D_ID='$ids' where PAT_NAME=$name ";
                        
                         //Executing the QUERY
                         $showdata =mysqli_query($con,$showquery);
                         
                         //Selected tuple is in array form to fetch we use this
                         $arraydata=mysqli_fetch_array($showdata);



                        //  $query="update patient
                        //  set  PAT_NAME='$PAT_NAME',AGE='$AGE',GENDER='$GENDER',PAT_LOCATION='$PAT_LOCATION',PHONE='$PHONE',D_ID=' $DidUpdate',P_ID='$P_ID',email='$email'
                        //  where E_ID='$EidUpdate' and PAT_LOCATION='$P_LOCATION' ";


                    
                    ?>