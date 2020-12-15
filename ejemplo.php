

<?php 

include 'header.php';

 $menu = [
[
    "titulo" => "ensalada",
    "tipo" => "entrante",
    "comensales" => 2,
    "ingredientes" => [ ["nombreIngrediente"=> "lechuga", "nombreIngrediente"=> "lechuga"] ]
],
[
    "titulo" => "Solomillo",
    "tipo" => "principal",
    "comensales" => 2,
    "ingredientes" => ["solomillo", "patatas"]
],
[
    "titulo" => "Tarta tres chocolates",
    "tipo" => "postre",
    "comensales" => 2,
    "ingredientes" => ["chocolate negro", "chocolate blanco", "chocolate con leche", "galletas"]
]
];
?>


<?php  foreach ($menu as $val){?>
      
        <ul>
         <li>Plato:<?php echo $val["titulo"];?></li>
         <li>Tipo:<?php echo $val["tipo"];?></li>
         <li>Comensales:<?php echo $val["comensales"];?></li>
        
       
        <?php foreach($val["ingredientes"] as $ingredientes){ ?>
            
            <ul>
            <li>Ingredientes:<?php echo $ingredientes;?></li>
            </ul>
            
            <?php } ?>
        </ul>
        
        <?php };
        include 'footer.php';
        ?>

        






//var_dump($platos->fetch_assoc());
//forma antigua
//while ($plato = $platos->fetch_array()){
  // var_dump($plato);
//}
//forma nueva
//foreach ($platos as $plato){
  // var_dump($plato);



//$platos->fetch_array();
//$plato = $platos->fetch_array();
//echo $plato ["Titulo"];