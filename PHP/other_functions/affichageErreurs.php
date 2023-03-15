<?php
                // affiche message d'erreur   
                if(isset($info)){ ?>
                    <?php 

                    for($i = 0; $i < count($info); ++$i) { ?>
                    <p class="request_message" style ="color: red">
                    <?= print_r($info[$i],true); ?>
                    </p>
                    
                    <?php
                    }
                }
            ?>