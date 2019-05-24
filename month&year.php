<?php
ob_start();
session_start();

?>
<span class="label-input100">Month & Year</span>
<select name="month" class="input100 form-control">
    <option value="">Select Month & Year</option>
    <option value="July <?= $_SESSION['year1']; ?>" >July <?= $_SESSION['year1']; ?></option>
    <option value="August <?= $_SESSION['year1']; ?>">August <?= $_SESSION['year1']; ?></option>
    <option value="September <?= $_SESSION['year1']; ?>">September <?= $_SESSION['year1']; ?></option>
    <option value="October <?= $_SESSION['year1']; ?>">October <?= $_SESSION['year1']; ?></option>
    <option value="November <?= $_SESSION['year1']; ?>">November <?= $_SESSION['year1']; ?></option>
    <option value="December <?= $_SESSION['year1']; ?>">December <?= $_SESSION['year1']; ?></option>
    <option value="January <?= $_SESSION['year2']; ?>">January <?= $_SESSION['year2']; ?></option>
    <option value="Febuary <?= $_SESSION['year2']; ?>">Febuary <?= $_SESSION['year2']; ?></option>
    <option value="March <?= $_SESSION['year2']; ?>">March <?= $_SESSION['year2']; ?></option>
    <option value="April <?= $_SESSION['year2']; ?>">April <?= $_SESSION['year2']; ?></option>
    <option value="May <?= $_SESSION['year2']; ?>">May <?= $_SESSION['year2']; ?></option>
    <option value="June <?= $_SESSION['year2']; ?>">June <?= $_SESSION['year2']; ?></option>
</select>

<span class="focus-input100" data-symbol="&#xf206;"></span>

<?php

unset($_SESSION['year1']);
unset($_SESSION['year2']);


?>
