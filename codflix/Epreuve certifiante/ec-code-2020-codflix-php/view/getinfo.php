<?php
$curl = curl_init();
// $data = $_GET['https://api.themoviedb.org/3/movie/76341?api_key=7eaee81ab5538574d727c25198073d61&language=fr-FR'];
// var_dump($data);

$opts = [
    
    CURLOPT_HTTPHEADER     => array(
        'Content-Type: application/json;charset=utf-8'
    ),   
    CURLOPT_URL            =>'https://api.themoviedb.org/3/movie/popular?api_key=7eaee81ab5538574d727c25198073d61&language=fr-FR'
];

curl_setopt_array($curl,$opts);

$response = curl_exec($curl);


curl_close($curl);

$result = $response['total_results'];

$result = json_decode($result);
var_dump($result);
var_dump($response);


// curl_setopt($curlSession, CURLOPT_URL, 'https://api.themoviedb.org/3/movie/76341?api_key=7eaee81ab5538574d727c25198073d61&language=fr-FR');
// curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
// curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

// $jsonData = json_decode(curl_exec($curlSession));
// curl_close($curlSession);

// dd($jsonData)
?>
<?php ob_start(); ?>
<p> blabla</p>
<div class="row">
    <div class="col-md-4 offset-md-8">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>


<div class="List films">
    <?php foreach ($result as $key => $values) {
    echo'
        <a class="item" href="getinfo.php?getinfo">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="" ></iframe>
                </div>
            </div>
            <div class="title">
             ' ;
             if ($key ='title') { echo $values;} ;
             echo ' 
            </div>
        </a>';
         } ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>}
