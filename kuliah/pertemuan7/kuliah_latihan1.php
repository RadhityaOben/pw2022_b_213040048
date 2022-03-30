<?php 
    // SUPERGLOBALS
    // Variabel bawaan php yang bisa diakses di manapun
    // Bentuknya Array Associative
    // $_GET & $_POST
    // $_SERVER  
    // $_GET = ["nama" => "Radhitya", "email" => "radhitya@gmail.com"];
    // $_GET["nama"] = "Radhitya";
    // $_GET["email"] = "radhitya@gmail.com";
    // var_dump($_GET);


?>

<!-- <h1>Halo, <?= $_GET['nama']; ?></h1> -->

<ul>
    <li>
        <a href="kuliah_latihan2.php?nama=Radhitya&npm=213040048&email=radhitya@gmail.com">Radhitya</a>
    </li>
    <li>
        <a href="kuliah_latihan2.php?nama=Iqbal&npm=213040064&email=iqbal@gmail.com">Iqbal</a>
    </li>
    <li>
        <a href="kuliah_latihan2.php?nama=Zalfa&npm=213040070&email=zalfa@gmail.com">Zalfa</a>
    </li>
</ul>