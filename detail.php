<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET["name"]?></title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/poke.png">
</head>
<body>
    <?php
        include('simple_html_dom.php');      
        $name=$_GET["name"];
        $wiki = "https://pokemondb.net/pokedex/".strtolower($name);
        $html = file_get_html($wiki);
        $idtop= "tab-basic-" . $_GET["idx"];

        $top=$html->getElementById("$idtop");  
            $imglink=$top->children(0)->children(0)->children(0)->children(0)->href;

            $vitalTleft=$top->children(0)->children(1)->children(1)->children(0);
            $natnum=$vitalTleft->children(0)->children(1)->children(0)->innertext;
            $type=$vitalTleft->children(1)->children(1);
            $species=$vitalTleft->children(2)->children(1)->innertext;
            $height=$vitalTleft->children(3)->children(1)->innertext;
            $weight=$vitalTleft->children(4)->children(1)->innertext;
            $ability=$vitalTleft->children(5)->children(1);

            $vitalTright=$top->children(0)->children(2)->children(0);
            $trainingtables=$vitalTright->children(0)->children(1);
            $catchRate=$trainingtables->children(0)->children(1)->children(1);      // <td>
            $growthRate=$trainingtables->children(0)->children(4)->children(1);     // <td>

    ?>

    <div class="container">
        <!-- start of title -->
        <h2 class="text-center head">
            <?php echo " $name "; ?>
        </h2>
        <br>
        <!-- end of title -->
        <!-- start of top section -->
        <div class="row text-center poke-data">
            
            <div class="col-sm-4">
                <h4>Pokédex Data</h4>
                <br>
                <table class="table ">
                <tbody>
                    <tr>
                        <th>National №</th>
                        <td><strong><?php echo"$natnum"?></strong></td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td><?php
                            foreach($type->find('a') as $t){
                                $atipe=$t->innertext;
                                echo"
                                <button class"." btn btn-outline-info".">".strtoupper($t->innertext)."</button>
                                ";
                            }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Species</th>
                        <td><?php echo"$species"?></td>
                    </tr>
                    <tr>
                        <th>Height</th>
                        <td><?php echo"$height"?></td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td><?php echo"$weight"?></td>
                    </tr>
                    <tr>
                        <!-- NONONONNOOOOOOOOOOOOOOO -->
                        <th>Abilities</th>
                        <?php echo"$ability"?>
                    </tr>
                    <tr>
                        <th>Catch Rate</th>
                        <?php echo"$catchRate"?>
                    </tr>
                    <tr>
                        <th>Growth Rate</th>
                        <?php echo"$growthRate"?>
                    </tr>
                </tbody>
                </table>

            </div>

            <div class="col-sm-4">
                <?php echo"
                <img class='poster' src=".$imglink." width= 336px height= 336px>               
                ";
                ?>
            </div>

            <div class="col-sm-4">
                <h4>Base Stats</h4>
                <br>
                <table class="vitals-table table">
                <tbody>
                    <tr>
                        <th>HP</th>
                        <td class="cell-num">45</td>
                        <td class="cell-barchart">
                            <div class="progress" style="width: 100px">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="cell-num">200</td>
                        <td class="cell-num">294</td>
                    </tr>
                    <tr>
                        <th>Attack</th>
                        <td class="cell-num">49</td>
                        <td class="cell-barchart">
                        <div style="width:27.22%;" class="barchart-bar barchart-rank-2 "></div>
                        </td>
                        <td class="cell-num">92</td>
                        <td class="cell-num">216</td>
                    </tr>
                    <tr>
                        <th>Defense</th>
                        <td class="cell-num">49</td>
                        <td class="cell-barchart">
                        <div style="width:27.22%;" class="barchart-bar barchart-rank-2 "></div>
                        </td>
                        <td class="cell-num">92</td>
                        <td class="cell-num">216</td>
                    </tr>
                    <tr>
                        <th>Sp. Atk</th>
                        <td class="cell-num">65</td>
                        <td class="cell-barchart">
                        <div style="width:36.11%;" class="barchart-bar barchart-rank-3 "></div>
                        </td>
                        <td class="cell-num">121</td>
                        <td class="cell-num">251</td>
                    </tr>
                    <tr>
                        <th>Sp. Def</th>
                        <td class="cell-num">65</td>
                        <td class="cell-barchart">
                        <div style="width:36.11%;" class="barchart-bar barchart-rank-3 "></div>
                        </td>
                        <td class="cell-num">121</td>
                        <td class="cell-num">251</td>
                    </tr>
                    <tr>
                        <th>Speed</th>
                        <td class="cell-num">45</td>
                        <td class="cell-barchart">
                        <div style="width:25.00%;" class="barchart-bar barchart-rank-2 "></div>
                        </td>
                        <td class="cell-num">85</td>
                        <td class="cell-num">207</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                    <th>Total</th>
                    <td class="cell-total"><b>318</b></td>
                    <th class="cell-barchart"></th>
                    <th>Min</th>
                    <th>Max</th>
                    </tr>
                </tfoot>
                </table>

            </div>
            
        </div>
        <!-- end of top sectioon -->
        <!-- start of evolution chart -->
        <h4 class="text-center">Evolution Chart</h4>
        <br>
        <?php
        foreach($html->find('.infocard-list-evo') as $evo){
            $i=0;
            echo "<div class='row text-center poke-evol'>";     // awal div.row
            
            foreach($evo->find('div') as $divimg){
                $evo_imglink=$divimg->children(0)->children(0)->children(0)->getAttribute('data-src');
                $evo_detail=$divimg->children(1);           // span detail
                $panah=$evo->find('.infocard-arrow', $i);

                echo "
                <div class='col'>
                    <img src='$evo_imglink'></img>
                    <br>
                    $evo_detail->outertext
                </div>
                
                ";

                if(isset($panah)){
                    echo "
                    <div class='col'>
                        <br>
                        <br>
                        >>>>
                        <br>
                        $panah
                    </div>
                    
                    ";
                }
                $i++;

            }
            
            echo"</div>";   // ahir div.row

        }
        ?>
        <!-- end of evolution chart -->
        <!-- start of related poke -->
        <h4 class="text-center">Recomended Pokemon by Type</h4>
        <br>
        <div class="row text-center poke-relate">
            <?php 
                $typelink="https://pokemondb.net/type/" . strtolower($atipe);
                // echo "<a target='_blank' href='$typelink'>$typelink</a>";
                $html_type = file_get_html($typelink);
                $recom=$html_type->find('div.infocard-list-pkmn-md',0);

                for($j=0;$j<5;$j++){
                    $arecom_small=$recom->children($j)->children(1)->children(2)->innertext;
                    $arecom_temp=explode(' ', $arecom_small);
                    $arecom_temp2=explode('#', $arecom_temp[0]);
                    
                    // astaghfirullloh opo iki
                    $arecom_natnum=$arecom_temp2[0];
                    
                    $arecom_name=$recom->children($j)->children(1)->children(0)->plaintext;
                    $apoke_html=file_get_html("https://pokemondb.net/pokedex/".strtolower($name));

                    $arecom_img=$recom->children($j)->children(0)->children(0)->getAttribute('data-src');

                    
                    if((int)$arecom_natnum != (int)$_GET['idx']){
                        echo "
                        <div class='col text-center'>
                            <div class=''>
                                <img class='card-img-top' src='$arecom_img' >
                                <div class='card-bod'>
                                    <h5 class='card-title'> $arecom_name </h5>
                        ";
                                // if(isset($arecom_small))
                                //     echo "<small>$arecom_small</small>";
                        echo"
                                </div>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'> $arecom_natnum </li>
                                    <li class='list-group-item'> SPECIES </li>
                                </ul>
                            </div>
                        </div>
                        
                        ";
                    }                

                }

            ?>
        </div>
        <!-- end of related poke -->
    </div>
    
</body>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p>&copy; Copyright 2020 | build with 
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                        by <a href="https://instagram.com/faderik_" target="_blank">Mohammad Faderik</a></p>
                </div>
            </div>
        </div>
    </footer>
</html>