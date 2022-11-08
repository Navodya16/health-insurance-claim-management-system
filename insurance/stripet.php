<?php
//require('../config/stripeconfig.php');
include('../config/stripeconfig.php');
include('../config/dbcon.php');
?>

<?php
if(isset($_GET['id']))
{
    $claimid = $_GET['id'];
}

if(isset($_GET['price']))
{
    $price = $_GET['price']*100;
}

$email_query = "SELECT users.email FROM users INNER JOIN claims WHERE claims.patient_id=users.id AND claims.id='$claimid' ";
$email_query_run = mysqli_query($con, $email_query);
$row = mysqli_fetch_array($email_query_run);
$email = $row[0];

?>
<form action="payment-submit.php" method="post">
    <input type="hidden" name="claim_price" value="<?= $price; ?>">
    <input type="hidden" name="claim_id" value="<?= $claimid; ?>">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key = "<?php echo $publishableKey ?>"
        data-amount= "<?php echo $price ?>"
        data-name = "medi save insurance"
        data-description= "medi save insurance desc"
        data-image = ""
        data-currency = "usd"
        data-email = "<?php echo $email ?>"
    >
    </script>

</form>