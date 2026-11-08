<?php
// Bottom of every page. Before including it, a page can set:
//   $footer_space  extra empty space (px) above the footer, matching the original pages
//   $show_footer   false to leave the footer out (the original login/sign-up pages had none)
$footer_space = isset($footer_space) ? (int) $footer_space : 0;
$show_footer = isset($show_footer) ? $show_footer : true;
?>
    <?php if ($footer_space > 0) { ?>
    <div style="height: <?php echo $footer_space; ?>px;"></div>
    <?php } ?>
    </main>
    <?php if ($show_footer) { ?>
    <footer class="footer-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="https://www.w3schools.com/" target="_blank" rel="noopener">Web design</a></li>
                        <li><a href="https://www.w3schools.com/" target="_blank" rel="noopener">Development</a></li>
                        <li><a href="https://www.w3schools.com/" target="_blank" rel="noopener">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="Terms.html" target="_blank" rel="noopener">Terms of service</a></li>
                        <li><a href="Privacy.html" target="_blank" rel="noopener">Privacy Policy</a></li>
                        <li><a href="RefundP.html" target="_blank" rel="noopener">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3>Super Games</h3>
                    <p>© 2021, Super Games, Inc. All rights reserved. Super, Super Games, the Super Games logo, are trademarks or registered trademarks of Super Games, Inc. in the United States of America and elsewhere.</p>
                </div>
            </div>
            <div class="social">
                <a class="social-link fa fa-facebook" href="http://www.facebook.com" target="_blank" rel="noopener" aria-label="Facebook"></a>
                <a class="social-link fa fa-twitter" href="http://www.twitter.com" target="_blank" rel="noopener" aria-label="Twitter"></a>
                <a class="social-link fa fa-instagram" href="http://www.instagram.com" target="_blank" rel="noopener" aria-label="Instagram"></a>
                <a class="social-link fa fa-reddit-alien" href="https://www.reddit.com/" target="_blank" rel="noopener" aria-label="Reddit"></a>
            </div>
            <p class="copyright">Super Games © 2021</p>
        </div>
    </footer>
    <?php } ?>

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset("script.js")); ?>"></script>
</body>
</html>
