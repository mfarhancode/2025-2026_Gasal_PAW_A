<form method="post" action="index.php">
  <h2>Self-submission Validation Form</h2>

  <label for="surname">Surname:</label><br>
  <input type="text" id="surname" name="surname"
         value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
  <?php
  if (isset($errors['surname'])) {
      echo "<span style='color:red;'> * {$errors['surname']}</span>";
  }
  ?>
  <br><br>

  <button type="submit">Submit</button>
</form>
