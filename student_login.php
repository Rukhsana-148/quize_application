
<?php include 'header.html' ?>
<div class="container">
    <div class="login">
    <div class="top">
      <div class="row">
        <div class="col-sm-3">
        <p class="text-success">Quize</p>
        </div>
       

        <div class="col-sm-7">
        
        </div>
        <div class="col-sm-2">
          <a href="selectlogin.php" class="btn">Back</a>
          

        </div>
      </div>
    </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
               <h4>Sign In</h4>
               <form action="student.php" method="post">
                <label for="username">Email</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your email" 
                autocomplete=""/>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" 
                autocomplete=""/>
           <input type="submit" class="form-control btn pb-3 pt-1" name="submit"/>
               </form>
               <div class="create">
               <a href="student_form.php">Create an Account</a>
               </div>
             
            </div>
            <div class="col-sm-3"></div>

        </div>
</div>
</div>
<?php include 'footer.html'?>