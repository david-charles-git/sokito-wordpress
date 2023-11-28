<?php
require '../../../wp-config.php';



$postId = 1099;
$connectedGround = 1103;
$connectedColours = [1100, 1101, 1103];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

$postId = 1100;
$connectedGround = 1105;
$connectedColours = [1099, 1101, 1103];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

$postId = 1101;
$connectedGround = 1106;
$connectedColours = [1099, 1100, 1103];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

$postId = 1103;
$connectedGround = 1108;
$connectedColours = [1099, 1100, 1101];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

$postId = 1104;
$connectedGround = 1099;
$connectedColours = [1105, 1106, 1108];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

$postId = 1105;
$connectedGround = 1100;
$connectedColours = [1104, 1106, 1108];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

$postId = 1106;
$connectedGround = 1101;
$connectedColours = [1104, 1105, 1108];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

$postId = 1108;
$connectedGround = 1103;
$connectedColours = [1104, 1105, 1106];
p2p_type( 'product_to_product_ground' )->connect( $postId, $connectedGround, [] );
foreach($connectedColours as $colour){
	p2p_type( 'product_to_product' )->connect( $postId, $colour, [] );
}

?>