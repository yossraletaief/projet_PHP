<?php
require "connexiong.php";
$req = " SELECT * from cheval";
$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);


$req2 = " SELECT * from jockeys ";
$stmt1 = $idcon->query($req2);
$stmt1->setFetchMode(PDO::FETCH_ASSOC);


$req3 = " SELECT * from course ";
$stmt2 = $idcon->query($req3);
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
            <li><a href="#course">Liste course</a></li>

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
                <?php echo $ligne["NumCh"] ?>
                    <?php echo $ligne["NomCh"] ?>
                </h2>
                <p>
                    <?php echo $ligne["PoidsCh"] ?>
                </p>
                <a href="" class="about-btn">Learn more</a>
            </li>
        </ul>
        <?php } ?>

    </section>

    <section class="services-area" id="jokeys">
        <h3 class="section-title">Liste jokeys</h3>
        <ul class="services-content">
            <?php while ($ligne2 = $stmt1->fetch()) { ?>
            <li>
                <img src="images/jokey1.jpg" alt="Italian Trulli" style="width: 250px;height: 200px;">
                <h4>
                <?php echo $ligne2["CodeJ"] ?>
                    <?php echo $ligne2["NomJ"] ?>
                    <?php echo $ligne2["PrénomJ"] ?>
                </h4>
                <p>
                    <?php echo $ligne2["PoidsJ"] ?>.
                </p>
            </li>
            <?php } ?>
       
            <section class="services-area" id="course" style="margin-top: 250px; margin-left: -400px !important;">

                <h3 class="section-title">Liste course</h3>
                <ul class="services-content">
                    <?php while ($ligne3 = $stmt2->fetch()) { ?>
                    <li>
                        <img src="images/jokey2.jpg" alt="Italian Trulli" style="width: 250px;height: 200px;">
                        <h4>
                            <?php echo $ligne3["NumCh"] ?>
                        </h4>
                        <h4>
                            <?php echo $ligne3["CodeJ"] ?>
                        </h4>
                        <h4>
                            <?php echo $ligne3["CodeParc"] ?>
                        </h4>
                        <h4>
                            <?php echo $ligne3["DateCourse"] ?>
                        </h4>
                        <h4>
                            <?php echo $ligne3["durée"] ?>
                        </h4>

                    </li>
                    <!--    <li>
                <img src="images/jokey3.jpg" alt="Italian Trulli" style="width: 250px;height: 200px;">
                <h4>jokey 3</h4>
                 <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil nostrum deleniti modi minus culpa veritatis voluptatibus molestiae alias odit. Et tempore odio illo placeat at praesentium deleniti voluptatum fuga debitis.</p>
            </li>  -->
                </ul>
                <?php } ?>
            </section>

                    

            <footer>
                <p>All Right Reserved by your Website</p>
            </footer>
</body>

</html>