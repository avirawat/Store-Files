<?php include "connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>File(s)</title>
  <link rel="stylesheet" href="file.css">
  <link rel="stylesheet" href="https://mdbootstrap.com">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <a class="navbar-brand" href="#"></a>
            <!--<img src="../india.png" width="30" height="30" alt=""></a>-->
            <h3 style="color:azure;">File Accepter</h3>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                <!--<li class="nav-item active"><a href="#" class="nav-link" href="#">Service</a></li>-->
                <li class="nav-item active"><a href="#" class="nav-link">Contacts</a></li>
                <li class="nav-item active"><a href="index.html" class="nav-link" onclick="logOut()">Logout</a></li>
                </ul>
            </div>
    </nav>
   <h5><Strong> <?php 
                $email = $_COOKIE["currentUserEmail"];
                $sql = "SELECT * FROM File WHERE Email = '".$email."'";
                $result = mysqli_query($conn,$sql);
        
                $row=mysqli_fetch_array($result);
                echo 'Hello ';
                echo $row['Name'];  
             ?>
            </strong> </h5>
    <div class="card" style="width: 18rem;">
    <img src="file.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text">
            <form name="uploadForm">
                <div>
                    <input id="uploadInput" type="file" name="myFiles" class="avi" multiple><br>
                    <h5>
                    Selected files : <span id="fileNum">0</span>;
                    <br>Total size of files : <span id="fileSize">0</span>
                    </h5>
                </div>
                <div><input type="submit" value="Store files" class="pdi"></div>
              </form>
    </div>
    </div>
  <!-- Footer -->
<footer>
  <p>Developer: Sanjay Yadav<br>
  <a href="snyadav138@gmail.com">snyadav138@gmail.com</a></p>
</footer>
<!-- Footer -->
  <script>
  function updateSize() {
    let nBytes = 0,
        oFiles = this.files,
        nFiles = oFiles.length;
    for (let nFileId = 0; nFileId < nFiles; nFileId++) {
      nBytes += oFiles[nFileId].size;
    }
    let sOutput = nBytes + " bytes";
    // optional code for multiples approximation
    const aMultiples = ["KiB", "MiB", "GiB", "TiB", "PiB", "EiB", "ZiB", "YiB"];
    for (nMultiple = 0, nApprox = nBytes / 1024; nApprox > 1; nApprox /= 1024, nMultiple++) {
      sOutput = nApprox.toFixed(3) + " " + aMultiples[nMultiple] + " (" + nBytes + " bytes)";
    }
    // end of optional code
    document.getElementById("fileNum").innerHTML = nFiles;
    document.getElementById("fileSize").innerHTML = sOutput;
  }

  document.getElementById("uploadInput").addEventListener("change", updateSize, false);
  </script>
</body>
</html>