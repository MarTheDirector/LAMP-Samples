<!DOCTYPE html>
<html>
    <head>
        <title>Homework 1</title>
    </head>
    <body>
        <?php
        require("User.php");
        require("Profile.php");
        
        $user1 = new User();
        $profile1 = new Profile();
        
        $user1->setProfile($profile1);
        
        $profile1->setFirstName("Andrew");
        $profile1->setLastName("Besmer");
        $profile1->setEmailAddress("besmera@winthrop.edu");
        $user1->setUsername("besmera");
        
        $user2 = new User();
        $profile2 = new Profile();
        
        $user2->setProfile($profile2);
        
        $profile2->setFirstName("Gerry");
        $profile2->setLastName("Derksen");
        $profile2->setEmailAddress("derkseng@winthrop.edu");
        $user2->setUsername("derkseng");
        
        $profileArray = array($profile1, $profile2);
        
        echo "<h1>Professors</h1>";
        
        foreach($profileArray as $profile)
        {
            echo "<h2>" . $profile->getFirstName() . " " . $profile->getLastName() . "</h2>";
            echo "<ul>";
            echo "<li>". "<strong>First:</strong> " .$profile->getFirstName()."</li>";
            echo "<li>". "<strong>Last:</strong> ".$profile->getLastName()."</li>";
            echo "<li>". "<strong>Email:</strong> ".$profile->getEmailAddress()."</li>";
            echo "</ul>";           
        }
       ?> 
    </body>
</html>
