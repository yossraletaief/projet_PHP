<?php
require "connexiong.php";
$req = " SELECT * from cheval";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);


$req2 = " SELECT * from jockeys ";
$stmt1 = $idcon->query($req2);
$stmt1->setFetchMode(PDO::FETCH_ASSOC);


$req3 = " SELECT * from course ";
$stmt2 = $idcon->query($req);
$stmt2->setFetchMode(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Responsive website design with flexbox</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2><a href="#">Course</a></h2>
        <nav>
            <li><a href="#jokeys">Liste Jokeys</a></li>
            <li><a href="#about">Liste chevaux</a></li>
            <li><a href="#services">Liste course</a></li>

        </nav>
    </header>

    <section class="banner-area">
        <div class="banner-img"></div>
        <h1>course hippique</h1>
        <a href="#" class="banner-btn">Contact us</a>
    </section>
    <section class="about-area" id="about">
        <h3 class="section-title">Liste chevaux</h3>
        <?php while ($ligne = $stmt->fetch()) { ?>
        <ul class="about-content">
            <li class="about-left"></li>
            <li class="about-right">
                <h2>
                    <?php echo $ligne["NomCh"] ?>
                </h2>
                <p>
                    <?php echo $ligne["PoidsCh"] ?>
                </p>
                <a href="" class="about-btn">Learn more</a>
            </li>
        </ul>
        <?php } ?>
        <!--         <ul class="about-content">
            <li class="about-left2"></li>
            <li class="about-right">
                <h2>cheval 2</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus dignissimos nobis error qui, harum tenetur. Id quis voluptatibus doloremque nemo ipsam alias, dignissimos laboriosam architecto sunt quae, molestias corrupti provident.</p>
                <a href="" class="about-btn">Learn more</a>
            </li>
        </ul>
        <ul class="about-content">
            <li class="about-left3"></li>
            <li class="about-right">
                <h2>cheval 3</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus dignissimos nobis error qui, harum tenetur. Id quis voluptatibus doloremque nemo ipsam alias, dignissimos laboriosam architecto sunt quae, molestias corrupti provident.</p>
                <a href="" class="about-btn">Learn more</a>
            </li>
        </ul> -->
    </section>

    <section class="services-area" id="jokeys">
        <h3 class="section-title">Liste jokeys</h3>
        <ul class="services-content">
            <?php while ($ligne2 = $stmt1->fetch()) { ?>
            <li>
                <img src="images/jokey1.jpg" alt="Italian Trulli" style="width: 250px;height: 200px;">
                <h4><?php echo $ligne2["NomJ"] ?>  <?php echo $ligne2["PrénomJ"] ?></h4>
                <p><?php echo $ligne2["PoidsJ"] ?>.</p>
            </li>
            <?php } ?>
            <!-- <li>
                <img src="images/jokey2.jpg" alt="Italian Trulli" style="width: 250px;height: 200px;">
                <h4>jokey 2</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil nostrum deleniti modi minus culpa veritatis voluptatibus molestiae alias odit. Et tempore odio illo placeat at praesentium deleniti voluptatum fuga debitis.</p>
            </li>
            <li>
                <img src="images/jokey3.jpg" alt="Italian Trulli" style="width: 250px;height: 200px;">
                <h4>jokey 3</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil nostrum deleniti modi minus culpa veritatis voluptatibus molestiae alias odit. Et tempore odio illo placeat at praesentium deleniti voluptatum fuga debitis.</p>
            </li> -->
        </ul>

    </section>



    <footer>
        <p>All Right Reserved by your Website</p>
    </footer>
</body>

</html>