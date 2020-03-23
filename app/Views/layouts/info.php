<?php
if (isset($_SESSION['msg'])): ?>
    <div class="alert alert-<?= $_SESSION['msgClass'] ?>">
        <?php
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        ?>
    </div>
<?php endif ?>