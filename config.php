<?php

    $conn = mysqli_connect('localhost', 'root', '', 'shop_db') or die('connection failed');

    $message = [];
    function displayMessages($message){
            foreach($message as $msg){
                echo 
                    '
                        <div class="toast show text-bg-primary border-0 message" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <h6>'.$msg.'</h6>
                                </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                     </div>    
                    ';
        }
    }
    $warning = [];
    function displayWarning($warning){
        foreach($warning as $msg){
            echo 
                '
                    <div class="toast show text-bg-danger border-0 message" role="alert" aria-live="assertive" aria-atomic="true"">
                        <div class="d-flex">
                            <div class="toast-body">
                                <h6>'.$msg.'</h6>
                            </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                 </div>    
                ';
    }
}    
?>
