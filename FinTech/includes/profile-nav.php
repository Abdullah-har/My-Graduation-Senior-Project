  
    <li class="nav-item">
          <a class="nav-link active rounded" href="<?php
           if($_SESSION['user_level'] == 0) echo 'members-page.php';
           else if($_SESSION['user_level'] == 1) echo 'admin-page.php';
           else if($_SESSION['user_level'] == 2) echo 'finance-employee.php';
           else if($_SESSION['user_level'] == 3) echo 'finance-manager.php';
           else if($_SESSION['user_level'] == 4) echo 'owner.php';
           ?>" id="home">Home</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="#" id="page-2">Messages</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="#" id="page-3">Assignments</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="#" id="page4">Accomplishments</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" target=”_blank” id="page-5">LinkedIn</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" id="" target=”_blank”>Facebook</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" id="" target=”_blank”>Twitter</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" id="page-5" target=”_blank”>Instagram</a>
    </li>

    
