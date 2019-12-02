<?php echo $_SERVER['REQUEST_URI']; ?> does not exist, sorry.<br>
<?php
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
$refuri = parse_url($_SERVER['HTTP_REFERER']); // use the parse_url() function to create an array containing information about the domain
if($refuri['host'] == "localhost"){
echo "You should email me and tell me I have a dead link on this site.";
}
else{
echo "You should email someone over at " . $refuri['host'] . " and let them know they have a dead link to this site.";
}
}
else{
echo "If you got here from Angola, you took a wrong turn at Catumbela. And if you got here by typing randomly in the address bar, stop doing that. You're filling my error logs with unnecessary junk.";
}
?>
