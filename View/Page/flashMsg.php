<?php
          $flashMessages = $this->displayFlash;

          if (!empty($flashMessages)) {
               foreach ($flashMessages as $flash) { ?>
                    <div class="alert alert-<?=$flash['type'] ?> text-center"> <?= $flash['message'] ?> </div>
               <?php }
          }
