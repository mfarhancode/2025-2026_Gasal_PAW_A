<!DOCTYPE html>
<head>
<style>
.topnav {
    width: 80%;
    background: #0A4A8A;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
    font-family: Arial, sans-serif;
}

.topnav a,
.topnav .nav-right {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    cursor: pointer;
}

.topnav a:hover,
.nav-right:hover {
    background: #063766;
}

.nav-left {
    display: flex;
    align-items: center;
}

</style>
</head>
<body>
    <div class="topnav">
    <div class="nav-left">
        <a href="#">Home</a>

        <a href="#">Master Data ▾</a>
        <a href="#">Transactions</a>
        <a href="#">Reports</a>
    </div>

    <div class="nav-right">
        <?php echo $_SESSION['username']; ?> ▾
    </div>
</div>
</body>
</html>



