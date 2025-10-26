<!-- form.inc -->
<form method="post" action="index.php">
  <h2>Student Data Form</h2>

  <label for="nim">NIM (Student ID):</label><br>
  <input type="text" id="nim" name="nim"
         value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>">
  <?php if (isset($errors['nim'])) echo "<span style='color:red;'> * {$errors['nim']}</span>"; ?>
  <br><br>

  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"
         value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
  <?php if (isset($errors['name'])) echo "<span style='color:red;'> * {$errors['name']}</span>"; ?>
  <br><br>

  <label for="major">Major:</label><br>
  <input type="text" id="major" name="major"
         value="<?php echo isset($_POST['major']) ? htmlspecialchars($_POST['major']) : ''; ?>">
  <?php if (isset($errors['major'])) echo "<span style='color:red;'> * {$errors['major']}</span>"; ?>
  <br><br>

  <button type="submit">Submit</button>
</form>
