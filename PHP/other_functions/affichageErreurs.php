<?php
                // affiche message d'erreur   
                if(isset($info_error)){ ?>
                    <?php 

                    for($i = 0; $i < count($info_error); ++$i) { ?>
                    <p class="request_message" style ="color: red">
                    <?= print_r($info_error[$i],true); ?>
                    </p>
                    
                    <?php
                    }
                }

                if(isset($info_succes)){ ?>
                    <?php 

                    for($i = 0; $i < count($info_succes); ++$i) { ?>
                    <p class="request_message" style ="color: green">
                    <?= print_r($info_succes[$i],true); ?>
                    </p>
                    
                    <?php
                    }
                }
            ?>