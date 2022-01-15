<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/Home.css" />
  <link href="doctor/connection.php">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide" />
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="navdiv">
    <nav class="navbar">
      <div class="logo">
        <span>
          <h1><a class="logoa" href="#">MED</a></h1>
        </span>
      </div>
      <div class="links">
        <ul class="ullists">
          <li id="doctid" class="linklist">
            <a class="link1" href="PharmacyRIG.php">Pharmacy</a>
          </li>
          <li id="pharid" class="linklist">
            <a class="link1" href="PatientRIG.php">Patient</a>
          </li>
          <li id="signid" class="linklist">
            <a id="dropalink" class="link1" href="DoctorRIG.php">Doctor</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- <div class="doctablediv">
        <p>
          lorem1000
        </p>
      </div> -->
  <div>
    <div class="hideondoc">
      <div class="bodyhead">
        <form action="" method="post">

          <h1 class="title">Search, Get Appointments and Medicines now</h1>
          <input type="text"  class="search1" placeholder="Search Medicines" name="M_NAME" id="">
          <input type="submit"  name="search" value="Search">
        </form>

        <div class="listall">
          <button  class="list11"><a href="DoctorDisplay.php">List of Doctors</a></button> 
          <button class="list11"><a href="PharmacyDisplay.php">List of Pharmacies</a></button>
        </div>
      </div>
      <section>
        <h1>PHARMACY</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0" >
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>LOCATION</th>
                            <th>PHONE</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
                </table>
            </div>
    <div class="tbl-content">
        <table  cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
        
                include 'connection.php';
        
                if(isset($_POST['search']))
                {
                    //Asigning Variables[php Variables] to the Table variables
                    $M_NAME=$_POST['M_NAME'];



                    //Insertion Query [Main-QUERY] for Doctor
                      $search="select * from stocks where M_NAME='$M_NAME'  ";

                      $squery=mysqli_query($con,$search);

               
                      $result=mysqli_fetch_array($squery);

                
                      $P_ID=$result['P_ID'];
                    
                       // Query to select the Entire table [MAIN QUERY]
                       $selectquery=" select  * from pharmacy where P_ID= $P_ID " ; 



                      //Executing the Query
                        $query= mysqli_query($con,$selectquery);
        
        
                //Iterating through Entire table using while loop
                //Using MYSQLI Fetch fuction to show that table
                while($res=mysqli_fetch_array($query))
                {
                  ?>
                  <tr>
                      <td> <?php  echo $res['P_NAME'];  ?></td>
                      <td> <?php  echo $res['P_LOCATION'];  ?></td>
                      <td> <?php  echo $res['PHONE'];  ?></td>
                      <td> <?php  echo $res['email'];  ?></td>
                  </tr>
                <?php
                }
              }
                 ?>
            </tbody>
        </table>
    </div>
    </section>
      <div class="about">
        <h2>About</h2>
      </div>

      <div class="imagediv">
        <div class="subimagediv">
          <image class="images" src="Photos/1625075977_doctors-day-history-new.webp"></image>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
            nesciunt optio et in labore non rerum voluptatum praesentium
            voluptas molestiae.
          </p>
        </div>

        <div class="subimagediv">
          <image class="images" src="Photos/file-20191203-66986-im7o5.jpg"></image>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
            nesciunt optio et in labore non rerum voluptatum praesentium
            voluptas molestiae.
          </p>
        </div>

        <div class="subimagediv">
          <image class="images" src="Photos/images (1).jfif"></image>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
            nesciunt optio et in labore non rerum voluptatum praesentium
            voluptas molestiae.
          </p>
        </div>

        <div class="subimagediv">
          <image class="images" src="Photos/images.jfif"></image>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
            nesciunt optio et in labore non rerum voluptatum praesentium
            voluptas molestiae.
          </p>
        </div>

        <div class="subimagediv">
          <image class="images" src="Photos/group-of-doctors-card.jpg"></image>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
            nesciunt optio et in labore non rerum voluptatum praesentium
            voluptas molestiae.
          </p>
        </div>

        <div class="subimagediv">
          <image class="images" src="Photos/images (2).jfif"></image>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
            nesciunt optio et in labore non rerum voluptatum praesentium
            voluptas molestiae.
          </p>
        </div>

        <div class="subimagediv">
          <image class="images" src="Photos/group-of-doctors-card.jpg"></image>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
            nesciunt optio et in labore non rerum voluptatum praesentium
            voluptas molestiae.
          </p>
        </div>
      </div>
      <div class="whatwedo">
        <h2 class="whathead">What we do</h2>
      </div>
      <div class="whatwedo2">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime
          illo, nisi hic voluptatum commodi asperiores accusantium. Laudantium
          quis assumenda sit repudiandae rerum praesentium magni ullam dolores
          sequi numquam expedita optio earum, officia at ipsa quam debitis
          voluptate. Ipsum minima, similique unde, minus a tempora ullam
          commodi reiciendis optio ad numquam aliquid culpa sequi. Suscipit
          doloribus culpa numquam in voluptatum non. Ex nisi reiciendis quas
          eius commodi eligendi aspernatur atque molestias blanditiis
          doloremque reprehenderit architecto quisquam tempore dolore qui
          distinctio accusamus aliquam repellat, earum officiis quod officia
          vero. Aliquam fuga dolore, quibusdam facere nesciunt fugiat, ea
          temporibus dicta est animi architecto.
        </p>
      </div>
    </div>
    <div class="contact">
      <h2>Contact us</h2>
    </div>
    <div class="linkcontact">
      <a href="https://www.facebook.com" class="fa fa-facebook"></a>
      <a href="https://www.twitter.com" class="fa fa-twitter"></a>
      <a href="https://www.instagram.com" class="fa fa-instagram"></a>
      <a href="https://www.linkedin.com" class="fa fa-linkedin"></a>
      <a href="https://www.whatsapp.com" class="fa fa-whatsapp"></a>
    </div>
    <div class="empty"></div>
  </div>

  <div class="scriptdiv"></div>
</body>

</html>