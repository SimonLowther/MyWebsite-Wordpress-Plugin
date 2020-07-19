<?php
require_once 'client_data.php';

//Update plugin options on reload of page
if(array_key_exists('myws_submit', $_POST)){
    update_option('mywebsite_hosting_renewal',$_POST['hosting_renewal']);
    update_option('mywebsite_domain_renewal',$_POST['domain_renewal']);
}

//load options from database
$myws_hosting_renewal=get_option('mywebsite_hosting_renewal','not set');
$myws_domain_renewal=get_option('mywebsite_domain_renewal','not set');

//Display generic data

echo "<h2>Website Instructions for ".$client_name."</h2>";
echo "<br/>";
echo "<h3>Important Dates</h3>";
?>
<form method="post" action="">
    <label for="hosting_renewal">Hosting Renewal: </label>
    <input type="text" name="hosting_renewal" value="<?php echo $myws_hosting_renewal ?>" size="25px" />
    <br/>
    <label for="domain_renewal"> Domain Renewal: </label>
    <input type="text" name="domain_renewal" value="<?php echo $myws_domain_renewal ?>" size="25px" />
    <br/>
    <input type="submit" value="Update Dates" name="myws_submit" class="button button_primary" />
</form>
<?php
echo '<br/>';
echo "Any time you require assistance and can not find the answer on these pages please email <a href='mailto:support@flexihubs.com'> Support </a>";


//Display page speciifc to this website/customer
require_once 'specific_instructions.php';


?>  
<h1></h1>


<?php 

?>

