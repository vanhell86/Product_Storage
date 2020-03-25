<?php
if (isset($_SESSION['msg'])): ?>
    <div class="alert alert-<?= $_SESSION['msgClass'] ?>">
        <?php
        if(is_array($_SESSION['msg'])) {
            foreach ($_SESSION['msg'] as $info) {
                echo "<li>";
                echo $info;
            }
        }else{
            echo $_SESSION['msg'];
        }
        unset($_SESSION['msg']);
        ?>
    </div>
<?php endif ?>