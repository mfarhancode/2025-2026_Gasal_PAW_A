<form method="post" action="index.php">
  <h2>Student Registration Form (Advanced Validation)</h2>

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

  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"
         value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
  <?php if (isset($errors['email'])) echo "<span style='color:red;'> * {$errors['email']}</span>"; ?>
  <br><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"
         value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
  <?php if (isset($errors['password'])) echo "<span style='color:red;'> * {$errors['password']}</span>"; ?>
  <br><br>

  <button type="submit">Submit</button>
</form>
