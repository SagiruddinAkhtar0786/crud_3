<?php
    include 'action.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>CRUD Application</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CRUD OPERATION</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
  </div>
  <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3 class="text-center text-dark my-3">Employee Records</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">

        <h3 class="text-center text-info">Add Record</h3>
        <form action="action.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <input type="text" value="<?php echo $name; ?>" name="name" id="name" class="form-control" placeholder="Employee Name" required >
            </div>
            <div class="form-group">
                <input type="email" name="email" value="<?php echo $email; ?>" id="email" class="form-control" placeholder="Employee Email" required >
            </div>
            <div class="form-group">
                <input type="tel" name="mobile" id="mobile" value="<?php echo $phone; ?>" class="form-control" placeholder="Employee Mobile" required >
            </div>

            <div class="form-group">
                <input type="hidden" name="oldimage" value="<?php echo $photo; ?>">
                <input type="file" name="image" id="image" class="custom-file">
                <img src="<?php echo $photo; ?>" width="120" class="img-thumbnail">
            </div>

            <div class="form-group">
            
              <?php if($update == true){ ?>
                <input type="submit" value="update Record" name="update" clas s="btn btn-success btn-block">
                
               <?php } else{ ?>

                <input type="submit" value="Add Record" name="add" class="btn btn-primary btn-block">
                
                <?php } ?>
            </div>
        </form>
        
        </div>
        <div class="col-md-9">

            <?php
                $sql = "SELECT * FROM `employee`";
                $result = mysqli_query($conn,$sql);

            ?>
            <h3 class="text-center text-info">Records present in the Database</h3>

            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
               <tbody>
               <?php
                    while($row = mysqli_fetch_assoc($result)){   ?>
                    
                  <tr>
                    <th><?php echo $row['id'];?></th>
                    <td><img src="<?php echo $row['photo'];?>" alt="" width="25"></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td>
                        <a href="details.php?details=<?php echo $row['id']; ?>" class="badge badge-primary p-2">Details</a>
                        <a href="/crud3/action.php?id= <?php echo $row['id']; ?>" class="badge badge-danger p-2" onClick="javascript:return confirm(' Do you want to really delete?');">Delete</a>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="badge badge-success p-2">Edit</a>
                    </td>
                  </tr>
                    <?php } ?>
                </tbody>
              </table>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>