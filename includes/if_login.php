<?php if ($logged_in): ?>
            
            <div class="user-info" onclick="window.location.href='setting.php'">
                <img src="image/login_logo.png" alt="User Icon" class="user-icon"> 
                <span class="user-name"><?php echo $user; ?></span>
            </div>
            <?php else: ?>
           
            <a href="login.php" class="join-btn">Join now</a>
            <?php endif; ?>