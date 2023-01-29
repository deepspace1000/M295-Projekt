<?php session_start(); ?>
<form>
    <table>
        <tr>
            <th><?php echo $_SESSION['vorname']; ?></th>
            <th><?php echo $_SESSION['name']; ?></th>
            <th><intput type="submit" name="logout" value="Ausloggen"></th>
        </tr>
    </table>
</form>